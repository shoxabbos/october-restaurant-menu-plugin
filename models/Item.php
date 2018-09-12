<?php namespace Shohabbos\RestaurantMenu\Models;

use Model;

/**
 * Model
 */
class Item extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    public $attachMany = [
        'photos' => 'System\Models\File'
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'shohabbos_restaurantmenu_items';

    public $belongsTo = [
        'category' => 'Shohabbos\RestaurantMenu\Models\Category'
    ];

    public function getCategoryIdOptions($keyValue = null) {
        return Category::lists('title', 'id');
    }

}
