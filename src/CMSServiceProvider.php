<?php

namespace Webup\CMS;

use Illuminate\Support\ServiceProvider;

class CMSServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '../config/cms.php' => config_path('cms.php')
        ]);
    }

    public function register()
    {

    }
}
