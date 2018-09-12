<?php namespace shohabbos\RestaurantMenu\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateShohabbosRestaurantmenuCategories extends Migration
{
    public function up()
    {
        Schema::create('shohabbos_restaurantmenu_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title', 255);
            $table->string('desc', 255);
            $table->string('photo', 255);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('shohabbos_restaurantmenu_categories');
    }
}
