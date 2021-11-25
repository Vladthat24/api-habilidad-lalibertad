<?php 
'default'  => 'mysql',

'connections'  => [

     'mysql'  => [
     'driver'     => 'mysql',
     'host'       => env('DB_HOST', 'localhost'),
     'database'   => env('DB_DATABASE', 'forge'),
     'username'   => env('DB_USERNAME', 'forge'),
     'password'   => env('DB_PASSWORD', ''),
     'charset'    => 'utf8',
     'collation'  => 'utf8_unicode_ci',
     'prefix'     => '',
     'strict'     => false,
     ],

    ‘comments’  => [
    'driver'     => 'mysql',
    'host'       => env('COMMENTS_HOST', 'localhost'),
    'database'   => env('COMMENTS_DATABASE', 'forge'),
    'username'   => env('COMMENTS_USERNAME', 'forge'),
    'password'   => env('COMMETNS_PASSWORD', ''),
    'charset'    => 'utf8',
    'collation'  => 'utf8_unicode_ci',
    'prefix'     => '',
    'strict'     => false,
     ],

],
?>
