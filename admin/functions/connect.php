<?php 

define("HOST",value: "localhost");
define("USER",value: "root");
define("PASSWORD",value: "");
define("DATABASE",value: "dream");

$conn =new mysqli(HOST,USER, PASSWORD ,DATABASE);
$conn->set_charset("utf8");