<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

Route::get('/news', function () {
    return view('pages.news');
});

Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])
            ->name('login');

        Route::post('/login', [LoginController::class, 'login'])
            ->name('login.submit');
    });

    Route::post('/logout', [LoginController::class, 'logout'])
        ->middleware('auth')
        ->name('logout');

    Route::middleware('auth')->group(function () {

        Route::get('/', function () {
            return view('admin.home', [
                'totalProducts' => Product::count(),
                'totalUsers' => User::count(),
                'totalOrders' => Order::count(),
            ]);
        })->name('dashboard');

        Route::get('/users', function () {
            return view('admin.users.index');
        })->name('users.index');

        Route::get('/orders', [AdminOrderController::class, 'index'])
            ->name('orders.index');

        Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])
            ->name('orders.updateStatus');

        Route::delete('/orders/{order}', [AdminOrderController::class, 'destroy'])
            ->name('orders.destroy');

        Route::get('/products/cetak/pdf', [AdminProductController::class, 'cetakPdf'])
            ->name('products.cetakPdf');

        Route::get('/products/{id}/cetak/pdf', [AdminProductController::class, 'cetakPdfById'])
            ->name('products.cetakPdfById');

        Route::resource('products', AdminProductController::class);
    });
});