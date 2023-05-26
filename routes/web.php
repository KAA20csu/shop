<?php
use Illuminate\Support\Facades\Route;

// маршрут для главной страницы без указания метода
Route::get('/', 'IndexController')->name('index');

Route::get('/catalog/index', 'CatalogController@index')->name('catalog.index');
Route::get('/catalog/category/{slug}', 'CatalogController@category')->name('catalog.category');
Route::get('/catalog/brand/{slug}', 'CatalogController@brand')->name('catalog.brand');
Route::get('/catalog/product/{slug}', 'CatalogController@product')->name('catalog.product');

Route::get('/basket/index', 'BasketController@index')->name('basket.index');
Route::get('/basket/checkout', 'BasketController@checkout')->name('basket.checkout');

Route::post('/basket/add/{id}', 'BasketController@add')
    ->where('id', '[0-9]+')
    ->name('basket.add');
    Route::post('/basket/plus/{id}', 'BasketController@plus')
    ->where('id', '[0-9]+')
    ->name('basket.plus');
Route::post('/basket/minus/{id}', 'BasketController@minus')
    ->where('id', '[0-9]+')
    ->name('basket.minus');
    Route::post('/basket/remove/{id}', 'BasketController@remove')
    ->where('id', '[0-9]+')
    ->name('basket.remove');
Route::post('/basket/clear', 'BasketController@clear')->name('basket.clear');

Route::get('/basket/success', 'BasketController@success')
    ->name('basket.success');
    
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::name('user.')->prefix('user')->group(function () {
    Route::get('index', 'UserController@index')->name('index');
    Auth::routes();
});

Route::post('/basket/saveorder', 'BasketController@saveOrder')->name('basket.saveorder');

Route::group([
    'as' => 'admin.', 
    'prefix' => 'admin', 
    'namespace' => 'Admin', 
    'middleware' => ['auth', 'admin'] 
], function () {
    Route::get('index', 'AdminController')->name('index');
    Route::resource('role', 'RoleController');
});