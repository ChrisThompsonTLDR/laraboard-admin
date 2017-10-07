<?php

return [
    'route' => [
        'middleware' => ['web'],
        'namespace'  => 'Christhompsontldr\LaraboardAdmin\Http\Controllers',
        'prefix'     => 'forum-admin',
        'prefixDot'  => 'forum-admin.',
    ],

    'view' => [
        'hintpath' => 'laraboard-admin',
        'layout'   => 'laraboard-admin::layout',  //  blade to use for layouts
    ],

    'nav' => [
        [
            'text'      => 'Dashboard',
            'icon'      => 'fa fa-tachometer',
            'route'     => 'forum-admin.dashboard',
            'is_active' => 'forum-admin',
        ],
        [
            'text'      => 'Users',
            'icon'      => 'fa fa-tachometer',
            'route'     => 'forum-admin.users.index',
            'is_active' => 'forum-admin/users*',
        ],
        [
            'text'      => 'Threads',
            'icon'      => 'fa fa-code-fork',
            'route'     => 'forum-admin.threads.index',
            'is_active' => 'forum-admin/threads*',
        ],

    ]
];