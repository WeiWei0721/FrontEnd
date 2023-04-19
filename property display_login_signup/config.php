<?php
$servername = "localhost";
$username = "root";
$password = "TIC2601";
$database = "property";

// Create connection
$link = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$link) {
  die("Connection failed: " . $link->connect_error);
}
$sql = '';

?>