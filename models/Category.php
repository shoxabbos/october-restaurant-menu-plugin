<?php namespace Shohabbos\RestaurantMenu\Models;

use Model;

/**
 * Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    public $attachOne = [
        'photo' => 'System\Models\File'
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'shohabbos_restaurantmenu_categories';

    public $hasMany = [
        'items' => 'Shohabbos\RestaurantMenu\Models\Item'
    ];
}