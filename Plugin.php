<?php namespace Shohabbos\RestaurantMenu;

use System\Classes\PluginBase;
use Event;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'rainlab.blog::lang.plugin.name',
            'description' => 'rainlab.blog::lang.plugin.description',
            'author'      => 'Shohabbos Olimjonov',
            'icon'        => 'icon-columns',
            'homepage'    => 'https://github.com/shoxabbos/october-restaurant-menu-plugin'
        ];
    }

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

    public function boot()
    {
//        \Event::listen('backend.menu.extendItems', function($navigationManager) {
//            $navigationManager->removeMainMenuItem('October.System', 'system');
//            $navigationManager->removeMainMenuItem('October.backend', 'backend');
//            $navigationManager->removeMainMenuItem('October.backend', 'media');
//            $navigationManager->removeMainMenuItem('October.cms', 'cms');
//            $navigationManager->removeMainMenuItem('Rainlab.Builder', 'builder');
//        });
    }
}
