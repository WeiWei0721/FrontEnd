<?php
//Turns off Warning Notices for php file
error_reporting(E_ERROR | E_PARSE);

$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "mapfunction";
$dbname_old_property = "privateproperty";
$dbname_new_property = "property";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn_old_property = new mysqli($servername, $username, $password, $dbname_old_property);
$conn_new_property = new mysqli($servername, $username, $password, $dbname_new_property);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
   session_start();
}

?>