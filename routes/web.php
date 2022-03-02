<?php

use Illuminate\Support\Facades\Route;
use Webup\CMS\Http\Controllers\CmsController;

Route::get('/', [CmsController::class, 'index']);
