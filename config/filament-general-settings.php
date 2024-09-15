<?php

use Joaopaulolndev\FilamentGeneralSettings\Enums\TypeFieldEnum;

return [
    'show_application_tab' => true,
    'show_logo_and_favicon' => true,
    'show_analytics_tab' => true,
    'show_seo_tab' => true,
    'show_email_tab' => true,
    'show_social_networks_tab' => true,
    'expiration_cache_config_time' => 60,
    'show_custom_tabs' => true,
    'custom_tabs' => [
        'more_configs' => [
            'label' => 'More Configs',
            'icon' => 'heroicon-o-plus-circle',
            'columns' => 1,
            'fields' => [
                'location' => [
                    'type' => TypeFieldEnum::Textarea->value,
                    'label' => 'Address/Location',
                    'placeholder' => 'Street, City, State, Zip Code',
                    'rows' => 3,
                    'required' => true,
                ],
                'hours' => [
                    'type' => TypeFieldEnum::Textarea->value,
                    'label' => 'Opening Hours',
                    'placeholder' => 'Monday - Friday: 8:00 AM - 5:00 PM',
                    'rows' => '3',
                    'required' => true,
                ],
                'map' => [
                    'type' => TypeFieldEnum::Text->value,
                    'label' => 'Google Map Embed Code',
                    'placeholder' => 'Insert the <iframe> code here',
                    'required' => false,
                    'rules' => 'nullable',
                ],
            ],
        ],
    ],
];
