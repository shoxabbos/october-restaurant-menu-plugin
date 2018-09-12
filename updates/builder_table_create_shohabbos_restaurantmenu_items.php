<?php namespace shohabbos\RestaurantMenu\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateShohabbosRestaurantmenuItems extends Migration
{
    public function up()
    {
        Schema::create('shohabbos_restaurantmenu_items', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title', 255);
            $table->text('desc');
            $table->integer('category_id');
            $table->string('photo', 255);
            $table->integer('price');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('shohabbos_restaurantmenu_items');
    }
}
