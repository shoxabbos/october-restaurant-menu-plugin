<?php namespace shohabbos\RestaurantMenu\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Items extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'shohabbos.restaurantmenu.manage_item' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('shohabbos.RestaurantMenu', 'restaurant', 'items');
    }
}
