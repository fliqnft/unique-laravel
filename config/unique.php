<?php

return [

    /* The base URL for the substrate rest endpoints
    |  Opal : https://rest.unique.network/opal/v1
    |  Quartz : https://rest.unique.network/quartz/v1
    |  Unique : https://rest.unique.network/unique/v1
    |  Local : http://localhost:3000/v1
    */
    'base_url' => 'https://rest.unique.network/unique/v1',

    /* Your mnemonic seed phrase for signing extrinsics
    |  Keep this secure, never check this into version control.
    |  Consider sponsoring your collection with a funded account
    |  and using your admin account's seed phrase here.
    |  https://docs.unique.network/concepts/network-features/sponsoring.html
    */
    'seed' => env('UNIQUE_SEED', ''),

];