<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('delete-new', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('superadmin');
        });

        Gate::define('add-new', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('superadmin');
        });

        Gate::define('add-photosOurClass', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('superadmin');
        });

        Gate::define('delete-photosOurClass', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('superadmin');
        });

        Gate::define('change-photosOurClass', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('superadmin');
        });

        //
    }
}
