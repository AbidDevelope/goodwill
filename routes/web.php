<?php

use Illuminate\Support\Facades\Route;
// Admin Controller Here
use App\Http\Controllers\AdminController;

// Vendor Controller Here
use App\Http\Controllers\VendorController\RegisterController;
use App\Http\Controllers\VendorController\LoginController;
use App\Http\Controllers\VendorController\ProfileController;
use App\Http\Controllers\VendorController\CategoryController;
use App\Http\Controllers\VendorController\SubCategoryController;
use App\Http\Controllers\VendorController\ProductController;
use App\Http\Controllers\VendorController\OrderController;
use App\Http\Controllers\VendorController\BrandController;

// User Controller Here
use App\Http\Controllers\UserController\UserController;
use App\Http\Controllers\UserController\UserProductController;
use App\Http\Controllers\WhatsappPdfController;


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
//     // return view('welcome');
//     return view('/');
// });


Route::controller(AdminController::class)->group(function () {

    Route::get('admin/login', 'index')->name('login');

    Route::get('registration', 'registration')->name('registration');
    Route::get('logout', 'logout')->name('logout');
    Route::post('validate_registration', 'validate_registration')->name('sample.validate_registration');
    Route::post('validate_login', 'validate_login')->name('sample.validate_login');
    Route::get('admin_dashboard', 'admin_dashboard')->name('admin_dashboard');


    //


     Route::post('insert_product_wears', 'insert_product_wears')->name('insert_product_wears');
     Route::post('insert_product_cosmetic', 'insert_product_cosmetic')->name('insert_product_cosmetic');
     Route::post('insert_product_Grocery', 'insert_product_Grocery')->name('insert_product_Grocery');
     Route::post('insert_product_Furniture', 'insert_product_Furniture')->name('insert_product_Furniture');



    Route::get('add_product', 'add_product')->name('add_product');
    Route::get('product_list', 'product_list')->name('product_list');
    Route::post('insert_product', 'insert_product')->name('insert_product');
    Route::get('productView/{id}', 'productView')->name('productView');
    Route::get('delete_product/{id}', 'delete_product')->name('delete_product');
    Route::get('edit_product/{id}', 'edit_product')->name('edit_product');
    Route::put('update_product/{id}', 'update_product')->name('update_product');
    Route::get('get_data/{id}', 'get_data')->name('get_data');

    Route::post('/fetchScubcat/{id}', 'fetchScubcat')->name('fetchScubcat');


    Route::post('insert_orders', 'insert_orders')->name('insert_orders');
    Route::get('orders_list', 'orders_list')->name('orders_list');
    Route::get('delete_orders/{id}', 'delete_orders')->name('delete_orders');
    Route::get('search_order', 'search_order')->name('search_order');

    Route::get('orders/details/{id}', 'ordersDetails')->name('orders/details');





    Route::get('add_category', 'add_category')->name('add_category');
    Route::post('insert_category', 'insert_category')->name('insert_category');
    Route::get('show_category', 'show_category')->name('show_category');
    Route::get('detete_categories/{id}', 'detete_categories')->name('detete_categories');
    Route::get('edit_categories/{id}', 'edit_categories')->name('edit_categories');
    Route::put('update_category/{id}', 'update_category')->name('update_category');

    Route::get('add_subcategory', 'add_subcategory')->name('add_subcategory');
    Route::post('insert_subcategory', 'insert_subcategory')->name('insert_subcategory');
    Route::get('show_subcategory', 'show_subcategory')->name('show_subcategory');
    Route::get('detete_subcategory/{id}', 'detete_subcategory')->name('detete_subcategory');
    Route::get('edit_subcategory/{id}', 'edit_subcategory')->name('edit_subcategory');
    Route::put('update_subcategory/{id}', 'update_subcategory')->name('update_subcategory');




    Route::get('slider_banner', 'slider_banner')->name('slider_banner');
    Route::post('add_slider_banner', 'add_slider_banner')->name('add_slider_banner');
    Route::get('edit_banner/{id}'  , 'edit_banner')->name('edit_banner');
    Route::put('update_banner/{id}'     , 'update_banner')->name('update_banner');
    Route::get('delete-banner/{id}', 'bannerdestroy')->name('bannerdestroy');


    Route::get('stick', 'stick')->name('stick');
    Route::post('add_stick', 'add_stick')->name('add_stick');
    Route::get('edit_stick/{id}'  , 'edit_stick')->name('edit_stick');
    Route::put('update_stick/{id}'     , 'update_stick')->name('update_stick');


       // vendor create ------------
    Route::get('vendor_create', 'vendor_create')->name('vendor_create');
    Route::post('add_vendor', 'add_vendor')->name('add_vendor');
    Route::get('vendor_list', 'vendor_list')->name('vendor_list');
    Route::get('edit_vendor/{id}', 'edit_vendor')->name('edit_vendor');
    Route::put('update-vendor/{id}', 'update_vendor')->name('update_vendor');
    Route::get('delete_vendor/{id}', 'delete_vendor')->name('delete_vendor');


    Route::get('address_list', 'address_list')->name('address_list');

    Route::get('delete_addres/{id}', 'delete_addres')->name('delete_addres');

    Route::get('search_products', 'search_products')->name('search_products');

    Route::get('search_status', 'search_status')->name('search_status');

    Route::get('brand', 'brand')->name('brand');

    Route::post('addBrand','addBrand')->name('addBrand');

    Route::get('brand_delete/{id}','brand_delete')->name('brand_delete');

    Route::get('brand_edit/{id}','brand_edit')->name('brand_edit');

    Route::post('brand_update','brand_update')->name('brand_update');

    Route::get('act_product/{id}', 'act_product')->name('act_product');



   Route::get('admin_orders','admin_orders')->name('admin_orders');

   Route::get('admin/order/details/{id}','admin_orders_details')->name('admin_orders_details');

   Route::get('admin/order/tracking/{id}','orderTracking')->name('orderTracking');

   Route::get('admin/product_dispatched/{id}','productDispatched')->name('productDispatched');

   Route::get('admin/product_delivered/{id}','productDelivered')->name('productDelivered');


   //shubhamtest

    Route::get('productlistget', 'productlistget')->name('productlistget');


});


