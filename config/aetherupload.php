<?php

return [

    'distributed_deployment' => [

        'enable' => false,

        'role' => 'web',

        'web' => [
            'storage_host' => '',
        ],

        'storage' => [
            'middleware_cors' => '',
            'allow_origin' => [],
        ],

    ],

    'instant_completion' => false,

    'root_dir' => 'aetherupload',

    'chunk_size' => 1000000,

    'resource_subdir_rule' => 'month',

    'header_storage_disk' => 'local',

    'forbidden_extensions' => ['php', 'part', 'html', 'shtml', 'htm', 'shtm', 'xhtml', 'xml', 'js', 'jsp', 'asp', 'java', 'py', 'sh', 'bat', 'exe', 'dll', 'cgi', 'htaccess', 'reg', 'aspx', 'vbs'],

    'extra_mime_types' => [],

    'middleware_preprocess' => [],
    'middleware_uploading' => [],
    'middleware_display' => [],
    'middleware_download' => [],


    'route_preprocess' => '/aetherupload/preprocess',
    'route_uploading' => '/aetherupload/uploading',
    'route_display' => '/aetherupload/display',
    'route_download' => '/aetherupload/download',


    'lax_mode' => false,


    'groups' => [

        'file' => [
            'group_dir' => 'file',
            'resource_maxsize' => 0,
            'resource_extensions' => [],
            'event_before_upload_complete' => '',
            'event_upload_complete' => '',
        ],

    ],
];
