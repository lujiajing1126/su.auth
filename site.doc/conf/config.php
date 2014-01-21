<?php
define('/SYS/ALL',1004);
define('/SYS/CAMPUS',1003);
define('/SYS/REGISTERED',1002);
define('/SYS/UIS',1001);
define('/SYS/ADMIN',1000);

$GLOBALS['connectionParams'] = array(
    'dbname' => 'test',
    'user' => 'root',
    'password' => '123456',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
);