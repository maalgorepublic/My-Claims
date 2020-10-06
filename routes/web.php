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
    Route::get('/policyHolders', 'AdminController@policyHolder');
    Route::get('/policyHolders', 'AdminController@policyHolder')->name('policyHoldersDetail');
    Route::get('/beneficiaries', 'AdminController@beneficiaries');
    Route::get('/pending-claims', 'AdminController@pendingClaims');
    Route::get('/approved-claims', 'AdminController@approvedClaims');
    Route::get('/declined-claims', 'AdminController@declinedClaims');
    Route::get('/updateClaim', 'AdminController@updateBeneficiaryClaimStatus')->name('update-claim');
    Route::get('/user-feedback', 'AdminController@contactRequests');
    Route::get('/what-we-do', 'AdminController@whatWeDo');
    Route::post('/what-we-do', 'AdminController@updateWhatWeDo');
    Route::get('/blogs', 'AdminController@blogs')->name('blogs');
    Route::get('/logout', 'AdminController@logout');
    Route::get('/add-blog', function() {
        return view('admin.add_blog');
    });
    Route::post('/add-blog', 'AdminController@addBlog');
    Route::get('/delete-blog', 'AdminController@deleteBlog')->name('deleteBlog');
    //Route::get('/blogs', 'AdminController@blogs')->name('blogs');
});

Route::group(['prefix' => 'policyHolder', 'middleware' => 'policyholder'], function() {
    Route::get('/', 'PolicyHolderController@index');
    Route::get('/addPolicy', 'PolicyHolderController@addPolicyView');
    Route::post('/addPolicy', 'PolicyHolderController@addPolicy');
    Route::post('/edit', 'PolicyHolderController@editProfile');
    Route::get('/edit', function() {
        return view('policyholder.edit_profile', ['userData' => \Illuminate\Support\Facades\Auth::user(),'packages' => \App\PaymentPackages::all()]);
    });
});

/*Route::group(['prefix' => 'beneficiary', 'middleware' => 'beneficiary'], function() {
    Route::get('/', 'BeneficiaryController@index');
});*/

Route::get('/admin/login', function() {
    return view('admin.login');
})->name('adminLogin');
Route::post('/admin/login', 'AdminController@login');

Route::get('/policyHolder/delete', 'PolicyHolderController@deletePolicy')->name('deletePolicy');
Route::get('/policyHolder/login', function() {
    return view('policyholder.login');
})->name('policyLogin');

Route::get('/beneficiary/login', function() {
    return view('beneficiary.login');
})->name('beneficiaryLogin');

Route::get('/beneficiary/delete', 'BaseController@deleteBeneficiary')->name('deleteBeneficiary');
Route::get('/beneficiary/edit', 'BaseController@editBeneficiary')->name('editBeneficiary');
Route::post('/beneficiary/edit', 'BaseController@updateBen');
Route::get('/beneficiary', 'BaseController@beneficiary');
Route::post('/beneficiary/find-policy', 'BaseController@findPolicy');
Route::post('/beneficiary/policy-request', 'BaseController@policyRequest');
Route::get('/beneficiary/add', function(){
    return view('beneficiary.add_beneficiary');
});
Route::post('/beneficiary/add', 'BaseController@addBeneficiary');

Route::post('/policyHolder/login', 'PolicyHolderController@login');
Route::get('/logout', 'BaseController@logout');
Route::get('/what-we-do', 'BaseController@whatWeDo');

Route::get('/blog', 'BaseController@blog');
Route::get('/blog', 'BaseController@blog')->name('blog-detail');

Route::get('/contact-us', function(){
    return view('contact_us');
});
Route::post('/contact-us', 'BaseController@contactUs');

/*Route::get('/policyHolder/register/', function () {
    return view('policyholder.register');
});*/

Route::get('/policyHolder/register/', 'PolicyHolderController@registerView');

Route::get('/forgot-password/', function () {
    return view('policyholder.forgot_password');
});
Route::post('/policyHolder/forgotPassword/', "PolicyHolderController@forgotPassword");
Route::post('/policyHolder/verifyToken/', "PolicyHolderController@verifyToken");
Route::post('/policyHolder/updatePassword/', "PolicyHolderController@updatePassword");

Route::post('/policyHolder/register/', "PolicyHolderController@register");
Route::post('/policyHolder/checkCell/', "PolicyHolderController@checkCell");

Route::get('/payfast-success', 'PolicyHolderController@paymentSuccess');
Route::get('/payfast-cancel', 'PolicyHolderController@paymentCancel');
//Route::get('/payfast-notify', 'PolicyHolderController@paymentNotify');


Route::post('/payfast-notify', 'PolicyHolderController@paymentNotify');