//////////////////  Vendor Route ////////////////////

Route::get('vendor/login', [LoginController::class, 'loginView'])->name('vendor/login');
Route::post('vendor/login', [LoginController::class, 'login'])->name('vendor/login');

//Register Routes
Route::get('register', [RegisterController::class, 'registerView'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register');

//Vendor Dashboard Group route
Route::middleware(['vendor'])->group(function () {
    Route::get('vendor/dashboard', [RegisterController::class, 'dashboard'])->name('vendor/dashboard')->middleware('vendor');
    Route::get('vendor/logout', [LoginController::class, 'logout'])->name('vendor/logout');
    //Profile Route
    Route::get('vendor/profile', [ProfileController::class, 'Profile'])->name('profile');
    Route::put('profile_update/{id}', [ProfileController::class, 'Profile_Update'])->name('profile_update');
    //Category Route
    Route::get('vendor/category', [CategoryController::class, 'Category'])->name('vendor/category');
    Route::post('vendor/category', [CategoryController::class, 'AddCategory'])->name('vendor/category');
    Route::get('category/edit/{id}', [CategoryController::class, 'category_edit'])->name('edit-category');
    Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category/delete');
    Route::post('category-update', [CategoryController::class, 'category_update'])->name('category-update');
    //Subcategory Route
    Route::get('vendor/subcategory', [SubCategoryController::class, 'SubcategoryView'])->name('vendor/subcategory');
    Route::post('vendor/subcategory', [SubCategoryController::class, 'Subcategory'])->name('vendor/subcategory');
    Route::get('subcategory/edit/{id}', [SubCategoryController::class, 'subcategory_edit'])->name('subcategory-edit');
    Route::post('subcategory-update', [SubCategoryController::class, 'subcategory_update'])->name('subcategory-update');
    Route::get('delete/{id}', [SubCategoryController::class, 'destroy'])->name('delete');
    //Product Route
    Route::get('vendor/product', [ProductController::class, 'product'])->name('vendor/product');
    Route::post('fetch_Scubcategory/{id}', [ProductController::class, 'fetch_Scubcategory']);
    Route::post('fetch_brand/{id}', [ProductController::class, 'fetch_brand']);
    Route::post('vendor/addproduct', [ProductController::class, 'addproduct'])->name('vendor/addproduct');
    Route::get('vendor/product_list', [ProductController::class, 'productlist'])->name('vendor/product_list');
    Route::get('vendor/product/edit/{id}', [ProductController::class, 'edit'])->name('vendor/product/edit');
    Route::put('vendor/product/update/{id}', [ProductController::class, 'update'])->name('vendor/product/update');
    Route::get('vendor/product/view/{id}', [ProductController::class, 'details'])->name('vendor/product/view');
    Route::get('vendor/product/delete/{id}', [ProductController::class, 'destroy'])->name('vendor/product/delete');
    Route::get('vendor/products/images/delete/{product_image_id}', [ProductController::class, 'destroyImage'])->name('vendor/products/images/delete');
    // Add Brand Route
    Route::get('vendor/brand', [BrandController::class, 'brand'])->name('brand');
    Route::post('vendor/addBrand', [BrandController::class, 'addBrand'])->name('addBrand');
    Route::get('vendor/brand/edit/{id}', [BrandController::class, 'edit'])->name('edit-brand');
    Route::post('vendor/brand/update', [BrandController::class, 'brandUpdate'])->name('brand/update');
    Route::get('vendor/brand/delete/{id}', [BrandController::class, 'destroy'])->name('brand/delete');
    //Order Route
    Route::get('vendor/order/list', [OrderController::class, 'orderlist'])->name('order/list');
    Route::get('vendor/order/details/{id}', [OrderController::class, 'order_details'])->name('vendor/order/details');
    Route::get('vendor/order/tracking/{id}', [OrderController::class, 'orderTracking'])->name('order/tracking');
    Route::get('product_dispatched/{id}', [OrderController::class, 'productDispatched'])->name('product_dispatched');
    Route::get('product_delivered/{id}', [OrderController::class, 'productDelivered'])->name('product_delivered');
    Route::get('vendor/order/information/{orderId}', [OrderController::class, 'orderInformationPdf'])->name('order_information');
    Route::get('vendor/order/invoice', [OrderController::class, 'invoice'])->name('order/invoice');
    Route::get('vendor/order/user/profile/{id}', [OrderController::class, 'userProfile'])->name('user_profile');
    // Order === Tracking Status Route
    Route::get('packed-status/{id}', [OrderController::class, 'packedStatus'])->name('packed-status');
    Route::get('shipped-status/{id}', [OrderController::class, 'shippedStatus'])->name('shipped-status');
    Route::get('delivered-status/{id}', [OrderController::class, 'deliveredStatus'])->name('delivered-status');
});


// User Home Page Route
// User Login & Register Route

Route::controller(UserController::class)->group(function(){
    Route::get('/', 'index')->name('/');

    Route::get('user/register', 'registerView')->name('user/register');
    Route::post('user/register', 'registration')->name('register');

    Route::get('user/login', 'loginView')->name('user/login');
    Route::post('user/login', 'login')->name('user/login');
    Route::get('checkout/address','checkout')->name('checkout/address');
});

Route::middleware(['user'])->group( function(){
    Route::controller(UserController::class)->group( function(){
        Route::get('user/logout', 'userLogout')->name('user/logout');
        Route::get('user/account', 'UserAccount')->name('user/account');
        Route::get('checkout/create/address', 'createAddress')->name('checkout/create/address');
        Route::post('checkout/create/address', 'checkoutCreateAddress')->name('checkout/create/address');
        Route::post('checkoutAddress', 'checkoutSelectAddress')->name('checkoutAddress');
        Route::get('checkout/summary', 'checkoutSummary')->name('checkout/summary');
        Route::post('confirm/order', 'confirmOrder')->name('confirm/order');
    });
});

Route::controller(UserProductController::class)->group( function(){
    Route::get('product/details/{id}', 'ProductDetails')->name('product/details');
    Route::post('add_to_cart/{product}', 'addToCart')->name('add_to_cart');
    Route::get('cart', 'cart')->name('cart');
    Route::get('cart/removeItem/{id}', 'removeItem')->name('cart/removeItem');
    Route::post('/items/increment/{id}', 'increment')->name('items.increment');
    Route::post('/items/decrement/{id}', 'decrement')->name('items.decrement');
});




////////////////////    Whatsapp PDF Testing ////////////////////////
Route::get('dashboard', [WhatsappPdfController::class, 'dashboard'])->name('dashboard');
Route::get('userlist', [WhatsappPdfController::class, 'userlist'])->name('userlist');
Route::get('user/{id}', [WhatsappPdfController::class, 'User'])->name('user');
Route::post('sendPdf', [WhatsappPdfController::class, 'sendPdf'])->name('sendPdf');