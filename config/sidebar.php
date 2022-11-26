<?php

use App\Http\Controllers\HomeController;
use Modules\Core\Http\Controllers\CoreController;
use Modules\Core\Http\Controllers\RoleController;

return [
    [
        'menu_header' => 'Testing Dashboard',
        'menu' => [
            [
                'name' => 'Testing Dashboard',
                'icon_class' => 'fas fa-fire',
                'submenu' => [
                    [
                        'name' => 'General Dashboard',
                        'url' => 'home',
                        'action' => [HomeController::class, 'index']
                    ],
                    [
                        'name' => 'E-Commerce Dashboard',
                        'url' => 'core.index',
                        'action' => [CoreController::class, 'index']
                    ]
                ]
            ]
        ]
    ],
    [
        'menu_header' => 'Core Settings',
        'menu' => [
            [
                'name' => 'Roles and permission',
                'icon_class' => 'far fa-square',
                'url' => 'role.index',
                'action' => [RoleController::class, 'index']
            ],
            [
                'name' => 'Core Testing Page',
                'icon_class' => 'fas fa-fire',
                'url' => 'core.index',
                'action' => [CoreController::class, 'index']
            ],
            [
                'name' => 'Core Testing Show',
                'icon_class' => 'fas fa-fire',
                'url' => 'core.show',
                'action' => [CoreController::class, 'show']
            ]

        ]
    ]
];
