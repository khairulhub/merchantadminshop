<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\LoginController;
use App\Http\Models\storelist;

Route::get('/', function () {
    return redirect()->route('login'); // Redirect to the login page
});

Route::get('/', function () {
    return view('auth.login'); // Show login page directly
});






require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'admindashboard'])->name('admin.dashboard');

    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');



    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/dashboard/merchant-list','AllMerchants')->name('all.merchant.list');
        Route::get('/admin/dashboard/merchant-list-pending','AllUsersPending')->name('pending.merchants');
        Route::post('/update/userstatus','UpdateUserStatus')->name('update.userstatus');
        Route::post('/update-user-role', 'updateRole')->name('update.userrole');
    });
    

   

});



Route::middleware(['auth', 'role:merchant'])->group(function () {
   
    Route::get('/merchant/dashboard', [MerchantController::class, 'merchantdashboard'])->name('merchant.dashboard');

    Route::get('/merchant/logout', [MerchantController::class, 'MerchantLogout'])->name('merchant.logout');
   
    // ===============================================================================================
    // rotue for store list 
    //==================================================================================================


    Route::controller(MerchantController::class)->group(function(){
        Route::get('/merchant/store-list','Allstorelist')->name('all.storelist');
        Route::get('/merchant/create-store','Addstorelist')->name('add.storelist');

        Route::post('/store/storelist','Storestorelist')->name('store.storelist');
        Route::get('/edit/storelist/{id}','Editstorelist')->name('edit.storelist');
        Route::post('/update/storelist','Updatestorelist')->name('update.storelist');
        Route::get('/delete/storelist/{id}','Deletestorelist')->name('delete.storelist');
    });


    // ===============================================================================================
    // rotue for Category list 
    //==================================================================================================


    Route::controller(CategoryController::class)->group(function(){
        Route::get('/merchant/category-list','Allcategory')->name('all.category');
        Route::get('/merchant/create-category','Addcategory')->name('add.category');

        Route::post('/store/category','Storecategory')->name('store.category');
        Route::get('/edit/category/{id}','Editcategory')->name('edit.category');
        Route::post('/update/category','Updatecategory')->name('update.category');
        Route::get('/delete/category/{id}','Deletecategory')->name('delete.category');
    });


     // ===============================================================================================
    // rotue for Product list 
    //==================================================================================================



    Route::controller(ProductController::class)->group(function(){
        Route::get('/merchant/product-list','Allproductlist')->name('all.productlist');
        Route::get('/merchant/create-product','Addproductlist')->name('add.productlist');

        Route::post('/store/productlist','Storeproductlist')->name('store.productlist');
        Route::get('/edit/productlist/{id}','Editproductlist')->name('edit.productlist');
        Route::post('/update/productlist','Updateproductlist')->name('update.productlist');
        Route::get('/delete/productlist/{id}','Deleteproductlist')->name('delete.productlist');
    });

});



Route::get('/user', [UserController::class, 'index'])->name('home');
Route::get('/{shop}', [UserController::class, 'shopdetails'])->name('shop');




Route::post('/user/logout', [UserController::class, 'Logout'])->name('logout');
