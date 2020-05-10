<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/home', function(){
    return redirect()->route('dashboard');
})->name('home');

Auth::routes(['register'=>false,'verify' => false, 'reset' => false]);

Route::any('logout','Auth\LoginController@logout')->name('logout');

require_once 'admin/admin.php';
