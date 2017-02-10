<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Billing\Stripe;

class AppServiceProvider extends ServiceProvider
{
    //protect $defer = true; //note:do not use if you are using boot method 
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.sidebar', function($view){
            $view->with('archives', \App\Post::archives());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // App::bind('App\Billing\Stripe', function(){
        //  return new \App\Billing\Stripe(config('services.stripe.secret'));
        // });

        // \App::singleton('App\Billing\Stripe', function(){
        //     return new \App\Billing\Stripe(config('services.stripe.secret'));
        // });

        //  $this->app->singleton('App\Billing\Stripe', function(){
        //     return new \App\Billing\Stripe(config('services.stripe.secret'));
        // });

        // $this->app->singleton(Stripe::class, function(){
        //     return new Stripe(config('services.stripe.secret'));
        // });

        $this->app->singleton(Stripe::class, function($app){
            //$app->make('') if need to resolve goto RedisServiceProvider for reference
            return new Stripe(config('services.stripe.secret'));
        });
    }
}
