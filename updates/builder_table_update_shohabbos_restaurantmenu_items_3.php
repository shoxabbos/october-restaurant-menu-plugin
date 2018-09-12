<?php namespace Shohabbos\RestaurantMenu\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateShohabbosRestaurantmenuItems3 extends Migration
{
    public function up()
    {
        Schema::table('shohabbos_restaurantmenu_items', function($table)
        {
            $table->string('mini_desc', 255)->nullable();
            $table->text('desc')->nullable()->change();
            $table->integer('price')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('shohabbos_restaurantmenu_items', function($table)
        {
            $table->dropColumn('mini_desc');
            $table->text('desc')->nullable(false)->change();
            $table->integer('price')->nullable(false)->change();
        });
    }
}
