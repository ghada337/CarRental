<?php

namespace App\Providers;

use App\Models\Message;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Paginator::useBootstrapFour();
        View::composer('admin.layouts.pages', function ($view) {
            $unreadCount = Message::where('read', 0)->count();
            $view->with('unreadMessagesCount', $unreadCount);
        });
    }
}
