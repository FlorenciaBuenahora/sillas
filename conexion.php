<?php

$host="localhost";
$username="root";
$password="root";
$database="sillasuy";

$link=mysqli_connect($host, $username, $password, $database);
mysqli_query($link, "SET NAMES 'utf8'");
?>