<?php 
use Illuminate\Support\Str;

return [

'default' => env('DB_CONNECTION', 'mysql'),
'migrations'=>'migrations',
'connections'  => [

     'mysql'  => [
     'driver'     => env('DB_CONNECTION',''),
     'host'       => env('DB_HOST', 'localhost'),
     'database'   => env('DB_DATABASE', 'forge'),
     'username'   => env('DB_USERNAME', 'forge'),
     'password'   => env('DB_PASSWORD', ''),
     'charset'    => 'utf8',
     'collation'  => 'utf8_unicode_ci',
     'prefix'     => '',
     'strict'     => false,
     ],

    'comments'  => [
    'driver'     => env('COMMENTS_CONNECTION',''),
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

];

?>
