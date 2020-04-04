<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;
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

Route::get('/', 'VoteController@showAll');
Route::get('/test', function() {
    $params = [
        "name" => "Evgeniy"
    ];

    return view('test', $params);
});
Route::get('/vote/show/{id}', 'VoteController@get_by_id');
Route::get('/vote/positive_inc/{id}', 'VoteController@increasePositive');
Route::get('/vote/negative_inc/{id}', 'VoteController@increaseNegative');
Route::get('/vote/create', function() {
    return view('create_vote', []);
});
Route::post('/vote/create', 'VoteController@create');