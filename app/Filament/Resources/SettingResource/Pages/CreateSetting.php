<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Http\Request;

class CreateSetting extends CreateRecord
{
    protected static string $resource = SettingResource::class;
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Pre-select group if provided in the request
        if (request()->has('group')) {
            $data['group'] = request()->query('group');
        }
        
        return $data;
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}