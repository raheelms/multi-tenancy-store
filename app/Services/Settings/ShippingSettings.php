<?php

namespace App\Services\Settings;

class ShippingSettings extends BaseSettingsService
{
    /**
     * The settings group this service manages.
     *
     * @var string
     */
    protected string $group = 'shipping';
    
    /**
     * Get shipping method.
     *
     * @param  string  $default
     * @return string
     */
    public function getShippingMethod($default = 'flat_rate')
    {
        return $this->get('shipping_method', $default);
    }
    
    /**
     * Get flat rate shipping cost.
     *
     * @param  float  $default
     * @return float
     */
    public function getFlatRateCost($default = 5.0)
    {
        return (float) $this->get('flat_rate_cost', $default);
    }
    
    /**
     * Get free shipping minimum order amount.
     *
     * @param  float  $default
     * @return float
     */
    public function getFreeShippingMinimum($default = 100.0)
    {
        return (float) $this->get('free_shipping_minimum', $default);
    }
    
    /**
     * Check if free shipping is enabled.
     *
     * @param  bool  $default
     * @return bool
     */
    public function isFreeShippingEnabled($default = true)
    {
        return (bool) $this->get('free_shipping_enabled', $default);
    }
    
    /**
     * Get shipping countries.
     *
     * @param  array  $default
     * @return array
     */
    public function getShippingCountries($default = ['US', 'CA', 'MX'])
    {
        return $this->get('shipping_countries', $default);
    }
    
    /**
     * Check if international shipping is enabled.
     *
     * @param  bool  $default
     * @return bool
     */
    public function isInternationalShippingEnabled($default = false)
    {
        return (bool) $this->get('international_shipping', $default);
    }
    
    /**
     * Get shipping zones.
     *
     * @param  array  $default
     * @return array
     */
    public function getShippingZones($default = [])
    {
        return $this->get('shipping_zones', $default);
    }
}