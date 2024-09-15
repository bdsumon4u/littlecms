<?php

use Joaopaulolndev\FilamentGeneralSettings\Models\GeneralSetting;

if (! function_exists('setting')) {
    function setting(?string $key = null, $default = null): mixed
    {
        if (! $key) {
            return GeneralSetting::query()->first();
        }

        return GeneralSetting::query()->value($key) ?? $default;
    }
}
