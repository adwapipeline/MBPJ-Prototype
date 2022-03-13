<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
           return $user->role == 'admin';
        });

        /* define a Penyelia user role */
        Gate::define('isPenyelia', function($user) {
            return $user->role == 'penyelia';
        });

        /* define a Pelanggan role */
        Gate::define('isPelanggan', function($user) {
            return $user->role == 'pelanggan';
        });
    }
}
