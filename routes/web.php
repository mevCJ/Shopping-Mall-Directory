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

Route::get('/home','TenantController@home')->name('tenant.home');
Route::get('/main','TenantController@main')->name('tenant.main');

Route::get('admin','AdminController@index');
Route::get('/admin/login', 'AdminController@index');
Route::post('/admin/login/checkLogin', 'adminController@checkLogin');
Route::get('admin/login/successLogin', 'adminController@successLogin');

Route::group(['middleware' => ['adminAuth',]], function(){
    Route::resource('/admin/tenant', 'TenantController');
    Route::get('admin/tenant/{tenant}/upload', 'tenantController@upload')->name('tenant.upload');
    Route::post('admin/tenant/{tenant}/save-upload', 'tenantController@saveUpload')->name('tenant.saveUpload');
    Route::get('/admin/logout', 'adminController@logout');
});
