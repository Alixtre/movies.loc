<?php

define("ROOT_PATH", dirname(__FILE__));
define("TEMPLATES_PATH", dirname(__FILE__) . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR);
define ("DB_NAME","Movies");
define ("DB_USER","db_user");
define ("DB_USER_PASS","1111");

session_start();

$dbConnect = new PDO('mysql:host=localhost;dbname='.DB_NAME,DB_USER,DB_USER_PASS);
