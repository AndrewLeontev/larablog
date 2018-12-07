<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        try {
            Permission::get()->map(function($permission) {
                Gate::define($permission->slug, function($user) use ($permission) {
                    return $user->hasPermissionTo($permission);
                });
            });
        }  catch (\Exception $e) {
            return [];
        }

        Blade::directive('role', function ($role){
            return "<?php if(auth()->check()) { ?>";
        });
        Blade::directive('endrole', function ($role){
            return "<?php } ?>";
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
