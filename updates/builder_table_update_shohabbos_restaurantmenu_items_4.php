<?php namespace Shohabbos\RestaurantMenu\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateShohabbosRestaurantmenuItems4 extends Migration
{
    public function up()
    {
        Schema::table('shohabbos_restaurantmenu_items', function($table)
        {
            $table->string('slug', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('shohabbos_restaurantmenu_items', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
