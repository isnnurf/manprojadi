<?php

return [
    'paths' => ['api/*'],
    'allowed_methods' => ['POST', 'GET', 'DELETE', 'PUT', 'OPTIONS'],
    'allowed_origins' => ['http://localhost:5173', 'http://127.0.0.1:5173', 'http://localhost:3000'],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];