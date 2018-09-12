<?php namespace shohabbos\RestaurantMenu\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateShohabbosRestaurantmenuItems2 extends Migration
{
    public function up()
    {
        Schema::table('shohabbos_restaurantmenu_items', function($table)
        {
            $table->integer('category_id')->unsigned()->change();
        });
    }
    
    public function down()
    {
        Schema::table('shohabbos_restaurantmenu_items', function($table)
        {
            $table->integer('category_id')->unsigned(false)->change();
        });
    }
}
