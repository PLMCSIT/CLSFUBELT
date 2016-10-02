

//event Resources
/********************* event ***********************************************/
Route::resource('event','\App\Http\Controllers\EventController');
Route::post('event/{id}/update','\App\Http\Controllers\EventController@update');
Route::get('event/{id}/delete','\App\Http\Controllers\EventController@destroy');
Route::get('event/{id}/deleteMsg','\App\Http\Controllers\EventController@DeleteMsg');
/********************* event ***********************************************/

