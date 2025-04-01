<?php

namespace App\Services\Settings;

class MailSettings extends BaseSettingsService
{
    /**
     * The settings group this service manages.
     *
     * @var string
     */
    protected string $group = 'mail';
    
    /**
     * Get the mail driver.
     *
     * @param  string  $default
     * @return string
     */
    public function getMailDriver($default = 'smtp')
    {
        return $this->get('mail_driver', $default);
    }
    
    /**
     * Get the mail host.
     *
     * @param  string  $default
     * @return string
     */
    public function getMailHost($default = 'smtp.mailtrap.io')
    {
        return $this->get('mail_host', $default);
    }
    
    /**
     * Get the mail port.
     *
     * @param  int  $default
     * @return int
     */
    public function getMailPort($default = 2525)
    {
        return (int) $this->get('mail_port', $default);
    }
    
    /**
     * Get the mail username.
     *
     * @param  string|null  $default
     * @return string|null
     */
    public function getMailUsername($default = null)
    {
        return $this->get('mail_username', $default);
    }
    
    /**
     * Get the mail password.
     *
     * @param  string|null  $default
     * @return string|null
     */
    public function getMailPassword($default = null)
    {
        return $this->get('mail_password', $default);
    }
    
    /**
     * Get the mail encryption.
     *
     * @param  string|null  $default
     * @return string|null
     */
    public function getMailEncryption($default = 'tls')
    {
        return $this->get('mail_encryption', $default);
    }
    
    /**
     * Get the mail from address.
     *
     * @param  string  $default
     * @return string
     */
    public function getMailFromAddress($default = 'hello@example.com')
    {
        return $this->get('mail_from_address', $default);
    }
    
    /**
     * Get the mail from name.
     *
     * @param  string  $default
     * @return string
     */
    public function getMailFromName($default = 'Example')
    {
        return $this->get('mail_from_name', $default);
    }
    
    /**
     * Get mail configuration as an array for Laravel's config system.
     *
     * @return array
     */
    public function getMailConfig()
    {
        return [
            'driver' => $this->getMailDriver(),
            'host' => $this->getMailHost(),
            'port' => $this->getMailPort(),
            'username' => $this->getMailUsername(),
            'password' => $this->getMailPassword(),
            'encryption' => $this->getMailEncryption(),
            'from' => [
                'address' => $this->getMailFromAddress(),
                'name' => $this->getMailFromName(),
            ],
        ];
    }
}