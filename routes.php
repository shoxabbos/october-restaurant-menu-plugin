<?php
Route::group(['prefix' => 'api/v1'], function () {
   Route::resource('categories', 'Shohabbos\RestaurantMenu\Controllers\Api\CategoryController');
});

Route::group(['prefix' => 'api/v1'], function () {
   Route::resource('items', 'Shohabbos\RestaurantMenu\Controllers\Api\ItemController');
});