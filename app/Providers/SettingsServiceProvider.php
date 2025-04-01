<?php

namespace App\Providers;

use App\Models\Setting;
use App\Services\Settings\GeneralSettings;
use App\Services\Settings\StoreSettings;
use App\Services\Settings\MailSettings;
use App\Services\Settings\PaymentSettings;
use App\Services\Settings\ShippingSettings;
use App\Services\Settings\LocalizationSettings;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register the settings singleton
        $this->app->singleton('settings', function ($app) {
            return new Setting();
        });
        
        // Register settings services
        $this->app->singleton(GeneralSettings::class);
        $this->app->singleton(StoreSettings::class);
        $this->app->singleton(MailSettings::class);
        $this->app->singleton(PaymentSettings::class);
        $this->app->singleton(ShippingSettings::class);
        $this->app->singleton(LocalizationSettings::class);
        
        // Register aliases for easier access
        $this->app->alias(GeneralSettings::class, 'settings.general');
        $this->app->alias(StoreSettings::class, 'settings.store');
        $this->app->alias(MailSettings::class, 'settings.mail');
        $this->app->alias(PaymentSettings::class, 'settings.payment');
        $this->app->alias(ShippingSettings::class, 'settings.shipping');
        $this->app->alias(LocalizationSettings::class, 'settings.localization');
        
        // Merge config
        $this->mergeConfigFrom(
            __DIR__.'/../../config/settings.php', 'settings'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Register heroicon blade components used in settings views
        Blade::componentNamespace('Illuminate\\View\\Component', 'heroicon');
        
        // Configure mail settings if needed
        if (config('settings.configure_mail', false)) {
            $this->configureMailFromSettings();
        }
        
        // Publish config file
        $this->publishes([
            __DIR__.'/../../config/settings.php' => config_path('settings.php'),
        ], 'settings-config');

        // Publish migrations
        $this->publishes([
            __DIR__.'/../../database/migrations/create_settings_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_settings_table.php'),
        ], 'settings-migrations');
        
        // Publish views
        $this->publishes([
            __DIR__.'/../../resources/views/components/settings' => resource_path('views/components/settings'),
            __DIR__.'/../../resources/views/filament/resources/settings-resource' => resource_path('views/filament/resources/settings-resource'),
        ], 'settings-views');
        
        // Load views
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'settings');
    }
    
    /**
     * Configure mail settings from the database.
     *
     * @return void
     */
    protected function configureMailFromSettings()
    {
        $mailSettings = $this->app->make(MailSettings::class);
        $config = $mailSettings->getMailConfig();
        
        foreach ($config as $key => $value) {
            if (!is_null($value)) {
                if ($key === 'from') {
                    config(['mail.from.address' => $value['address']]);
                    config(['mail.from.name' => $value['name']]);
                } else {
                    config(['mail.' . $key => $value]);
                }
            }
        }
    }
}