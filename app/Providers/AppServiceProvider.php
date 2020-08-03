<?php

namespace App\Providers;

use Blade;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
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
        $this->registerPushOnceDirective('pushonce');
        $this->registerPushOnceDirective('scopedscript', 'scripts');
        $this->registerPushOnceDirective('scopedstyle', 'styles');
        $this->registerPushOnceDirective('scoped', 'globals');
    }

    function registerPushOnceDirective(string $directive, string $stack = null)
    {
        Blade::directive($directive, function ($expression) use ($directive, $stack) {
            if (is_null($stack)) {
                $domain = explode(':', $this->normalize($expression));
                $stack = $domain[0];
                $id = $domain[1];
            } else {
                $id = $this->normalize($expression);
            }
            $isDisplayed = '__' . $directive . '_' . $stack . '_' . $id;
            return "<?php if(!isset(\$__env->{$isDisplayed})): \$__env->{$isDisplayed} = true; \$__env->startPush('{$stack}'); ?>";
        });

        Blade::directive('end' . $directive, function ($expression) {
            return '<?php $__env->stopPush(); endif; ?>';
        });

        $this->app->resolving(LengthAwarePaginator::class, static function (LengthAwarePaginator $paginator) {
            return $paginator->appends(request()->query());
        });
        $this->app->resolving(Paginator::class, static function (Paginator $paginator) {
            return $paginator->appends(request()->query());
        });
    }

    function normalize(string $str)
    {
        return str_replace(['-', '.'], '_', trim(substr($str, 1, -1)));
    }
}
