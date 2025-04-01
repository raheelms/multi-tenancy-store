<?php

namespace App\Filament\Resources\SettingResource\Pages\Settings;

// Add this import statement to fix the error
use App\Filament\Resources\SettingResource;
use Filament\Resources\Pages\Page;
use App\Models\Setting;

class Dashboard extends Page
{
    protected static string $resource = SettingResource::class;

    protected static string $view = 'filament.resources.settings-resource.pages.settings.dashboard';
    
    protected static ?string $title = 'Settings Dashboard';
    
    public array $settingsGroups = [];
    public array $stats = [];
    
    public function mount(): void
    {
        $this->settingsGroups = collect(config('settings.groups'))->map(function ($group, $key) {
            return [
                'key' => $key,
                'label' => $group['label'] ?? ucfirst($key),
                'icon' => $group['icon'] ?? 'heroicon-o-cog', 
                'description' => $group['description'] ?? '',
                'count' => Setting::where('group', $key)->count(),
                'url' => route("filament.admin.resources.settings.{$key}"),
            ];
        })->toArray();
        
        $this->stats = [
            'total' => Setting::count(),
            'private' => Setting::where('is_private', true)->count(),
            'public' => Setting::where('is_private', false)->count(),
            'groups' => count($this->settingsGroups),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [];
    }
}