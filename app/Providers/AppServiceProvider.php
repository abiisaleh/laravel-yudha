<?php

namespace App\Providers;

use App\Filament\MyLogoutResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse as LogoutResponseContract;
use Filament\Support\Facades\FilamentView;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
      /** FilamentView::registerRenderHook(
      *  'panels::body.start', 
      *  fn (): string => Blade::render('@livewire(\'registration-link\')'),
      ); 
      */
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        $this->app->bind(LogoutResponseContract::class, MyLogoutResponse::class);
    }
}
