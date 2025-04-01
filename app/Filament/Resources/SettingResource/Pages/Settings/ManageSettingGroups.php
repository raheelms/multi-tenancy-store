<?php

namespace App\Filament\Resources\SettingResource\Pages\Settings;

use App\Filament\Resources\SettingResource;
use Filament\Resources\Pages\Page;

class ManageSettingGroups extends Page
{
    protected static string $resource = SettingResource::class;

    protected static string $view = 'filament.resources.settings-resource.pages.settings.manage-setting-groups';
}
