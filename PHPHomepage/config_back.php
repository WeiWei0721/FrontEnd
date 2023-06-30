<?php
//Turns off Warning Notices for php file
error_reporting(E_ERROR | E_WARNING | E_PARSE);

$servername = "localhost";
$username = "root";
$password = "mysql";
$database = "uploadimage";

// Create connection
$db = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$db) {
  die("Connection failed: " . $db->connect_error);
}
$sql = '';

?>