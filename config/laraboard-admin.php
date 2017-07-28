<?php

return [
    'route' => [
        'middleware' => ['web'],
        'namespace'  => 'Christhompsontldr\LaraboardAdmin\Http\Controllers',
        'prefix'     => 'forum-admin',
    ],
    'view' => [
        'hintpath' => 'laraboard-admin',
        'flash'    => 'laraboard-admin::blocks.flash', //  blade to use for flash messages, if set to false or null, no blade will be used (assumes your site already renders these)
        'layout'   => 'layouts.app',  //  blade to use for layouts
    ],
];