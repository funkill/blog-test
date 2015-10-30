<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 30.10.15
 * Time: 17:48
 */

return [
    'default' => 'pgsql',
    'connections' => [
        'pgsql' => [
            'driver'   => 'pgsql',
            'host'     => 'localhost',
            'database' => 'blog',
            'username' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD'],
            'charset'  => 'utf8',
            'prefix'   => '',
            'schema'   => 'blog',
        ]
    ],
];