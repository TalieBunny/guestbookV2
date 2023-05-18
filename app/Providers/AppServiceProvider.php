<?php

namespace App\Providers;

use App\Repository\AdminRepository;
use App\Repository\IAdminRepository;
use App\Repository\IMessageRepository;
use App\Repository\MessageRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IMessageRepository::class, MessageRepository::class);
        $this->app->bind(IAdminRepository::class, AdminRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
