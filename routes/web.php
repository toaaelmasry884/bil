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
    return view('auth.login');
});



Auth::routes();
//Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('bills', 'BillsController');
Route::resource('sections', 'SectionsController');
Route::resource('products', 'ProductsController');
Route::resource('BillsAttachments', 'BillsAttachementsController');

Route::get('/section/{id}', 'BillsController@getproducts');
Route::get('/BillsDetails/{id}', 'BillsDetailsController@edit');

Route::get('View_file/{bills_number}/{file_name}', 'BillsDetailsController@open_file');
Route::get('download/{bills_number}/{file_name}', 'BillsDetailsController@get_file');
Route::post('delete_file', 'BillsDetailsController@destroy')->name('delete_file');
Route::get('/edit_bills/{id}', 'BillsController@edit');

Route::get('/{page}', 'AdminController@index');
