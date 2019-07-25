<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Logging
    |--------------------------------------------------------------------------
    |
    | This option enables logging all LDAP operations on all configured
    | connections such as bind requests and CRUD operations.
    |
    | Log entries will be created in your default logging stack.
    |
    | This option is extremely helpful for debugging connectivity issues.
    |
    */

    'logging' => env('LDAP_LOGGING', false),

    /*
    |--------------------------------------------------------------------------
    | Connections
    |--------------------------------------------------------------------------
    |
    | This array stores the connections that are added to Adldap. You can add
    | as many connections as you like.
    |
    | The key is the name of the connection you wish to use and the value is
    | an array of configuration settings.
    |
    */

    'connections' => [

        'default' => [
            'auto_connect' => env('LDAP_AUTO_CONNECT', true),
            'connection' => Adldap\Connections\Ldap::class,
            'settings' => [
                // Mandatory Configuration Options
                'hosts'            => ['isu-srv16-dc1.maaref.org','isu-srv16-dc2.maaref.org'],
                'base_dn'          => 'dc=maaref,dc=org',
                'username'         => 'PortalAuthentication',
                'password'         => 'Portal!Auth@#',

                // Optional Configuration Options
                'schema'           => \Adldap\Schemas\ActiveDirectory::class,
                'account_prefix'   => '',
                'account_suffix'   => '',
                'port'             => 389,
                'follow_referrals' => false,
                'use_ssl'          => false,
                'use_tls'          => false,
                'version'          => 3,
                'timeout'          => 5,

                // Custom LDAP Options
                'custom_options'   => [
                    // See: http://php.net/ldap_set_option
                    LDAP_OPT_X_TLS_REQUIRE_CERT => LDAP_OPT_X_TLS_HARD
                ]
            ]
        ],

    ],

];
