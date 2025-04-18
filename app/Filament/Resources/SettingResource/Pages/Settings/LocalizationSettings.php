<?php

namespace App\Filament\Resources\SettingResource\Pages\Settings;

use App\Filament\Resources\SettingResource;
use Filament\Resources\Pages\Page;

class LocalizationSettings extends Page
{
    protected static string $resource = SettingResource::class;

    protected static string $view = 'filament.resources.settings-resource.pages.settings.localization-settings';
}
