<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Guard
    |--------------------------------------------------------------------------
    |
    | Defines the guard associated with CMS edition.
    |
    */

    'guard' => [
        /*
        |--------------------------------------------------------------------------
        | Enabled
        |--------------------------------------------------------------------------
        |
        | Defines wether guard checking is enabled or not.
        |
        */

        'enabled' => true,

        /*
        |--------------------------------------------------------------------------
        | Name
        |--------------------------------------------------------------------------
        |
        | The name of the guard used to check that the user is logged in.
        |
        */

        'name' => 'admin',
    ],

    /*
    |--------------------------------------------------------------------------
    | Permission
    |--------------------------------------------------------------------------
    |
    | Defines permissions associated with CMS edition. Permission checking is
    | disabled if `guard.enabled` is false.
    |
    */

    'permission' => [
        /*
        |--------------------------------------------------------------------------
        | Enabled
        |--------------------------------------------------------------------------
        |
        | Defines wether permission checking is enabled or not.
        |
        */

        'enabled' => true,

        /*
        |--------------------------------------------------------------------------
        | Name
        |--------------------------------------------------------------------------
        |
        | The name of the permission the user must have to be able to edit the
        | content of any CMS entry.
        |
        */

        'name' => 'cms.upsert',
    ],
];
