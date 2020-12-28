<?php

use App\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\User;
use Illuminate\Support\Facades\Request;

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

Auth::routes();

Route::get('/home', 'PostsController@index')->name('home');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::get('/post/create', 'PostsController@create');
Route::post('/post', 'PostsController@store');
//Route::get('/post/{{post}}','PostsController@display')->name('post.display');

Route::post('follow/{user}', 'FollowsController@store');


//search. will try to move this into a controller
Route::any('/search', function(){
    $q = Request::get('q');
    $profile = Profile::where('profilename','Like', '%'.$q.'%')->get();

    if (count($profile)>0)
        return view('searchresults')->withDetails($profile)->withQuery ( $q );
    else return view ('searchresults')->withMessage('No details found!');

});

