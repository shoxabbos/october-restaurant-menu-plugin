<?php namespace Shohabbos\RestaurantMenu\Components;

use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Shohabbos\RestaurantMenu\Models\Category as Category;

class Categories extends ComponentBase
{
    /**
     * @var Collection A collection of categories to display
     */
    public $categories;

    /**
     * @var string Reference to the page name for linking to categories.
     */
    public $categoryPage;

    public function componentDetails()
    {
        return [
            'name'        => 'shohabbos.restaurantmenu::lang.components.category_title',
            'description' => 'shohabbos.restaurantmenu::lang.components.category_description'
        ];
    }

    public function defineProperties()
    {
        return [
            'categoryPage' => [
                'title'       => 'shohabbos.restaurantmenu::lang.components.category_page',
                'description' => 'shohabbos.restaurantmenu::lang.components.category_page_description',
                'type'        => 'dropdown',
                'default'     => 'category',
                'group'       => 'Links',
            ],
        ];
    }
  
    public function onRun()
    {
        $this->categoryPage = $this->page['categoryPage'] = $this->property('categoryPage');
        $this->categories = $this->page['categories'] = $this->loadCategories();
    }

    public function getCategoryPageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

    public function loadCategories()
    {
        $categories = Category::all();

        /*
         * Add a "url" helper attribute for linking to each category
         */
        return $this->linkCategories($categories);
    }


    protected function linkCategories($categories)
    {
        return $categories->each(function($category) {
            $category->setUrl($this->categoryPage, $this->controller);
        });
    }

}
