<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 
        'value', 
        'group', 
        'type', 
        'description', 
        'options', 
        'is_private',
        'validation_rules'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'options' => 'array',
        'is_private' => 'boolean',
        'validation_rules' => 'array'
    ];

    /**
     * Generate a unique key for the setting
     */
    public static function generateUniqueKey(string $base, string $group = 'general')
    {
        $key = Str::slug($base);
        $counter = 1;

        while (self::where('key', $key)->where('group', $group)->exists()) {
            $key = Str::slug($base) . '_' . $counter;
            $counter++;
        }

        return $key;
    }

    /**
     * Get a setting value
     */
    public static function getValue(string $key, $default = null, ?string $group = null)
    {
        $cacheKey = "setting:{$key}:" . ($group ?? 'global');
        
        return Cache::remember($cacheKey, now()->addHours(24), function () use ($key, $default, $group) {
            $query = self::where('key', $key);
            
            if ($group) {
                $query->where('group', $group);
            }
            
            $setting = $query->first();
            
            return $setting ? self::castValue($setting->value, $setting->type) : $default;
        });
    }

    /**
     * Set a setting value
     */
    public static function set(string $key, $value, string $group = 'general', array $metadata = [])
    {
        // Clear cache
        Cache::forget("setting:{$key}:" . ($group ?? 'global'));

        // Find or create setting
        $setting = self::firstOrNew([
            'key' => $key,
            'group' => $group
        ]);

        // Update value and metadata
        $setting->value = $value;
        
        // Fill additional metadata
        if (!empty($metadata)) {
            $setting->fill($metadata);
        }

        $setting->save();

        return $setting;
    }

    /**
     * Cast value based on type
     */
    public static function castValue($value, string $type)
    {
        if ($value === null) return null;

        return match($type) {
            'integer' => (int) $value,
            'float' => (float) $value,
            'boolean' => filter_var($value, FILTER_VALIDATE_BOOLEAN),
            'array' => json_decode($value, true) ?? [],
            'json' => json_decode($value, true) ?? [],
            'date' => \Carbon\Carbon::parse($value),
            default => $value
        };
    }

    /**
     * Scope for filtering by group
     */
    public function scopeGroup($query, string $group)
    {
        return $query->where('group', $group);
    }

    /**
     * Scope for public settings
     */
    public function scopePublic($query)
    {
        return $query->where('is_private', false);
    }
}