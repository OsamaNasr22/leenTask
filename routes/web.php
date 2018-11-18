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



Route::prefix('admin')->group(function (){
    Route::resource('categories','CategoryController')->only(['create','store','index']);
    Route::resource('places','PlaceController')->only(['create','store','index']);

    Route::view('/','admin.cms')->name('dashboard')->middleware('auth');
});
Route::view('/','CurrentLocation');
Route::get('/categories',[
    'uses'=>'LeenController@MainCategories',
    'as'=>'main.categories'
]);
Route::get('/categories/{id}',[
    'uses'=>'LeenController@CategoryPlaces',
    'as'=>'category.places'
]);
Route::get('/places/{id}',[
    'uses'=>'LeenController@ShowPlace',
    'as'=>'place.show'
]);
Route::get('/placemap/{id}',[
    'uses'=>'LeenController@ShowPlaceMap',
    'as'=>'place.show.map'
]);
Route::post('/nearplaces',[
    'uses'=>'LeenController@addNearPlace',
    'as'=>'nearPlaces'
]);
Route::get('/test',function (){
    $place = \App\Place::where('place_id','50')->first();
   echo gettype($place);
});
Route::get('redirect/{id}',function ($id){
    $place = \App\Place::where('place_id',$id)->first();
    if(!$place){
        abort('404');

    }
    return redirect()->route('place.show',$place->id);



});
Route::get('/logout',function (){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('login');
});
Auth::routes();


