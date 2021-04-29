<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //get all permissions to check it for user
        if(Schema::hasTable('permissions'))
        {
            $permissions = Permission::pluck('slug');
            foreach ($permissions as $permission) {
                Gate::define($permission, function ($auth) use ($permission) {
                    return $auth->hasAbility($permission);
                });
            }
        }
    }
}
