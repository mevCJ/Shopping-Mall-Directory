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

/*Route::get('/admin/tenant/create', 'TenantController@create')->name('tenant.create');
Route::post('admin/tenant', 'TenantController@store')->name('tenant.store');
Route::get('admin/tenant', 'TenantController@index')->name('tenant.index');
Route::get('admin/tenant/{tenant}','TenantController@show')->name('tenant.show');
Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/home','TenantController@home')->name('tenant.home');
Route::get('/main','TenantController@main')->name('tenant.main');

Route::resource('/admin/tenant', 'TenantController');
Route::get('admin/tenant/{tenant}/upload', 'tenantController@upload')->name('tenant.upload');
Route::post('admin/tenant/{tenant}/save-upload', 'tenantController@saveUpload')->name('tenant.saveUpload');
