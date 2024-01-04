<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'facilitaion' => 'c,r,u,d',
        ],
        'facilitaion_highboard' => [
            'facilitaion' => 'c,r,u,d',
        ],
        'facilitaion_member' => [
            'facilitaion' => 'c,r,u',
        ],
        'students'=>[
            'test-bank' => 'r'
        ]
        // 'role_name' => [
        //     'module_1_name' => 'c,r,u,d',
        // ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
