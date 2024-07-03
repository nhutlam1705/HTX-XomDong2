<?php
 
namespace App\Providers;

use App\View\Composers\IntroductionComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
class ViewServiceProvider extends ServiceProvider
{
    public function register(){}
 
    public function boot()
    {
        View::composer('index',IntroductionComposer::class);
    }
}