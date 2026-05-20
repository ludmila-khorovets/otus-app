<?php

namespace App\Providers;

use App\Interfaces\Repository\BookingRepositoryInterface;
use App\Interfaces\Repository\EquipmentRepositoryInterface;
use App\Interfaces\Repository\HallRepositoryInterface;
use App\Repositories\BookingRepository;
use App\Repositories\EquipmentRepository;
use App\Repositories\HallRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(HallRepositoryInterface::class, HallRepository::class);
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
        $this->app->bind(EquipmentRepositoryInterface::class, EquipmentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(!$this->app->isProduction());
        Model::preventSilentlyDiscardingAttributes(!$this->app->isProduction());
    }
}
