<?php

/*
|--------------------------------------------------------------------------
| Tenant Database Map
|--------------------------------------------------------------------------
| Maps each domain/subdomain to its own MySQL database credentials.
| Add one entry per client shop. The host key must match the exact
| HTTP Host header (no port, no trailing slash).
|chandana.lumac.lk
| Example:
|   'asitha-pos.lumac.lk' => [
|       'database' => 'asitha_lmucpos',
|       'username' => 'asitha_dbuser',
|       'password' => 'secret',
|       'host'     => 'localhost',   // optional, defaults to DB_HOST
|   ],
*/

return [
    'lover-kahatagasdigiliya.lumac.cc' => [
        'database' => 'lover_kahatagasdigiliya',
        'username' => 'lmucunal_mysql',
        'password' => 'K!ngd0m@!t0ne',
    ],
    'chandana.lumac.cc' => [
        'database' => 'chandana_super',
        'username' => 'lmucunal_mysql',
        'password' => 'K!ngd0m@!t0ne',
    ],
    'hiruna-marketing.lumac.cc' => [
        'database' => 'hiruna_marketing',
        'username' => 'lmucunal_mysql',
        'password' => 'K!ngd0m@!t0ne',
    ],
    'pos.lumac.cc' => [
        'database' => 'enewirathna_super',
        'username' => 'lmucunal_mysql',
        'password' => 'K!ngd0m@!t0ne',
    ],
    'localhost' => [
        'database' => 'pos',
        'username' => 'root',
        'password' => 'root',
    ],

    
];
