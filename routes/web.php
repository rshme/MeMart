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
    return view('landing');
})->name('login')->middleware('guest');

Route::get('/home', 'DashboardController@index')->name('home')->middleware('auth.student');

// endpoint authentication
Route::get('/login', 'AuthController@getLogin')->name('get.login');
Route::post('/login', 'AuthController@postLogin')->name('post.login');
Route::post('/logout', 'AuthController@logout')->name('logout.user');

Route::get('force-logout', function(){
    \Auth::logout();

    return redirect()->to('/');
});

// wrap inside student middleware
Route::group(['middleware' => 'auth.student'], function(){
    // endpoint to get leaderboard
    Route::get('/leaderboard', 'DashboardController@leaderboard')->name('get.leaderboard');

    //endpoint chart
    Route::get('/myprofit', 'DashboardController@profit')->name('get.profit');
    Route::get('/myprofit/chart', 'DashboardController@chart')->name('get.chart');

    // show student
    Route::get('leaderboard/{id}/show', 'DashboardController@showStudent')->name('profit_student.show');
});

Route::group(['prefix' => 'admin'], function () {
    // overriding routes
    Route::get('/profit-student/getdata', 'ProfitStudentController@datatables')->name('getProfitStudent');
    Route::get('/profit-student/{id}/edit ', 'ProfitStudentController@edit')->name('voyager.profit-student.edit');
    Route::put('/profit-student/{id} ', 'ProfitStudentController@update')->name('voyager.profit-student.update');

    Voyager::routes();
});
