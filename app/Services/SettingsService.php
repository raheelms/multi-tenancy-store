<?php

namespace App\Services;

use App\Services\Settings\GeneralSettings;
use App\Services\Settings\StoreSettings;
use App\Services\Settings\MailSettings;
use App\Services\Settings\PaymentSettings;
use App\Services\Settings\ShippingSettings;
use App\Services\Settings\LocalizationSettings;

class SettingsService
{
    protected $services = [];
    
    /**
     * Get a settings service by group.
     *
     * @param string $group
     * @return mixed
     */
    public function group($group)
    {
        if (isset($this->services[$group])) {
            return $this->services[$group];
        }
        
        $serviceClass = $this->resolveServiceClass($group);
        
        if (class_exists($serviceClass)) {
            $this->services[$group] = app($serviceClass);
            return $this->services[$group];
        }
        
        throw new \InvalidArgumentException("Settings group '{$group}' not found.");
    }
    
    /**
     * Get the general settings service.
     *
     * @return \App\Services\Settings\GeneralSettings
     */
    public function general()
    {
        return $this->group('general');
    }
    
    /**
     * Get the store settings service.
     *
     * @return \App\Services\Settings\StoreSettings
     */
    public function store()
    {
        return $this->group('store');
    }
    
    /**
     * Get the mail settings service.
     *
     * @return \App\Services\Settings\MailSettings
     */
    public function mail()
    {
        return $this->group('mail');
    }
    
    /**
     * Get the payment settings service.
     *
     * @return \App\Services\Settings\PaymentSettings
     */
    public function payment()
    {
        return $this->group('payment');
    }
    
    /**
     * Get the shipping settings service.
     *
     * @return \App\Services\Settings\ShippingSettings
     */
    public function shipping()
    {
        return $this->group('shipping');
    }
    
    /**
     * Get the localization settings service.
     *
     * @return \App\Services\Settings\LocalizationSettings
     */
    public function localization()
    {
        return $this->group('localization');
    }
    
    /**
     * Resolve the service class for a group.
     *
     * @param string $group
     * @return string
     */
    protected function resolveServiceClass($group)
    {
        $class = 'App\\Services\\Settings\\' . ucfirst($group) . 'Settings';
        
        return $class;
    }
    
    /**
     * Dynamically pass methods to the appropriate settings group.
     *
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        // Try to guess the group from the method name
        foreach (config('settings.groups', []) as $group => $config) {
            $prefix = $group;
            
            if (strpos($method, $prefix) === 0) {
                $realMethod = lcfirst(substr($method, strlen($prefix)));
                return $this->group($group)->$realMethod(...$parameters);
            }
        }
        
        // Default to general settings
        return $this->general()->$method(...$parameters);
    }
}