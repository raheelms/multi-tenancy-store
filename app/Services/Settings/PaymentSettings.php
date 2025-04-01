<?php

namespace App\Services\Settings;

class PaymentSettings extends BaseSettingsService
{
    /**
     * The settings group this service manages.
     *
     * @var string
     */
    protected string $group = 'payment';
    
    /**
     * Get the payment gateway.
     *
     * @param  string  $default
     * @return string
     */
    public function getPaymentGateway($default = 'stripe')
    {
        return $this->get('payment_gateway', $default);
    }
    
    /**
     * Get the payment currency.
     *
     * @param  string  $default
     * @return string
     */
    public function getCurrency($default = 'USD')
    {
        return $this->get('currency', $default);
    }
    
    /**
     * Get the Stripe API key.
     *
     * @param  string|null  $default
     * @return string|null
     */
    public function getStripeApiKey($default = null)
    {
        return $this->get('stripe_api_key', $default);
    }
    
    /**
     * Get the Stripe webhook secret.
     *
     * @param  string|null  $default
     * @return string|null
     */
    public function getStripeWebhookSecret($default = null)
    {
        return $this->get('stripe_webhook_secret', $default);
    }
    
    /**
     * Get the PayPal client ID.
     *
     * @param  string|null  $default
     * @return string|null
     */
    public function getPaypalClientId($default = null)
    {
        return $this->get('paypal_client_id', $default);
    }
    
    /**
     * Get the PayPal client secret.
     *
     * @param  string|null  $default
     * @return string|null
     */
    public function getPaypalClientSecret($default = null)
    {
        return $this->get('paypal_client_secret', $default);
    }
    
    /**
     * Check if test mode is enabled.
     *
     * @param  bool  $default
     * @return bool
     */
    public function isTestMode($default = false)
    {
        return (bool) $this->get('test_mode', $default);
    }
}