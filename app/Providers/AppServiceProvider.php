<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use App\Http\View\Composers\InformasiPublikComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', InformasiPublikComposer::class);

        Blade::directive('linkify', function ($expression) {
            return "<?php echo preg_replace(
                '/(https?:\/\/[^\s]+)/',
                '<a href=\"$1\" target=\"_blank\" rel=\"noopener noreferrer\">$1</a>',
                $expression
            ); ?>";
        });
        
    }
}
