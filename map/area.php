<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "mapfunction";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve information for the specified area
$id = $_GET["id"];
$sql = "SELECT data_title, data_message FROM image_areas WHERE id = " . $id;
$result = $conn->query($sql);

// Output the area's information
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo "<h2>" . $row['data_title'] . "</h2><p>" . $row['data_message'] . "</p>";
}

$conn->close();
?>
