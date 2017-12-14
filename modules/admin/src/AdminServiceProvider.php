<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/9/4
 * Time: 下午5:47
 */

namespace Modules\Admin;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\Admin\Commands\AdminCommand;

class AdminServiceProvider extends ServiceProvider
{

    protected $routeMiddleware = [
        'admin.auth' => \Modules\Admin\Middleware\Authenticate::class,
        'role' => \Zizaco\Entrust\Middleware\EntrustRole::class,
        'permission' => \Zizaco\Entrust\Middleware\EntrustPermission::class,
        'ability' => \Zizaco\Entrust\Middleware\EntrustAbility::class,
    ];

    protected $middlewareGroups = [
        'admin' => [
            'admin.auth',
        ],
    ];

    protected function registerRouteMiddleware()
    {
        // register route middleware.
        foreach ($this->routeMiddleware as $key => $middleware) {
            app('router')->aliasMiddleware($key, $middleware);
        }

        // register middleware group.
        foreach ($this->middlewareGroups as $key => $middleware) {
            app('router')->middlewareGroup($key, $middleware);
        }
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // 路由
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        // 数据库迁移
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // view
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin');

        // 配置
        $this->publishes([
            __DIR__.'/../config/admin.php' => config_path('admin.php'),
        ], 'admin');

        // 资源
        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('packages/admin'),
        ], 'admin');

        // 注册命令
        if ($this->app->runningInConsole()) {
            $this->commands([
                AdminCommand::class,
            ]);
        }

        $this->loadHelper();

        $this->registerComposers();

        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadAdminAuthConfig();

        $this->registerRouteMiddleware();
    }

    protected function loadAdminAuthConfig()
    {
        config(array_dot(config('admin.auth', []), 'auth.'));
    }

    protected function registerComposers() {
        // 使用类来指定视图组件
        View::composer('admin::*', 'Modules\Admin\Composers\MenuComposer');
        View::composer('admin::*', 'Modules\Admin\Composers\BreadcrumbComposer');
    }

    protected function loadHelper()
    {
        require_once __DIR__.'/helper.php';
    }


}