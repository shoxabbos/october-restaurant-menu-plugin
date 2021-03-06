<?php namespace shohabbos\RestaurantMenu\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateShohabbosRestaurantmenuCategories extends Migration
{
    public function up()
    {
        Schema::table('shohabbos_restaurantmenu_categories', function($table)
        {
            $table->dropColumn('photo');
        });
    }
    
    public function down()
    {
        Schema::table('shohabbos_restaurantmenu_categories', function($table)
        {
            $table->string('photo', 255);
        });
    }
}
