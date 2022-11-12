<?php

return [
    'name' => 'Core',

        /*
    |--------------------------------------------------------------------------
    | Key used for the encryption
    |--------------------------------------------------------------------------
    |
    | Sodium Crypto Secretbox Key.
    |
    */
    'server_key' => env('SERVER_KEY', null),


     /*
    |--------------------------------------------------------------------------
    | NOnce used for the encryption
    |--------------------------------------------------------------------------
    |
    | Sodium Crypto Secretbox NOnce.
    |
    */
    'server_nonce' => env('SERVER_NONCE', null),

];
