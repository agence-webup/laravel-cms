<?php

namespace Webup\CMS;

use Illuminate\Support\ServiceProvider;

class CMSServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/cms.php' => config_path('cms.php')
        ], 'config');

        $this->publishes([
            __DIR__ . '/../database/migrations/create_cms_entries_table.php.stub'
                => database_path('/migrations/' . date('Y_m_d_His', time()) . '_create_cms_entries_table.php'),
        ], 'migrations');
    }

    public function register()
    {
        //
    }
}
