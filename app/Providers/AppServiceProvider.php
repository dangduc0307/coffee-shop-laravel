<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Cart;
use App\Models\CartItem;

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
    public function boot()
    {
        View::composer('*', function ($view) {

            $cartItems = collect();

            if (Auth::check()) {

                $cart = Cart::where('user_id', Auth::id())->first();

                if ($cart) {

                    $cartItems = $cart->cartItems()
                        ->with('product')
                        ->get();

                }

            }

            $view->with('cartItems', $cartItems);

        });
    }
}
