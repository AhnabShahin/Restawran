<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PaymentController;
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

Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/all-items', [ItemsController::class, 'items'])->name('all-items');
Route::get('/search-items', [ItemsController::class, 'search'])->name('search-items');
Route::get('{slug}/single-item-detail/', [ItemsController::class, 'singleItemDetail'])->name('singleItemDetail');
Route::get('/blog', [MainController::class, 'blog'])->name('blog');
Route::get('/services', [MainController::class, 'services'])->name('services');
Route::get('/gallery', [MainController::class, 'gallery'])->name('gallery');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
Route::post('/contact-save', [MainController::class, 'SaveContactMessage'])->name('SaveContactMessage');



Route::post('admin/save', [AdminController::class, 'save'])->name('admin.save');
Route::post('admin/check', [AdminController::class, 'check'])->name('admin.check');
Route::get('admin/send', [AdminController::class, 'send'])->name('admin.send');

Route::get('admin/account/verification/{slug}', [AdminController::class, 'account_verification'])->name('admin.account_verification');
Route::get('admin/password/reset/request', [AdminController::class, 'reset_request_get'])->name('admin.reset_request_get');
Route::post('admin/password/reset/request', [AdminController::class, 'reset_request_post'])->name('admin.reset_request_post');

Route::post('admin/password/reset/form/{slug}', [AdminController::class, 'reset'])->name('admin.reset');
Route::get('admin/password/reset/form/{slug}', [AdminController::class, 'reset_form'])->name('admin.reset_form');
Route::group(['middleware' => ['AdminAuthCheck']], function () {
    Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
    Route::get('admin/registration', [AdminController::class, 'registration'])->name('admin.registration');
    Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/item-post', [ItemsController::class, 'itemPostSave'])->name('itemPostSave');
    Route::post('/item-edit/{slug}', [ItemsController::class, 'itemEditSave'])->name('itemEditSave');
    Route::get('/item-delete/{slug}', [ItemsController::class, 'itemDelete'])->name('itemDelete');
    Route::get('admin/dashboard/all-orders', [AdminController::class, 'allOrders'])->name('allOrders');
    Route::get('admin/dashboard/all-orders/order-details/{slug}', [AdminController::class, 'orderDetails'])->name('orderDetails');
    Route::get('admin/dashboard/all-orders/order-details/update-status/{status}/{id}', [AdminController::class, 'updateStatus'])->name('updateStatus');
});





Route::post('user/save', [UserController::class, 'save'])->name('user.save');
Route::post('user/check', [UserController::class, 'check'])->name('user.check');
Route::get('user/send', [UserController::class, 'send'])->name('user.send');

Route::get('user/account/verification/{slug}', [UserController::class, 'account_verification'])->name('user.account_verification');
Route::get('user/password/reset/request', [UserController::class, 'reset_request_get'])->name('user.reset_request_get');
Route::post('user/password/reset/request', [UserController::class, 'reset_request_post'])->name('user.reset_request_post');

Route::post('user/password/reset/form/{slug}', [UserController::class, 'reset'])->name('user.reset');
Route::get('user/password/reset/form/{slug}', [UserController::class, 'reset_form'])->name('user.reset_form');
Route::group(['middleware' => ['UserAuthCheck']], function () {
    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('user/registration', [UserController::class, 'registration'])->name('user.registration');
    Route::get('user/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('user/card', [ItemsController::class, 'cardView'])->name('cardView');
    Route::get('user/card/all-orders', [UserController::class, 'allOrders'])->name('user.allOrders');
    Route::get('user/card/all-orders/order-details/{slug}', [UserController::class, 'orderDetails'])->name('user.orderDetails');
    Route::get('user/order/tracking/{slug}', [ItemsController::class, 'tracking_details'])->name('tracking');
    Route::get('{id}/{quantity}/add-to-card', [ItemsController::class, 'add_to_card'])->name('add_to_card');
    Route::get('user/card/item-delete/{slug}', [ItemsController::class, 'cardItemDelete'])->name('cardItemDelete');
    Route::get('transaction', [PaymentController::class, 'index'])->name('make-payment');
    Route::post('transaction', [PaymentController::class, 'makePayment']);
});
