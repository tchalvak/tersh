<?php
define('ABSPATH', __DIR__.'/');
require_once(ABSPATH.'../wp-config.php');
$loaded = extension_loaded('mysql');

if($loaded){
    echo 'Mysql extension loaded';
   }
//mysql_connect();
