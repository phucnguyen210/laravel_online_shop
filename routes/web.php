<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\OrdersController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\admin\BrandsController;
use App\Http\Controllers\admin\PagesController;
use App\Http\Controllers\admin\UsersController;

use App\Http\Controllers\page\HomeController;
use App\Http\Controllers\page\UserController;
use App\Http\Controllers\page\CartController;
use Illuminate\Support\Facades\Route;

use App\http\Middleware\AdminRole;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login_post');
    Route::middleware(['AdminRole'])->group(function () {

        Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
        Route::get('/dashboard', [AdminLoginController::class, 'dashboard'])->name('admin.dashboard');


        Route::get('/category', [CategoryController::class, 'category'])->name('admin.category');
        Route::get('/create-category', [CategoryController::class, 'create_category'])->name('admin.create-category');
        Route::post('/create-category', [CategoryController::class, 'store'])->name('admin.create-category');
        Route::get('/category/{id}/edit', [CategoryController::class, 'edit_category'])->name('admin.edit_category');
        Route::put('/category/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/category/{id}delete', [CategoryController::class, 'delete'])->name('admin.delete_category');

        Route::get('/sub_category', [SubCategoryController::class, 'sub_category'])->name('admin.sub_category');
        Route::get('/create_subcategory', [SubCategoryController::class, 'create_sub_category'])->name('create_subcategory');
        Route::post('/sub_category', [SubCategoryController::class, 'store'])->name('admin.sub_category');
        Route::get('/sub_category/{id}/edit', [SubCategoryController::class, 'edit_sub_category'])->name('admin.edit_sub_category');
        Route::put('/sub_category/{id}', [SubCategoryController::class, 'update'])->name('sub_category.update');
        Route::delete('/sub_category/{id}delete', [SubCategoryController::class, 'delete'])->name('delete_sub_category');


        Route::get('/brands', [BrandsController::class, 'brands'])->name('admin.brands');
        Route::get('/create-brand', [BrandsController::class, 'create_brand'])->name('admin.create-brand');
        Route::post('/create-brand', [BrandsController::class, 'store'])->name('admin.create-brand');
        Route::get('/brands/{id}/edit', [BrandsController::class, 'edit_brands'])->name('admin.edit_brands');
        Route::put('/brands/{id}', [BrandsController::class, 'update'])->name('brands.update');
        Route::delete('/brands/{id}delete', [BrandsController::class, 'delete'])->name('admin.delete_brands');


        Route::get('/products', [ProductsController::class, 'products'])->name('admin.products');
        Route::get('/create-product', [ProductsController::class, 'create_product'])->name('admin.create-product');
        Route::post('/create-product', [ProductsController::class, 'store'])->name('admin.create-product');
        Route::get('/product/edit/{id}', [ProductsController::class, 'edit_products'])->name('admin.edit_products');
        Route::put('/products/{id}', [ProductsController::class, 'update'])->name('products.update');
        Route::delete('/products/{id}delete', [ProductsController::class, 'delete'])->name('admin.delete_products');


        Route::get('/pages', [PagesController::class, 'pages'])->name('admin.pages');
        Route::get('/create-page', [PagesController::class, 'create_page'])->name('admin.create-page');


        Route::get('/users', [UsersController::class, 'users'])->name('admin.users');
        Route::get('/create-user', [UsersController::class, 'create_user'])->name('admin.create-user');


        Route::get('/orders', [OrdersController::class, 'orders'])->name('admin.orders');
        Route::get('/order_detail', [OrdersController::class, 'order_detail'])->name('admin.order_detail');
        Route::get('/discount', [AdminLoginController::class, 'discount'])->name('admin.discount');
    });
});


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'pages'], function () {
    #Login
    Route::get('/register', [HomeController::class, 'register'])->name('register');
    Route::post('/register', [HomeController::class, 'register_store'])->name('register_form');
    Route::get('/login', [HomeController::class, 'login'])->name('login');
    Route::post('/login', [HomeController::class, 'login_store'])->name('login_form');

    Route::get('/product-detail/{id}', [HomeController::class, 'product_detail'])->name('product_detail');
    

    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::post('/update-quick-cart', [CartController::class, 'updateQuickCart'])->name('update_cart');
    Route::get('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

    Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [HomeController::class, 'form_checkout'])->name('form_checkout');

    #sendmail
    // Route::get('/sendmail', [HomeController::class, 'send_mail'])->name('cart');


    
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/contact-us', [HomeController::class, 'contact_us'])->name('contact-us');
    

    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/account', [UserController::class, 'account'])->name('account');
    Route::post('/account', [UserController::class, 'store'])->name('account_form');

    Route::get('/my_orders', [UserController::class, 'my_orders'])->name('my_orders');
    Route::get('/wishlist', [UserController::class, 'wishlist'])->name('wishlist');
    Route::get('/change_password', [UserController::class, 'change_password'])->name('change_password');
});