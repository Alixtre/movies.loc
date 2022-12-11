<?php
require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "config.php";

$_SESSION = array();

header("Location: /login");
die();
