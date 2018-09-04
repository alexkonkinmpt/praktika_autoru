<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Объявляем маршруты для ресурсного контроллера MessagesController,
// назначая слово products префиксом URI
Route::resource('messages', 'MessagesController');
// Т. к. метод remove() не предусмотрен в ресурсных контроллерах,
// объявляем маршрут самостоятельно.
Route::get('messages/{message}/remove', 'MessagesController@remove')
     ->name('messages.remove');

//PhotosController
Route::resource('photos', 'PhotosController');

Route::get('photos/{photo}/remove', 'PhotosController@remove')
          ->name('photos.remove');

//StatusesController
Route::resource('statuses', 'StatusesController');

Route::get('statuses/{status}/remove', 'StatusesController@remove')
     ->name('statuses.remove');

//TypesController
Route::resource('types', 'TypesController');

Route::get('types/{type}/remove', 'TypesController@remove')
     ->name('types.remove');

//VehiclesController
Route::resource('vehicles', 'VehiclesController');

Route::get('vehicles/{vehicle}/remove', 'VehiclesController@remove')
     ->name('vehicles.remove');
