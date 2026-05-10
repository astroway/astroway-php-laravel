<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| AstroWay SDK configuration
|--------------------------------------------------------------------------
|
| Published via:
|   php artisan vendor:publish --tag=astroway-config
|
| Pulls all values from .env so secrets stay out of git. Add to .env:
|   ASTROWAY_API_KEY=aw_live_...
|
*/

return [
    'api_key' => env('ASTROWAY_API_KEY'),
    'base_url' => env('ASTROWAY_BASE_URL'),
    'timeout' => env('ASTROWAY_TIMEOUT', 30.0),
    'auth_scheme' => env('ASTROWAY_AUTH_SCHEME', 'header'),
];
