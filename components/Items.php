<?php namespace Shohabbos\RestaurantMenu\Components;

use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Shohabbos\RestaurantMenu\Models\Item;

class Items extends ComponentBase
{
    /**
     * @var Collection A collection of items to display
     */
    public $items;

    /**
     * @var string Reference to the page name for linking to items.
     */
    public $itemPage;

    public function componentDetails()
    {
        return [
            'name'        => 'shohabbos.restaurantmenu::lang.components.items_title',
            'description' => 'shohabbos.restaurantmenu::lang.components.items_description'
        ];
    }

    public function defineProperties()
    {
        return [
            'itemPage' => [
                'title'       => 'shohabbos.restaurantmenu::lang.components.items_page',
                'description' => 'shohabbos.restaurantmenu::lang.components.items_page_description',
                'type'        => 'dropdown',
                'default'     => 'items',
                'group'       => 'Links',
            ],
        ];
    }
  
    public function onRun()
    {
        $this->itemPage = $this->page['itemPage'] = $this->property('itemPage');
        $this->items = $this->page['items'] = $this->loadItems();
    }

    public function getItemPageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

    public function loadItems()
    {
        $items = Item::all();

        /*
         * Add a "url" helper attribute for linking to each items
         */
        return $this->linkItems($items);
    }


    protected function linkItems($items)
    {
        return $items->each(function($category) {
            $category->setUrl($this->itemPage, $this->controller);
        });
    }

}
