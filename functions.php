<?php

use Datlechin\FilamentMenuBuilder\Models\Menu;
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

if (! function_exists('menu')) {
    function menu(string $location, $default = []): mixed
    {
        return Menu::location($location)->menuItems ?? $default;
    }
}
