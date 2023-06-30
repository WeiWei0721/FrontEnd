<?php
// Create a connection to your own database
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "hdbinfo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve the resale data from HDB
$url = 'https://data.gov.sg/dataset/resale-flat-prices/resource/8c00bf08-9124-479e-aeca-7cc411d884c4/download/resale-flat-prices-based-on-registration-date-from-jan-2017-onwards.csv';
$csv = file_get_contents($url);
$rows = explode("\n", $csv);
$count = 0;
array_shift($rows);

// Loop through each row of data and insert into your own database
foreach($rows as $row) {
  $data = str_getcsv($row);

  // Use the relevant columns to insert into your own database
  $month = $data[0];
  $town = $data[1];
  $flat_type = $data[2];
  $block = $data[3];
  $street_name = $data[4];
  $story_range = $data[5];
  $floor_area = $data[6];
  //$flat_model = $data[7];
  $lease_commence_date = $data[8];
  //$remaining_lease = $data[9];
  $resale_price = $data[9];

  $sql = "INSERT INTO hdbresaledata (DateofSale, Town, FlatType, Block, StreetName, FloorLevel, FloorArea, LeaseCommenceDate, Price) 
          VALUES ('$month', '$town', '$flat_type', '$block','$street_name', '$story_range', '$floor_area', '$lease_commence_date', '$resale_price')";

  if ($conn->query($sql) === TRUE) {
    echo "Record added successfully.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $count++;
  if ($count==200){
    break;
  }

}

$conn->close();
?>
