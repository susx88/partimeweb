
<?php

$server   = "localhost";
$username = "grupojeg_partime";
$password = "partime.2017*";
$database = "grupojeg_partime";




$mysqli = new mysqli($server, $username, $password, $database);


if ($mysqli->connect_error) {
    die('error'.$mysqli->connect_error);
}

$mysqli->set_charset("utf8");
?>