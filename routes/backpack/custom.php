<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('category', 'CategoryCrudController');
    CRUD::resource('material', 'MaterialCrudController');
    CRUD::resource('order', 'OrderCrudController');
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin_dashboard');
    Route::get('/stats/{id}', 'AdminController@cat_stats')->name('cat_stats');
    CRUD::resource('menu', 'MenuCrudController');
    CRUD::resource('slider', 'SliderCrudController');
    CRUD::resource('advertisement', 'AdvertisementCrudController');
    CRUD::resource('new', 'NewCrudController');
    CRUD::resource('news', 'NewsCrudController');
    CRUD::resource('show', 'ShowCrudController');
    CRUD::resource('pageslider', 'PageSliderCrudController');
    CRUD::resource('text', 'TextCrudController');
    CRUD::resource('description', 'DescriptionCrudController');
    CRUD::resource('page_ad', 'PageAdCrudController');
    CRUD::resource('pagead', 'PageAdCrudController');
    CRUD::resource('page', 'PageCrudController');
    CRUD::resource('programme', 'ProgrammeCrudController');
}); // this should be the absolute last line of this file