<?php namespace Shohabbos\RestaurantMenu\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateShohabbosRestaurantmenuCategories3 extends Migration
{
    public function up()
    {
        Schema::table('shohabbos_restaurantmenu_categories', function($table)
        {
            $table->integer('parent_id')->nullable()->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('shohabbos_restaurantmenu_categories', function($table)
        {
            $table->dropColumn('parent_id');
        });
    }
}
