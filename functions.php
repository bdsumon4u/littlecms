<?php

use Joaopaulolndev\FilamentGeneralSettings\Models\GeneralSetting;

if (! function_exists('setting')) {
    function setting(string $key, $default = null): mixed
    {
        return GeneralSetting::query()->value($key) ?? $default;
    }
}
