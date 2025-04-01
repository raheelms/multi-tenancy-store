<?php

namespace App\Services\Settings;

class GeneralSettings extends BaseSettingsService
{
    /**
     * The settings group this service manages.
     *
     * @var string
     */
    protected string $group = 'general';
    
    /**
     * Get the application name.
     *
     * @param  string  $default
     * @return string
     */
    public function getAppName($default = 'My Application')
    {
        return $this->get('app_name', $default);
    }
    
    /**
     * Get the application URL.
     *
     * @param  string  $default
     * @return string
     */
    public function getAppUrl($default = 'http://localhost')
    {
        return $this->get('app_url', $default);
    }
    
    /**
     * Get the admin email.
     *
     * @param  string  $default
     * @return string
     */
    public function getAdminEmail($default = 'admin@example.com')
    {
        return $this->get('admin_email', $default);
    }
    
    /**
     * Check if debug mode is enabled.
     *
     * @param  bool  $default
     * @return bool
     */
    public function isDebugEnabled($default = false)
    {
        return (bool) $this->get('app_debug', $default);
    }
    
    /**
     * Get the default timezone.
     *
     * @param  string  $default
     * @return string
     */
    public function getTimezone($default = 'UTC')
    {
        return $this->get('timezone', $default);
    }
}