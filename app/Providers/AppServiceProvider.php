<?php

namespace App\Providers;

use App\Interfaces\BasketRepositoryInterface;
use App\Interfaces\DealerGroupRepositoryInterface;
use App\Interfaces\DealerRepositoryInterface;
use App\Interfaces\GeozoneRepositoryInterface;
use App\Interfaces\ImageServiceInterface;
use App\Interfaces\PersonnelRepositoryInterface;
use App\Interfaces\ProductCategoryRepositoryInterface;
use App\Interfaces\ProductImageRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Services\BasketService;
use App\Services\DealerGroupService;
use App\Services\DealerService;
use App\Services\GeozoneService;
use App\Services\ImageService;
use App\Services\PersonnelService;
use App\Services\ProductCategoryService;
use App\Services\ProductImageService;
use App\Services\ProductService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductService::class);
        $this->app->bind(ProductImageRepositoryInterface::class, ProductImageService::class);
        $this->app->bind(ProductCategoryRepositoryInterface::class, ProductCategoryService::class);
        $this->app->bind(DealerRepositoryInterface::class, DealerService::class);
        $this->app->bind(DealerGroupRepositoryInterface::class, DealerGroupService::class);
        $this->app->bind(PersonnelRepositoryInterface::class, PersonnelService::class);
        $this->app->bind(BasketRepositoryInterface::class, BasketService::class);
        $this->app->bind(GeozoneRepositoryInterface::class, GeozoneService::class);
        $this->app->singleton(ImageServiceInterface::class, ImageService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        App::setLocale('tr');
    }
}
