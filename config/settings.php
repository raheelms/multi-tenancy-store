<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Settings Groups
    |--------------------------------------------------------------------------
    |
    | Define the settings groups available in the application.
    | Each group should have a label, icon, and optional description.
    |
    */
    'groups' => [
        'general' => [
            'label' => 'General',
            'icon' => 'heroicon-o-cog-6-tooth',
            'description' => 'Basic application settings',
        ],
        'store' => [
            'label' => 'Store',
            'icon' => 'heroicon-o-shopping-bag',
            'description' => 'E-commerce and store settings',
        ],
        'mail' => [
            'label' => 'Mail',
            'icon' => 'heroicon-o-envelope',
            'description' => 'Email and notification settings',
        ],
        'payment' => [
            'label' => 'Payment',
            'icon' => 'heroicon-o-credit-card',
            'description' => 'Payment gateway and transaction settings',
        ],
        'shipping' => [
            'label' => 'Shipping',
            'icon' => 'heroicon-o-truck',
            'description' => 'Shipping and delivery options',
        ],
        'localization' => [
            'label' => 'Localization',
            'icon' => 'heroicon-o-globe-alt',
            'description' => 'Language, currency, and regional settings',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Setting Types
    |--------------------------------------------------------------------------
    |
    | Define the available setting types and their labels.
    |
    */
    'types' => [
        'text' => 'Text',
        'textarea' => 'Text Area',
        'number' => 'Number',
        'email' => 'Email',
        'url' => 'URL',
        'password' => 'Password',
        'boolean' => 'Boolean',
        'toggle' => 'Toggle',
        'select' => 'Select',
        'multiselect' => 'Multi Select',
        'date' => 'Date',
        'time' => 'Time',
        'datetime' => 'Date Time',
        'color' => 'Color',
        'file' => 'File',
        'image' => 'Image',
        'json' => 'JSON',
    ],

    /*
    |--------------------------------------------------------------------------
    | Auto-configure Mail Settings
    |--------------------------------------------------------------------------
    |
    | If true, the mail settings from the database will be applied to the
    | Laravel mail configuration automatically.
    |
    */
    'configure_mail' => true,

    /*
    |--------------------------------------------------------------------------
    | Cache Settings
    |--------------------------------------------------------------------------
    |
    | Configuration for settings caching
    |
    */
    'cache' => [
        'enabled' => true,
        'ttl' => 86400, // 24 hours
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Path for File Uploads
    |--------------------------------------------------------------------------
    |
    | Where files uploaded through settings should be stored
    |
    */
    'uploads_path' => 'settings',
];