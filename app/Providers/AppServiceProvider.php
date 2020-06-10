<?php

namespace App\Providers;

use Blade;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('pushonce', function ($expression) {
            $domain = explode(':', normalize($expression));
            $push_name = $domain[0];
            $push_sub = $domain[1];
            $isDisplayed = '__pushonce_' . $push_name . '_' . $push_sub;
            return "<?php if(!isset(\$__env->{$isDisplayed})): \$__env->{$isDisplayed} = true; \$__env->startPush('{$push_name}'); ?>";
        });

        Blade::directive('endpushonce', function ($expression) {
            return '<?php $__env->stopPush(); endif; ?>';
        });

        // styles + script: act as push once but fixed to 'styles' and 'scripts' stack
        Blade::directive('scopedscript', function ($expression) {
            $push_name = 'scripts';
            $push_sub = normalize($expression);
            $isDisplayed = '__scopedscript_' . $push_name . '_' . $push_sub;
            return "<?php if(!isset(\$__env->{$isDisplayed})): \$__env->{$isDisplayed} = true; \$__env->startPush('{$push_name}'); ?>";
        });

        Blade::directive('endscopedscript', function ($expression) {
            return '<?php $__env->stopPush(); endif; ?>';
        });

        Blade::directive('scopedstyle', function ($expression) {
            $push_name = 'styles';
            $push_sub = normalize($expression);
            $isDisplayed = '__scopedstyle_' . $push_name . '_' . $push_sub;
            return "<?php if(!isset(\$__env->{$isDisplayed})): \$__env->{$isDisplayed} = true; \$__env->startPush('{$push_name}'); ?>";
        });

        Blade::directive('endscopedstyle', function ($expression) {
            return '<?php $__env->stopPush(); endif; ?>';
        });
    }
}

function normalize(string $str)
{
    return str_replace(['-', '.', '\'', '"'], '_', $str);
}
