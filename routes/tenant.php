<?php

use App\Http\Controllers\App\DashboardController;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Spatie\Multitenancy\Landlord;

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

    Route::get('/seed',function(){
        User::factory()->create([
            'name' => 'super',
            'email' => 'super@gmail.com',
            'password' => '12345678',
        ]);
    });
    //return view('welcome');
});
