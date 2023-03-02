<?php

namespace App\Providers;

use App\Infra\Services\Invoices;
use App\Infra\Services\Webhook;
use App\Services\InvoicesInterface;
use App\Services\WebhookInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(InvoicesInterface::class, Invoices::class);
        $this->app->bind(WebhookInterface::class, Webhook::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
