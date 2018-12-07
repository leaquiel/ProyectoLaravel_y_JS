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


// Route::get('/', function () {
//   return view('welcome');
// });



// Route::get('/nueva', function () {
//   return view('nueva');
// });

Route::get('/', function () {
  return view('baseejemplo');
});

Route::get('/busqueda', 'ActivitiesController@show')->name('busqueda');


Route::middleware('auth')->group(function() {

  Route::get('/profile', 'UsersController@showUser')->name('users.profile');

    // $user=Auth::user();
    // // $user2=User::all();
    // return view('users.profile', compact('user'));})->name('users.profile');

  Route::get('/profile/edit', 'UsersController@edit')->name('profile.edit');

  Route::get('/profile/friends', 'UsersController@showFriends')->name('profile.showFriends');

  Route::get('profile/userComments', 'UsersController@showComments')->name('profile.showComments');

  Route::get('profile/changeTheme', 'UsersController@changeTheme')->name('profile.changeTheme');

  Route::put('/profile/{id}', 'UsersController@update')->name('profile.update');
  //si pongo put me rompey no me dice porque, ahora con post no me rompe pero no me hace nada el formulario de mierda


  Route::post('/addComment', 'CommentsController@store')->name('comment.store');
  //
  // Route::get('/home', 'UsersController@themeSelector')->name('profile.changeTheme');

});

Route::get('/activityDetail/{activity_id}', 'CommentsController@create')->name('comment.create');





Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/actividades', 'ActivitiesController@index');


Route::get('/apiCities/{country_id}', 'CitiesController@endPointCityByCountryId');

// Route::get('/apiCities', 'CitiesController@endPointAllCities');






Route::fallback(function () {
  return 'te equivocaste wachin';
});
