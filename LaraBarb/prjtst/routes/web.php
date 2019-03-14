<?php


use App\Http\Controllers\Controller;
use App\Service;
use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


Route::get('/', function () {
  $services = Service::orderBy('created_at', 'asc')->get();
  $places = Place::orderBy('created_at', 'asc')->get();
  Auth::logout();
  return view('land', [
    'services' => $services,
    'places' => $places
  ]);
});

Route::get('/admin', function () {
if (Auth::check())
{
  $services = Service::orderBy('created_at', 'asc')->get();
  $places = Place::orderBy('created_at', 'asc')->get();
  return view('/admin',[
  'services' => $services,
  'places' => $places]);
}
else
{
  return view('/login');
}
});



Route::delete('/service/{service}','ServiceUpdate@delete' );
Route::delete('/place/{place}','PlaceController@delete' );

Route::post('/Service', 'ServiceUpdate@add');
Route::post('/Place','PlaceController@add');

Route::post('/uprank/{id}','ServiceUpdate@uprank');
Route::post('/lowerrank/{id}','ServiceUpdate@lowerrank');

Route::get('/main', 'MainController@index');
Route::post('/main/checklogin', 'MainController@checklogin');
Route::get('main/succeslogin', 'MainController@succeslogin');
Route::get('main/logout', 'MainController@logout');
