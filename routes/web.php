<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/index', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Members
Route::group(['prefix' => 'member', 'middleware' => ['auth', 'active', 'verified', 'member']], function () {
    Route::get('/', [\App\Http\Controllers\Member\DashboardController::class, 'index'])->name('member');
    Route::match(['get', 'post'], '/profile', [\App\Http\Controllers\Member\DashboardController::class, 'profile'])->name('profile');
    
    Route::get('/change-password', [\App\Http\Controllers\Member\ChangePasswordController::class, 'index'])->name('member_password');
    Route::post('/change-password', [\App\Http\Controllers\Member\ChangePasswordController::class, 'change'])->name('member_password');

    Route::get('/subscription', [\App\Http\Controllers\Member\DashboardController::class, 'plan'])->name('subscription')->middleware('updated');
    Route::get('/subscribe/{id}', [\App\Http\Controllers\Member\DashboardController::class, 'subscribe'])->name('subscribe')->middleware('updated');
    Route::get('/subscribe-now/{id}', [\App\Http\Controllers\Member\DashboardController::class, 'subscribe_now'])->name('subscribe_now')->middleware('updated');
    Route::post('/subscribe-now', [\App\Http\Controllers\Member\DashboardController::class, 'subscribe_now_new'])->name('subscribe_now_new')->middleware('updated');


    Route::get('resources', [\App\Http\Controllers\Member\DashboardController::class, 'resources'])->name('resources')->middleware(['paid', 'updated']);
    Route::get('view-resources/{id}', [\App\Http\Controllers\Member\DashboardController::class, 'view_resources'])->name('view_resources')->middleware('updated');
});

//Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin');
    Route::match(['get', 'post'], '/profile', [\App\Http\Controllers\Admin\DashboardController::class, 'profile'])->name('admin_profile');
    Route::get('/change-password', [\App\Http\Controllers\Admin\ChangePasswordController::class, 'index'])->name('admin_password');
    Route::post('/change-password', [\App\Http\Controllers\Admin\ChangePasswordController::class, 'change'])->name('admin_password');

    //Subscriptions
    Route::match(['get', 'post'], '/subscription', [\App\Http\Controllers\Admin\DashboardController::class, 'subscription'])->name('admin_subscription');
    Route::get('/delete/{id}', [\App\Http\Controllers\Admin\DashboardController::class, 'delete_plan'])->name('admin_delete_plan');

    //Active Members
    Route::get('active-members', [\App\Http\Controllers\Admin\DashboardController::class, 'active_member'])->name('admin_active_member');
    Route::get('inactive-members', [\App\Http\Controllers\Admin\DashboardController::class, 'inactive_member'])->name('admin_inactive_member');
    Route::get('delete-member/{id}', [\App\Http\Controllers\Admin\DashboardController::class, 'delete_member'])->name('admin_delete_member');
    Route::get('view-member/{id}', [\App\Http\Controllers\Admin\DashboardController::class, 'view_member'])->name('admin_view_member');
    Route::get('edit-member/{id}', [\App\Http\Controllers\Admin\DashboardController::class, 'edit_member'])->name('admin_edit_member');
    Route::post('edit-member', [\App\Http\Controllers\Admin\DashboardController::class, 'edit_save_member'])->name('admin_edit_save_member');

    //Paymets
    Route::get('payments', [\App\Http\Controllers\Admin\DashboardController::class, 'payments'])->name('admin_payment');
    Route::match(['get', 'post'], 'update-payment-account', [\App\Http\Controllers\Admin\DashboardController::class, 'add_payment'])->name('admin_add_payment');

    Route::get('/approve-subscribe/{id}', [\App\Http\Controllers\Admin\DashboardController::class, 'approve_subscribe'])->name('admin_approve_subscribe');
    Route::get('/decline-subscribe/{id}', [\App\Http\Controllers\Admin\DashboardController::class, 'decline_subscribe'])->name('admin_decline_subscribe');

    //Resources
    Route::get('resources', [\App\Http\Controllers\Admin\DashboardController::class, 'resources'])->name('admin_resource');
    Route::match(['get', 'post'], 'add-resource', [\App\Http\Controllers\Admin\DashboardController::class, 'add_resource'])->name('admin_add_resource');
    Route::match(['get', 'post'], 'edit-resource/{id}', [\App\Http\Controllers\Admin\DashboardController::class, 'edit_resource'])->name('admin_edit_resource');
    Route::get('delete_resources/{id}', [\App\Http\Controllers\Admin\DashboardController::class, 'delete_resources'])->name('admin_delete_resources');
});
