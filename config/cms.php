<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Route prefix
    |--------------------------------------------------------------------------
    |
    | This value corresponds to the prefix used when routing.
    |
    */

    'prefix' => 'cms',

    /*
    |--------------------------------------------------------------------------
    | Guard Middleware
    |--------------------------------------------------------------------------
    |
    | This value corresponds to the middleware used for the guarding routes.
    |
    */

    'guardMiddleware' => 'admin.auth:admin',

    /*
    |--------------------------------------------------------------------------
    | Guard
    |--------------------------------------------------------------------------
    |
    | This value corresponds to the guard used for validating save request.
    |
    */

    'guard' => 'admin',
];
