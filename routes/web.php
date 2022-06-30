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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function(){
    Route::namespace('App\Http\Controllers\Admin')->group(function(){
        Route::prefix('seller')->group(function(){
            Route::get('/', 'SellerController@getSellers')->name('getSellers');
            Route::get('add', 'SellerController@addSeller')->name('addSeller');
            Route::post('add', 'SellerController@createSeller')->name('createSeller');
            Route::get('edit/{id}', 'SellerController@editSeller')->name('editSeller');
            Route::post('update', 'SellerController@updateSeller')->name('updateSeller');
            Route::get('delete/{id}', 'SellerController@deleteSeller')->name('deleteSeller');
        });

        Route::prefix('category')->group(function(){
            Route::get('/', 'CategoryController@getCategories')->name('getCategories');
            Route::get('add', 'CategoryController@addCategory')->name('addCategory');
            Route::post('add', 'CategoryController@createCategory')->name('createCategory');
            Route::get('edit/{id}', 'CategoryController@editCategory')->name('editCategory');
            Route::post('update', 'CategoryController@updateCategory')->name('updateCategory');
            Route::get('delete/{id}', 'CategoryController@deleteCategory')->name('deleteCategory');
        });

        //https://codingdriver.com/how-to-set-select-box-selected-option-in-laravel.html
        Route::prefix('product')->group(function(){
            Route::get('/', 'ProductController@getProducts')->name('getProducts');
            Route::get('add', 'ProductController@addProduct')->name('addProduct');
            Route::post('add', 'ProductController@createProduct')->name('createProduct');
            Route::get('edit/{id}', 'ProductController@editProduct')->name('editProduct');
            Route::post('update', 'ProductController@updateProduct')->name('updateProduct');
            Route::get('delete/{id}', 'ProductController@deleteProduct')->name('deleteProduct');
        });

        Route::prefix('product_variant')->group(function(){
            Route::get('/', 'ProductVariantController@getProductVariants')->name('getProductVariants');
            Route::get('add', 'ProductVariantController@addProductVariant')->name('addProductVariant');
            Route::post('add', 'ProductVariantController@createProductVariant')->name('createProductVariant');
            Route::get('edit/{id}', 'ProductVariantController@editProductVariant')->name('editProductVariant');
            Route::post('update', 'ProductVariantController@updateProductVariant')->name('updateProductVariant');
            Route::get('delete/{id}', 'ProductVariantController@deleteProductVariant')->name('deleteProductVariant'); 
        });

        Route::prefix('order')->group(function(){
            Route::get('/', 'OrderController@getUser4')->name('getUser4');
            Route::post('order', 'OrderController@checkUser3')->name('checkUser3');
            Route::get('/order/{user_id}/detail/{order_id}', 'OrderController@getOrderDetail3')->name('getOrderDetail3');
        });
    });
});

Route::prefix('user')->group(function(){
    Route::namespace('App\Http\Controllers\User')->group(function(){
        Route::prefix('profile')->group(function(){
            Route::get('/', 'UserController@getUsers')->name('getUsers');
            Route::get('add', 'UserController@addUser')->name('addUser');
            Route::post('add', 'UserController@createUser')->name('createUser');
            Route::get('edit/{id}', 'UserController@editUser')->name('editUser');
            Route::post('update', 'UserController@updateUser')->name('updateUser');
            Route::get('delete/{id}', 'UserController@deleteUser')->name('deleteUser');
        });

        Route::prefix('product')->group(function(){
            Route::get('/', 'ProductController@getProducts2')->name('getProducts2');
            Route::get('detail/{id}', 'ProductController@getProduct')->name('getProduct');
            Route::get('detai/{id}/order/{product_variant_id}', 'ProductController@getOrder')->name('getOrder');
            Route::post('/order', 'ProductController@createCart')->name('createCart');
        });

        Route::prefix('cart')->group(function(){
            Route::get('/', 'CartController@getUsers2')->name('getUsers2');
            Route::post('/list', 'CartController@checkUser')->name('checkUser');
            Route::get('edit_stock/{id}/user/{user_id}', 'CartController@editStockCart')->name('editStockCart');
            Route::get('delete_stock/{id}/user/{user_id}', 'CartController@deleteStockCart')->name('deleteStockCart');
            Route::get('list/{user_id}', 'CartController@getCarts')->name('getCarts');
            Route::post('edit_stock', 'CartController@editStock')->name('editStock');
            Route::post('checkout', 'CartController@checkOut')->name('checkOut');
        });

        Route::prefix('order')->group(function(){
            Route::get('/', 'OrderController@getUser3')->name('getUser3');
            Route::post('order', 'OrderController@checkUser2')->name('checkUser2');
            Route::get('/order/{user_id}/detail/{order_id}', 'OrderController@getOrderDetail2')->name('getOrderDetail2');
        });
    });
});
