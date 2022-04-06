<?php

use Illuminate\Support\Facades\Route;
use Webup\CMS\Http\Controllers\CmsController;

Route::post('/upsert', [CmsController::class, 'upsert'])->name('upsert');
