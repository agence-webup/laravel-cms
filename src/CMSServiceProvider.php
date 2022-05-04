<?php

namespace Webup\CMS;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;

class CMSServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes();
        Blade::componentNamespace('Webup\\CMS\\View\\Components', 'cms');

        $this->publishConfig();
        $this->publishMigration();
    }

    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'cms');
    }

    protected function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/cms.php' => config_path('cms.php'),
        ], 'cms-config');
    }

    protected function publishMigration()
    {
        $this->publishes([
            __DIR__ . '/../database/migrations/create_cms_entries_table.php.stub'
                => database_path('/migrations/' . date('Y_m_d_His', time()) . '_create_cms_entries_table.php'),
        ], 'cms-migrations');

        $this->publishes([
            __DIR__ . '/../database/migrations/create_cms_permissions.php.stub'
                => database_path('/migrations/' . date('Y_m_d_His', time()) . '_create_cms_permissions.php'),
        ], 'cms-permission-migrations');
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        $res = [
            'prefix' => config('cms.prefix'),
            'as' => config('cms.prefix') . '.',
            'middleware' => ['web'],
        ];

        if (config('cms.guard.enabled')) {
            $res['middleware'] = ['web', 'auth:' . config('cms.guard.name')];
        }
        return $res;
    }
}
