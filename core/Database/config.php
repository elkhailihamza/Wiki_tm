<?php

return [
    'database' => [
        'host' => $_ENV["db_host"],
        'port' => 3306,
        'dbname' => $_ENV["db_name"],
        'charset' => 'utf8mb4',
    ]
];