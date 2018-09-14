<?php namespace Shohabbos\RestaurantMenu;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Shohabbos\RestaurantMenu\Components\Items' => 'menuItems',
            'Shohabbos\RestaurantMenu\Components\Categories' => 'menuCategories',
        ];
    }

    public function registerSettings()
    {
    }
}
