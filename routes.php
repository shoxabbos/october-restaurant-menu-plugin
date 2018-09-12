<?php
Route::group(['prefix' => 'api/v1'], function () {
   Route::resource('categories', 'Shohabbos\RestaurantMenu\Controllers\Api\CategoryController');
});