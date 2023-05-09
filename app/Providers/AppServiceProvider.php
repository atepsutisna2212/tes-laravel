<?php

namespace App\Providers;

use Illuminate\Auth\Access\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->re
        // Gate::define('admin', function (User $user) {
        //     return $user->status === 'admin';
        // });
        Validator::extend('lowercase', function ($attribute, $value, $parameters, $validasi) {
            return strtolower($value) === $value;
        });
    }
}
