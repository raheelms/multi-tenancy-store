<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages\Settings;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?string $navigationGroup = 'System';

    protected static ?string $recordTitleAttribute = 'key';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('key')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                            
                        Forms\Components\Select::make('group')
                            ->options(collect(config('settings.groups'))->mapWithKeys(function ($item, $key) {
                                return [$key => $item['label']];
                            }))
                            ->required(),
                            
                        Forms\Components\Select::make('type')
                            ->options(config('settings.types', [
                                'text' => 'Text',
                                'textarea' => 'Text Area',
                                'number' => 'Number',
                                'boolean' => 'Boolean',
                                'select' => 'Select',
                                'multiselect' => 'Multi Select',
                                'date' => 'Date',
                                'time' => 'Time',
                                'datetime' => 'Date Time',
                                'color' => 'Color',
                                'file' => 'File',
                                'image' => 'Image',
                                'json' => 'JSON',
                            ]))
                            ->required()
                            ->reactive(),
                            
                        Forms\Components\Toggle::make('is_private')
                            ->label('Private')
                            ->helperText('Private settings are not exposed via API'),
                            
                        Forms\Components\Textarea::make('description')
                            ->maxLength(65535),
                            
                        Forms\Components\Textarea::make('options')
                            ->visible(fn ($get) => in_array($get('type'), ['select', 'multiselect']))
                            ->helperText('Enter options as JSON: {"key1":"value1","key2":"value2"}'),
                            
                        Forms\Components\Textarea::make('value')
                            ->label('Default Value')
                            ->helperText('For select/multiselect, use keys from options'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('group')
                    ->badge()
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\IconColumn::make('is_private')
                    ->boolean()
                    ->label('Private')
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('type')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('group')
                    ->options(collect(config('settings.groups'))->mapWithKeys(function ($item, $key) {
                        return [$key => $item['label']];
                    })),
                    
                Tables\Filters\SelectFilter::make('type')
                    ->options(config('settings.types', [
                        'text' => 'Text',
                        'textarea' => 'Text Area',
                        'number' => 'Number',
                        'boolean' => 'Boolean',
                        'select' => 'Select',
                        'multiselect' => 'Multi Select',
                        'date' => 'Date',
                        'time' => 'Time',
                        'datetime' => 'Date Time',
                        'color' => 'Color',
                        'file' => 'File',
                        'image' => 'Image',
                        'json' => 'JSON',
                    ])),
                    
                Tables\Filters\TernaryFilter::make('is_private')
                    ->label('Private Settings'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => SettingResource\Pages\ListSetting::route('/'),
            'create' => SettingResource\Pages\CreateSetting::route('/create'),
            'edit' => SettingResource\Pages\EditSetting::route('/{record}/edit'),
            'dashboard' => SettingResource\Pages\Settings\Dashboard::route('/dashboard'),
            'general' => SettingResource\Pages\Settings\GeneralSettings::route('/settings/general'),
            'store' => SettingResource\Pages\Settings\StoreSettings::route('/settings/store'),
            'mail' => SettingResource\Pages\Settings\MailSettings::route('/settings/mail'),
            'payment' => SettingResource\Pages\Settings\PaymentSettings::route('/settings/payment'),
            'shipping' => SettingResource\Pages\Settings\ShippingSettings::route('/settings/shipping'),
            'localization' => SettingResource\Pages\Settings\LocalizationSettings::route('/settings/localization'),
            'manage-groups' => SettingResource\Pages\Settings\ManageSettingGroups::route('/settings/manage-groups'),
        ];
    }
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}