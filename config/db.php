<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'metascrv');
define('CHARSET', 'utf8');

$conn = new mysqli(HOST, USER, PASS, BASE);
$conn->set_charset('utf8');
