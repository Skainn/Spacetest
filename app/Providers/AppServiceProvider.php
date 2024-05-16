<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MyService;
use App\Repositories\MyRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Привязка интерфейса к реализации
        $this->app->bind(MyServiceInterface::class, MyService::class);

        // Регистрация сервиса
        $this->app->singleton('my-service', function ($app) {
            return new MyService($app->make(MyRepository::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Настройка базы данных
        \Schema::defaultStringLength(191);
    }
}

