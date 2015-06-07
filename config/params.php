<?php
Dotenv::load(__DIR__ . '/..');

return [
    'adminEmail' => getenv('ADMIN_EMAIL'),
];
