<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       Blade::directive('role', function ($arguments) {
            list($role, $guard) = explode(',', $arguments.',');

            return "<?php if(auth({$guard})->check() && auth({$guard})->user()->hasRole({$role})): ?>";
        });
       Blade::directive('elserole', function ($arguments) {
            list($role, $guard) = explode(',', $arguments.',');

            return "<?php elseif(auth({$guard})->check() && auth({$guard})->user()->hasRole({$role})): ?>";
        });
       Blade::directive('endrole', function () {
            return '<?php endif; ?>';
        });

       Blade::directive('hasrole', function ($arguments) {
            list($role, $guard) = explode(',', $arguments.',');

            return "<?php if(auth({$guard})->check() && auth({$guard})->user()->hasRole({$role})): ?>";
        });
       Blade::directive('endhasrole', function () {
            return '<?php endif; ?>';
        });

       Blade::directive('hasanyrole', function ($arguments) {
            list($roles, $guard) = explode(',', $arguments.',');

            return "<?php if(auth({$guard})->check() && auth({$guard})->user()->hasAnyRole({$roles})): ?>";
        });
       Blade::directive('endhasanyrole', function () {
            return '<?php endif; ?>';
        });

       Blade::directive('hasallroles', function ($arguments) {
            list($roles, $guard) = explode(',', $arguments.',');

            return "<?php if(auth({$guard})->check() && auth({$guard})->user()->hasAllRoles({$roles})): ?>";
        });
       Blade::directive('endhasallroles', function () {
            return '<?php endif; ?>';
        });

       Blade::directive('unlessrole', function ($arguments) {
            list($role, $guard) = explode(',', $arguments.',');

            return "<?php if(!auth({$guard})->check() || ! auth({$guard})->user()->hasRole({$role})): ?>";
        });
       Blade::directive('endunlessrole', function () {
            return '<?php endif; ?>';
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->environment('production')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
    }
}
