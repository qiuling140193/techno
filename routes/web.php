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


// Route::get('/home', function () {
//     return view('home');
// });
// Route::get('/izin', function () {
//     return view('izin');
// });
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'web'], function(){

  Route::get('home/data', 'ViewController@listData')->name('ortu.data');
   Route::resource('home', 'ViewController');

   Route::get('com', 'HomeController@view')->name('com');
   Route::post('com','HomeController@store')->name('com.store');

});

Route::group(['middleware' => ['web', 'cekuser:1' ]], function(){
   
   Route::get('murid/data', 'MuridController@listData')->name('murid.data');
   Route::resource('murid', 'MuridController');

   Route::get('kelas/data', 'KelasController@listData')->name('kelas.data');
   Route::resource('kelas', 'KelasController');

   Route::get('pelajaran/data', 'PelajaranController@listData')->name('pelajaran.data');
   Route::resource('pelajaran', 'PelajaranController');

   Route::get('user/data', 'UserController@listData')->name('user.data');
   Route::resource('user', 'UserController');

   Route::get('guru/data', 'GuruController@listData')->name('guru.data');
   Route::resource('guru', 'GuruController');
});

Route::group(['middleware' =>['web', 'cekuser:2' ]], function(){

   Route::get('nilai/data', 'NilaiController@listData')->name('nilai.data');
   Route::resource('nilai', 'NilaiController');

   Route::get('view/data', 'Murid2Controller@listData')->name('view.data');
   Route::resource('view', 'Murid2Controller');

   Route::get('comment/data', 'CommentController@listData')->name('comment.data');
   Route::resource('comment', 'CommentController');


});