<?php

use App\Http\Controllers\App\DashboardController;
use App\Http\Controllers\App\DealerController;
use App\Http\Controllers\App\DealerGroupController;
use App\Http\Controllers\App\PersonnelController;
use App\Http\Controllers\App\ProductCategoryController;
use App\Http\Controllers\App\ProductController;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['tenant', 'tenant_session', 'auth']], function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/',function(){
        Artisan::call('optimize:clear');
        Artisan::call('tenants:artisan route:cache');
        /*Artisan::call('route:clear');
        Artisan::call('route:cache');
        Artisan::call('cache:clear');*/
        /*Tenant::first()->execute(function (Tenant $tenant) {
            // it will clear the tenant cache
            Artisan::call('cache:clear');

            // it will clear the landlord cache
            Landlord::execute(fn () => Artisan::call('cache:clear'));
        });*/
        $db = DB::connection('tenant')->getDatabaseName();

        dump($db);
        return "finish21321231233223213";
    });
    Route::get('/migrate',function(){
        Artisan::call('tenants:artisan "migrate --database=tenant"');
    });
    Route::get('/migrate-fresh',function(){
        Artisan::call('tenants:artisan "migrate:fresh --database=tenant"');
    });

    Route::get('/seed',function(){
        User::factory()->create([
            'name' => 'super',
            'email' => 'super@gmail.com',
            'password' => '12345678',
        ]);
    });

    Route::group(['prefix' => 'product'],function (){
        Route::get('/',[ProductController::class,'index'])->name('product.index');
        Route::get('/fetch',[ProductController::class,'fetch'])->name('product.fetch');
        Route::get('/product-ist',[ProductController::class,'productList'])->name('product.product_list');
        Route::get('/show/{id}',[ProductController::class,'show'])->name('product.show');
        Route::get('/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');
        Route::get('/destroy-product-image/{id}',[ProductController::class,'destroyProductImage'])->name('product.destroy_product_image');
        Route::post('/update/{id}',[ProductController::class,'update'])->name('product.update');
    });

    Route::group(['prefix' => 'product-category'],function (){
        Route::get('/',[ProductCategoryController::class,'index'])->name('product_category.index');
        Route::get('/add',[ProductCategoryController::class,'add'])->name('product_category.add');
        Route::get('/fetch',[ProductCategoryController::class,'fetch'])->name('product_category.fetch');
        Route::get('/show/{id}',[ProductCategoryController::class,'show'])->name('product_category.show');
        Route::get('/destroy/{id}',[ProductCategoryController::class,'destroy'])->name('product_category.destroy');
        Route::post('/store',[ProductCategoryController::class,'store'])->name('product_category.store');
        Route::post('/update/{id}',[ProductCategoryController::class,'update'])->name('product_category.update');
    });

    Route::group(['prefix' => 'dealer'],function (){
        Route::get('/',[DealerController::class,'index'])->name('dealer.index');
        Route::get('/add',[DealerController::class,'add'])->name('dealer.add');
        Route::get('/fetch',[DealerController::class,'fetch'])->name('dealer.fetch');
        Route::get('/show/{id}',[DealerController::class,'show'])->name('dealer.show');
        Route::get('/destroy/{id}',[DealerController::class,'destroy'])->name('dealer.destroy');
        Route::post('/store',[DealerController::class,'store'])->name('dealer.store');
        Route::post('/update/{id}',[DealerController::class,'update'])->name('dealer.update');
    });

    Route::group(['prefix' => 'dealer-group'],function (){
        Route::get('/',[DealerGroupController::class,'index'])->name('dealer_group.index');
        Route::get('/add',[DealerGroupController::class,'add'])->name('dealer_group.add');
        Route::get('/fetch',[DealerGroupController::class,'fetch'])->name('dealer_group.fetch');
        Route::get('/show/{id}',[DealerGroupController::class,'show'])->name('dealer_group.show');
        Route::get('/destroy/{id}',[DealerGroupController::class,'destroy'])->name('dealer_group.destroy');
        Route::post('/store',[DealerGroupController::class,'store'])->name('dealer_group.store');
        Route::post('/update/{id}',[DealerGroupController::class,'update'])->name('dealer_group.update');
    });

    Route::group(['prefix' => 'personnel'],function (){
        Route::get('/',[PersonnelController::class,'index'])->name('personnel.index');
        Route::get('/add',[PersonnelController::class,'add'])->name('personnel.add');
        Route::get('/fetch',[PersonnelController::class,'fetch'])->name('personnel.fetch');
        Route::get('/show/{id}',[PersonnelController::class,'show'])->name('personnel.show');
        Route::get('/destroy/{id}',[PersonnelController::class,'destroy'])->name('personnel.destroy');
        Route::post('/store',[PersonnelController::class,'store'])->name('personnel.store');
        Route::post('/update/{id}',[PersonnelController::class,'update'])->name('personnel.update');
    });
});
