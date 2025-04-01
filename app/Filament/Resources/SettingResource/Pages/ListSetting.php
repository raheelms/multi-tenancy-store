<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSetting extends ListRecords
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            
            Actions\Action::make('dashboard')
                ->label('Settings Dashboard')
                ->icon('heroicon-o-presentation-chart-bar')
                ->url(route('filament.admin.resources.settings.dashboard')),
        ];
    }
}