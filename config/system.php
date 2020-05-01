<?php

return [
    'APP_DEBUG' => env('APP_DEBUG', false),
    'DEBUG_ENVIRONMENT' => env('DEBUG_ENVIRONMENT', 'webpack'),
    'admin_view_folder' => env('ADMIN_VIEW_FOLDER', 'default'),
    'admin_asset_folder' => env('ADMIN_ASSET_FOLDER', 'default'),
    'admin_asset_version' => env('ADMIN_ASSET_VERSION', '1.0'),
    'admin_per_page' => env('ADMIN_PER_PAGE', 30),


    'frontend_view_folder' => env('FRONTEND_VIEW_FOLDER', 'default'),
    'frontend_asset_folder' => env('FRONTEND_ASSET_FOLDER', 'default'),
    'frontend_asset_version' => env('FRONTEND_ASSET_VERSION', '1.0'),

    'fb_app_id' => env('FB_APP_ID', null),
    'fb_app_secret' => env('FB_APP_SECRET', null),
    'fb_redirect_url' => env('FB_REDIRECT_URL', null),

    // Image v2 (Order of Images need to be kept exactly its index)
    'upload_max_filesize' => 3096,
    'image_sizes' => [
        'original' => ['width' => 2048, 'height' => null],
        'lg' => ['width' => 1024, 'height' => null],
        'md' => ['width' => 512, 'height' => null],
        'sm' => ['width' => 150, 'height' => null],
        'xs' => ['width' => 50, 'height' => null],
    ],
    'currency' => [
        'decimals' => env('CURRENCY_DECIMALS') ? env('currency_decimals') : 0,
        'dec_point' => env('CURRENCY_DEC_POINT', ','),
        'thousands_sep' => env('CURRENCY_THOUSANDS_SEP', '.'),
        'symbol' => env('CURRENCY_SYMBOL','₫'),
        'code' => env('CURRENCY_CODE', 'VND')
    ],
];
