<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SepayWebhookController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\GoogleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Trang chủ
Route::get('/', function () {
    return view('home');
})->name('home');


//Admin
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth']) // Sau này đổi thành ['auth', 'admin']
    ->group(function () {

        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        //Sản phẩm
        Route::resource('products', ProductController::class);

        //Loại sản phẩm
        Route::resource('categories', CategoryController::class);

        //Thông báo
        Route::resource('notifications', NotificationController::class);

        //Danh sách thanh toán
        Route::resource('payments', PaymentController::class);
    });





//Hiển thị sản phẩm trên giao diện khách hàng
Route::resource('shop', ShopController::class)->only([
    'index',
    'show'
]);

//Giỏ hàng
Route::resource('carts', CartController::class)
    ->only(['index', 'store', 'update', 'destroy'])
    ->middleware('auth');

//Đếm số lượng trong giỏ hàng
Route::get('/carts/count',[CartController::class,'count']);

//Hiển thị thông tin sản phẩm 
Route::get('/carts/summary', [CartController::class, 'summary'])
    ->middleware('auth');







//Auth
Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // Kiểm tra email bằng AJAX
    Route::post('/check-email', [RegisterController::class, 'checkEmail'])
        ->name('check.email');

    Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.login');
    Route::get('/auth/google/callback', [GoogleController::class, 'callback']);
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');



//Trang cá nhân người dùng
Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class)
        ->only(['show', 'edit', 'update']);
});


//Đăng nhập bằng Google
Route::get('/auth/google', [GoogleController::class, 'redirect'])
    ->name('google.login');

Route::get('/auth/google/callback', [GoogleController::class, 'callback']);


//Thanh toán
Route::middleware('auth')->group(function () {

    Route::resource('checkout', CheckoutController::class)
        ->only([
            'create',
            'store',
            'show',
        ]);
    
    Route::get('/payments/{payment}/status', [CheckoutController::class, 'paymentStatus'])
        ->name('payments.status');

    Route::get(
        '/checkout/{payment}/success',
        [CheckoutController::class, 'success']
    )->name('checkout.success');

});

//Sepay
Route::post('/sepay/webhook', [SepayWebhookController::class, 'handle'])
    ->name('sepay.webhook');

