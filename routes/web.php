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

Route::get('/', 'BaseController@index');
Route::get('/login', function() {
    return view('login');
})->name('login');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('/', 'AdminController@index');
});

Route::group(['prefix' => 'policyHolder', 'middleware' => 'policyholder'], function() {
    Route::get('/', 'PolicyHolderController@index');
});

Route::group(['prefix' => 'beneficiary', 'middleware' => 'beneficiary'], function() {
    Route::get('/', 'BeneficiaryController@index');
});

Route::get('/admin/login', function() {
    return view('admin.login');
})->name('adminLogin');

Route::get('/policyHolder/login', function() {
    return view('policyholder.login');
})->name('policyLogin');

Route::get('/beneficiary/login', function() {
    return view('beneficiary.login');
})->name('beneficiaryLogin');

Route::post('/policyHolder/login', 'PolicyHolderController@login');