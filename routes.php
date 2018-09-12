<?php
Route::group(['prefix' => 'api/v1'], function () {
   Route::resource('categories', 'shohabbos\RestaurantMenu\Controllers\Api\CategoryController');
});