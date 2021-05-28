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

        // Root Gates
        Gate::define('root-users', function (User $user) {
            if($user->getRoleNames()[0] == 'root'){
                return true;
            };
        });
        
        Gate::define('root-roles', function (User $user) {
            if($user->getRoleNames()[0] == 'root'){
                return true;
            };
        });

        Gate::define('root-owners', function (User $user) {
            if($user->getRoleNames()[0] == 'root'){
                return true;
            };
        });
    }
}
