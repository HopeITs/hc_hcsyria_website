<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*
         * Authorizes viewing the locked "Projects & Map Locations" section
         * on the public micro page. A user may view it when they either:
         *   - hold the "Micro Public Page" permission directly, or
         *   - have the "Admin" role, or
         *   - have the "Publisher" role.
         * Guests and everyone else are denied.
         */
        Gate::define('view-micro-projects', function ($user) {
            $user = \App\User::with('roles', 'permissions')
                ->find($user->getAuthIdentifier());

            if (!$user) {
                return false;
            }

            return $user->permissions->contains('name', 'Micro Public Page')
                || $user->roles->contains('name', 'Admin')
                || $user->roles->contains('name', 'Publisher');
        });
    }
}
