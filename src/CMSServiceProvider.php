<?php

namespace Webup\CMS;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;

use Webup\CMS\Blade\Cms;
use Webup\CMS\Blade\EndCms;

class CMSServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes();
        $this->registerBlade();

        $this->publishConfig();
        $this->publishPublic();
        $this->publishMigration();
    }

    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'cms');
    }

    protected function registerBlade()
    {
        Blade::directive(Cms::DIRECTIVE, function ($expression) {
            return Cms::generate($expression);
        });

        Blade::directive(EndCms::DIRECTIVE, function ($expression) {
            return EndCms::generate($expression);
        });
    }

    protected function publishPublic()
    {
        $this->publishes([
            __DIR__ . '/../public' => public_path('vendor/cms'),
        ], 'public');
    }

    protected function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/cms.php' => config_path('cms.php'),
        ], 'config');
    }

    protected function publishMigration()
    {
        $this->publishes([
            __DIR__ . '/../database/migrations/create_cms_entries_table.php.stub'
                => database_path('/migrations/' . date('Y_m_d_His', time()) . '_create_cms_entries_table.php'),
        ], 'migrations');
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => config('cms.prefix'),
            'middleware' => config('cms.middleware'),
        ];
    }
}
