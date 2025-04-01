<?php

namespace App\Services\Settings;

class LocalizationSettings extends BaseSettingsService
{
    /**
     * The settings group this service manages.
     *
     * @var string
     */
    protected string $group = 'localization';
    
    /**
     * Get the default locale.
     *
     * @param  string  $default
     * @return string
     */
    public function getDefaultLocale($default = 'en')
    {
        return $this->get('default_locale', $default);
    }
    
    /**
     * Get available locales.
     *
     * @param  array  $default
     * @return array
     */
    public function getAvailableLocales($default = ['en' => 'English'])
    {
        return $this->get('available_locales', $default);
    }
    
    /**
     * Get the date format.
     *
     * @param  string  $default
     * @return string
     */
    public function getDateFormat($default = 'Y-m-d')
    {
        return $this->get('date_format', $default);
    }
    
    /**
     * Get the time format.
     *
     * @param  string  $default
     * @return string
     */
    public function getTimeFormat($default = 'H:i')
    {
        return $this->get('time_format', $default);
    }
    
    /**
     * Get the timezone.
     *
     * @param  string  $default
     * @return string
     */
    public function getTimezone($default = 'UTC')
    {
        return $this->get('timezone', $default);
    }
    
    /**
     * Check if automatic language detection is enabled.
     *
     * @param  bool  $default
     * @return bool
     */
    public function isAutoDetectLanguage($default = false)
    {
        return (bool) $this->get('auto_detect_language', $default);
    }
    
    /**
     * Format a date according to the configured date format.
     *
     * @param  \DateTime|string  $date
     * @return string
     */
    public function formatDate($date)
    {
        if (is_string($date)) {
            $date = new \DateTime($date);
        }
        
        return $date->format($this->getDateFormat());
    }
    
    /**
     * Format a time according to the configured time format.
     *
     * @param  \DateTime|string  $time
     * @return string
     */
    public function formatTime($time)
    {
        if (is_string($time)) {
            $time = new \DateTime($time);
        }
        
        return $time->format($this->getTimeFormat());
    }
}