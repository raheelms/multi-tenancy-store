<?php

namespace App\Services\Settings;

use App\Models\Setting;

abstract class BaseSettingsService
{
    /**
     * The settings group this service manages.
     *
     * @var string
     */
    protected string $group;
    
    /**
     * Get a setting value by its key.
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return Setting::get($key, $default);
    }
    
    /**
     * Set a setting value by its key.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return \App\Models\Settings
     */
    public function set($key, $value)
    {
        return Setting::set($key, $value, $this->group);
    }
    
    /**
     * Get all settings for this group.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Setting::getByGroup($this->group);
    }
    
    /**
     * Create or update multiple settings at once.
     *
     * @param  array  $settings
     * @return void
     */
    public function setMany(array $settings)
    {
        foreach ($settings as $key => $value) {
            $this->set($key, $value);
        }
    }
    
    /**
     * Handle dynamic method calls to access settings.
     * 
     * This allows methods like getAppName() or setCurrency()
     * to be automatically handled.
     *
     * @param  string  $method
     * @param  array  $arguments
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        // Convert getSomething() to 'something' key
        if (strpos($method, 'get') === 0 && strlen($method) > 3) {
            $key = lcfirst(substr($method, 3));
            $default = $arguments[0] ?? null;
            return $this->get($key, $default);
        }
        
        // Convert setSomething(value) to set('something', value)
        if (strpos($method, 'set') === 0 && strlen($method) > 3) {
            $key = lcfirst(substr($method, 3));
            $value = $arguments[0] ?? null;
            return $this->set($key, $value);
        }
        
        throw new \BadMethodCallException("Method {$method} not found in " . get_class($this));
    }
}