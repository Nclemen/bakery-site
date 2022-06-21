<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Cms\CmsPageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ShopController;

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

Route::get('/', [PagesController::class, 'index'])->name('index.page');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/cart', [ShopController::class, 'cart'])->name('shop.cart');
Route::post('/shop/cart', [ShopController::class, 'addToCart'])->name('shop.addToCart'); // receives post from product page to add to the cart
Route::get('/shop/order-check', [ShopController::class, 'orderCheck'])->name('shop.orderCheck');
Route::post('/shop/order', [ShopController::class, 'orderInsight'])->name('shop.orderInsight'); // receives post from order-check with order id and email address and redirects user to page with status information about the users order
Route::get('/shop/{product}', [ShopController::class, 'productPage'])->name('shop.product');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('cms/', function () {
        return Inertia::render('Dashboard',[]);
    })->name('dashboard');

    // overview of hours
    Route::get('hours-management/', [CmsPageController::class, 'hoursManagement'])->name('cms.index');

    // overview of products
    Route::get('products-management/', [CmsPageController::class, 'productsManagement'])->name('cms.products');

    // add hours form
    Route::get('hours-management/add-hours', [CmsPageController::class, 'addHours'])->name('add-hours');

    // add product form
    Route::get('products-management/add-product', [CmsPageController::class, 'addProducts'])->name('add-products');

});

require __DIR__.'/auth.php';
