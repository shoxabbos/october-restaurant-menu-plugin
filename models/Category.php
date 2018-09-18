<?php namespace Shohabbos\RestaurantMenu\Models;

use Model;

/**
 * Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Nullable;
    
    /**
     * @var array Nullable attributes.
     */
    protected $nullable = ['parent_id'];

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

    public $hasOne = [
        'parent' => [
            'Shohabbos\RestaurantMenu\Models\Category', 
            'key' => 'id',
            'otherKey' => 'parent_id'
        ]
    ];

    public $hasMany = [
        'items' => 'Shohabbos\RestaurantMenu\Models\Item',
        'childs' => [
            'Shohabbos\RestaurantMenu\Models\Category', 
            'key' => 'parent_id',
            'otherKey' => 'id'
        ]
    ];

    public function getParentIdOptions() {
        return self::where('parent_id', null)
            ->where('id', '!=', $this->id)
            ->lists('title', 'id');
    }

    /**
     * Sets the "url" attribute with a URL to this object
     * @param string $pageName
     * @param Cms\Classes\Controller $controller
     */
    public function setUrl($pageName, $controller)
    {
        $params = [
            'id'   => $this->id,
            'slug' => $this->slug,
        ];

        return $this->url = $controller->pageUrl($pageName, $params);
    }
}
