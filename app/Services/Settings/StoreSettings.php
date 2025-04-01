<?php

namespace App\Services\Settings;

class StoreSettings extends BaseSettingsService
{
    /**
     * The settings group this service manages.
     *
     * @var string
     */
    protected string $group = 'store';
    
    /**
     * Get the store name.
     *
     * @param  string  $default
     * @return string
     */
    public function getStoreName($default = 'Our Store')
    {
        return $this->get('store_name', $default);
    }
    
    /**
     * Get the default currency.
     *
     * @param  string  $default
     * @return string
     */
    public function getCurrency($default = 'USD')
    {
        return $this->get('currency', $default);
    }
    
    /**
     * Get the tax rate.
     *
     * @param  float  $default
     * @return float
     */
    public function getTaxRate($default = 0)
    {
        return (float) $this->get('tax_rate', $default);
    }
    
    /**
     * Get the inventory threshold.
     *
     * @param  int  $default
     * @return int
     */
    public function getInventoryThreshold($default = 5)
    {
        return (int) $this->get('inventory_threshold', $default);
    }
    
    /**
     * Format a price with the store currency.
     *
     * @param  float  $price
     * @return string
     */
    public function formatPrice($price)
    {
        $currency = $this->getCurrency();
        
        // Simple formatting for common currencies
        switch ($currency) {
            case 'USD':
                return '$' . number_format($price, 2);
            case 'EUR':
                return '€' . number_format($price, 2);
            case 'GBP':
                return '£' . number_format($price, 2);
            default:
                return $currency . ' ' . number_format($price, 2);
        }
    }
    
    /**
     * Calculate price with tax.
     *
     * @param  float  $price
     * @return float
     */
    public function calculatePriceWithTax($price)
    {
        $taxRate = $this->getTaxRate();
        
        return $price * (1 + ($taxRate / 100));
    }
    
    /**
     * Format a price with tax included.
     *
     * @param  float  $price
     * @return string
     */
    public function formatPriceWithTax($price)
    {
        return $this->formatPrice($this->calculatePriceWithTax($price));
    }
}