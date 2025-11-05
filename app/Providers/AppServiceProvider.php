<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', true);

$pdf = new \Dompdf\Dompdf($options);

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
        
        
        // Super Admin tem acesso a todas as páginas
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });
    }
}
