<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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

        Gate::define("admin", function(User $user) {
            return $user->hasRole("admin");
        });

        Gate::define("manager", function(User $user) {
            return $user->hasRole("manager");
        });
        
        Gate::define("employe", function(User $user) {
            return $user->hasRole("employe");
        });

        Gate::define("superadmin", function(User $user) {
            return $user->hasRole("superadmin");
        });
        
        // Gate::after(function (User $user) {
        //     return $user->hasRole("superadmin");
        //  });
    }
}
