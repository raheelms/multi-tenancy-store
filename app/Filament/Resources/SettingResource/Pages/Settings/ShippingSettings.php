<?php

namespace App\Filament\Resources\SettingResource\Pages\Settings;

use App\Filament\Resources\SettingResource;
use Filament\Resources\Pages\Page;

class ShippingSettings extends Page
{
    protected static string $resource = SettingResource::class;

    protected static string $view = 'filament.resources.settings-resource.pages.settings.shipping-settings';
}
