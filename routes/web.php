<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\Event;
//GUEST ROUTES
Route::get('/', function () {
    return view('home.home');
});
Route::get('home', function () {
    return view('home.home');
});
Route::get('about', function () {
    return view('home.about');
});
Route::get('vision', function () {
    return view('home.vision');
});
Route::get('contact', function () {
    return view('home.contact');
});
Route::get('history', function () {
    return view('home.history');
});
Route::get('location', function () {
    return view('home.location');
});
Route::get('event', function(){
        $events = Event::all();
        return view('home.events',compact('events'));
});
Route::get('unauthorized', function(){
    return view('errors.401');
});

Auth::routes();
Route::get('user', 'HomeController@index');
//event Resources
/********************* event ***********************************************/
Route::post('event/{id}/update','\App\Http\Controllers\EventController@update');
Route::get('event/{id}/delete','\App\Http\Controllers\EventController@destroy');
Route::get('event/{id}/deleteMsg','\App\Http\Controllers\EventController@DeleteMsg');
/********************* event ***********************************************/

Route::group(['middleware' => 'role:Owner'], function() {
    Route::resource('roles','\App\Http\Controllers\ScaffoldInterface\RoleController');
    Route::resource('users','\App\Http\Controllers\ScaffoldInterface\UserController');
    Route::resource('permissions','\App\Http\Controllers\ScaffoldInterface\PermissionController');
    Route::get('roles/create', '\App\Http\Controllers\ScaffoldInterface\RoleController@create');
    Route::get('roles/destroy/{id}', '\App\Http\Controllers\ScaffoldInterface\RoleController@destroy');
    Route::get('roles/revokePermission/{permission}/{role_id}', '\App\Http\Controllers\ScaffoldInterface\RoleController@revokePermission');
    Route::post('roles/edit/{id}', '\App\Http\Controllers\ScaffoldInterface\RoleController@edit');
    Route::post('roles/update', '\App\Http\Controllers\ScaffoldInterface\RoleController@update');
    Route::post('roles/addPermission', '\App\Http\Controllers\ScaffoldInterface\RoleController@addPermission');
});