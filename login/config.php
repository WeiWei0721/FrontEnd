<?php
//Turns off Warning Notices for php file
error_reporting(E_ERROR | E_WARNING | E_PARSE);

$servername = "localhost";
$username = "root";
$password = "mysql";
$database = "property";

// Create connection
$link = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$link) {
  die("Connection failed: " . $link->connect_error);
}
$sql = '';

?>