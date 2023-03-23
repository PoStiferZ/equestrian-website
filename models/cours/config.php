<?php
require('vendor/autoload.php');

use Dcblogdev\PdoWrapper\Database;

$options = [
    'host' => "localhost",
    'database' => "equestreproject",
    'username' => "root",
    'password' => "root"
];
$db = new Database($options);

$dir = "./";
