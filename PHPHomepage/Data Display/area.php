<!DOCTYPE html>
<?php 
  include("config.php");
  session_start(); 
?>

<?php
// Connect to the database
// error_reporting(E_ERROR | E_PARSE);

// $servername = "localhost";
// $username = "root";
// $password = "mysql";
// $dbname = "mapfunction";
// $dbname_old_property = "privateproperty";
// $dbname_new_property = "property";

// $conn = new mysqli($servername, $username, $password, $dbname);
// $conn_old_property = new mysqli($servername, $username, $password, $dbname_old_property);
// $conn_new_property = new mysqli($servername, $username, $password, $dbname_new_property);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
//    session_start();
// }

// Retrieve information for the specified area
$id = $_SESSION["id"];

switch($id){ 
			case (28):
			    $area = "('Seletar', 'Yio Chu Kang')";
				break;
			case (27):
			    $area = "('Admiralty Drive', 'Sembawang, 'Yishun')";
				break;
			case (26):
			    $area = "('Springleaf', 'Tagore', 'Upper Thomson')";
				break;
			case (25):
			    $area = "('Admiralty Road', 'Kranji', 'Woodgrove', 'Woodlands')";
				break;
			case (24):
			    $area = "('Lim Chu Kang', 'Sungei Gedong', 'Tengah')";
				break;
			case (23):
			    $area = "('Bukit Batok', 'Bukit Panjang', 'Choa Chu Kang', 'Dairy Farm', 'Hillview')";
				break;
			case (22):
			    $area = "('Boon Lay','Tuas','Jurong')";
				break;
			case (21):
			    $area = "('Clementi Park', 'Hume Avenue', 'Ulu Pandan', 'Upper Bukit Timah')";
				break;
			case (20):
			    $area = "('Ang Mo Kio','Bishan','Bradell','Thomson')";
				break;
			case (19):
				$area = "('Hougang','Punggol','Sengkang','Seranggon Garden')";
				break;
			case (18):
				$area = "('Paris Ris','Simei','Tampines')";
				break;
			case (17):
				$area = "('Changi','Flora','Loyang')";
				break;
			case (16):
				$area = "('Bayshore','Bedok','Chai Chee','Eastwood','Kew Drive', 'Upper East Coast')";
				break;
			case (15):
				$area = "('Amber Road','East Coast','Joo Chiat','Katong','Marine')";
				break;
			case (14):
				$area = "('Eunos','Geylang','Kembangan','Paya Lebar','Sims')";
				break;
			case (13):
				$area = "('Braddell,'Macpherson','Potong Pasir')";
				break;
			case (12):
				$area = "('Balestier','Toa Payoh')";
				break;
			case (11):
				$area = "('Chancery','Dunearn Road','Moulmein','Newton','Novena', 'Thomson', 'Watten Estate')";
				break;
			case (10):
				$area = "('Ardmore','Balmoral','Bukit Timah','Grange Road',' Holland Road', 'Orchard Boulevard', 'Tanglin')";
				break;
			case (9):
				$area = "('Cairnhill','Killiney','Orchard','River Valley')";
				break;
			case (8):
				$area = "('Farrer Park','Little India','Seranggon Road')";
				break;
			case (7):
				$area = "('Beach Road','Bencoolen Road','Bugis','Golden Mile', 'Middle Road', 'Rocher')";
				break;
			case (6):
				$area = "('Beach Road (part)', 'City Hall', 'High Street', 'North Bridge Road')";
				break;
			case (5):
				$area = "('Buona Vista', 'Clementi', 'Dover', 'Hong Leong Garden', 'Pasir Panjang', 'West Coast')";
				break;
			case (4):
				$area = "('Harbourfront', 'Keppel', 'Sentosa', 'Telok Blangah')";
				break;
			case (3):
				$area = "('Alexandra', 'Queenstown', 'Redhill', 'Tiong Bahru')";
				break;
			case (2):
				$area = "('Anson', 'Chinatown', 'Shenton Way', 'Tanjong Pagar')";
				break;
			case (1):
				$area = "('Boat Quay', 'Cecil', 'Havelock Road', 'Marina', 'People’s Park', 'Raffles Place', 'Suntec City')";
				break;
			
			}

if($id >0){
	#KW's part
	$sql_sales = "SELECT ProjectName, StreetName, FloorArea, Price FROM properties WHERE district = ".$id;
	$result_sales = mysqli_query($conn_new_property,$sql_sales);
	while ($row_sales = mysqli_fetch_array($result_sales)){
		$result[] = $row_sales;
	}

	// if ($result > 0){
	// 	// Start the HTML table
	// 	echo '<table>';

	// 	// Add table headers
	// 	echo '<tr>';
	// 	echo '<th>Project Name</th>';
	// 	echo '<th>StreetName</th>';
	// 	echo '<th>Floor Area Type</th>';
	// 	echo '<th>Price</th>';
	// 	echo '</tr>';

	// 	foreach ($result as $row) {
	// 		echo '<tr>';
	// 		echo '<td>' . $row['ProjectName'] . '</td>';
	// 		echo '<td>' . $row['StreetName'] . '</td>';
	// 		echo '<td>' . $row['FloorArea'] . '</td>';
	// 		echo '<td>' . $row['Price'] . '</td>';
	// 		echo '</tr>';
	// 	}
		
	// 	// End the HTML table
	// 	echo '</table>';
	// }
	// else {
	// 	echo '<h2 class="page-header" >Opps! No HDB data available for the specific region yet.</h2>';
		
	// }

	#QM's part
	$sql_resale = "SELECT flat_type, town, storey_range, floor_area_sqm, lease_commencement_date, resale_price FROM hdb_resale_data WHERE town in ".$area;
	$result_resale = mysqli_query($conn,$sql_resale);
	$chart_data="";
	while ($row_resale = mysqli_fetch_array($result_resale)) { 

		 $Town[]  = $row_resale['town']  ;
		 $Lease[] = $row_resale['lease_commencement_date'];
		 $Price[] = $row_resale['resale_price'];
		 $list = join(',', $Town);
		 //$string = join(',', $Lease);
		 //$infos = join(',', $Price);
	 }
	 //echo $list;
	 //echo $string;
	 //echo $infos;

	$sql_private = "SELECT propertytype, street, floorange, area, contractdate, price FROM uraprpt WHERE district = " .$id;
	$result_private = mysqli_query($conn_old_property,$sql_private);
	while ($row_private = mysqli_fetch_array($result_private)) { 

		 $Town[]  = $row_private['street'];
		 $Price[] = $row_private['price'];
		 //$list_private = join(',', $street);
		 //$string_private = join(',', $Price);
	 }
	 //echo $list_private;
	 //echo $string_private;
	 //echo $infos;
?>

  


<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Graph</title> 
		<style>
			.page-header{
				text-align: center;
			}
		</style>
    </head>
    <body>
        <div style="width:90%; text-align:center">
            <h2 class="page-header" >Past Resale Price of selected District</h2>
            <canvas  id="chartjs_bar"></canvas> 
        </div>    
		<div>
		<table border ="1" cellspacing="0" cellpadding="20">
			<tr>
				<th>Property Type</th>
				<th>Street</th>
				<th>Storey Range</th>
				<th>Floor Area</th>
				<th>Lease Commencement Date</th>
				<th>Price</th>
			</tr>
		</div>
    </body>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($Town); ?>,
                        datasets: [{
                            data:<?php echo json_encode($Price); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: false,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>
</html>


<?php	
		$rows_resale = array();
		//print_r($query);
		//$resultarray = mysqli_query($conn,$sql_resale);
		$resultarray_resale=mysqli_prepare($conn,$sql_resale);
		mysqli_stmt_execute($resultarray_resale);		//execute the statement
		mysqli_stmt_bind_result($resultarray_resale,$flattype,$street,$storey,$floor,$lease,$resaleprice);
		while(mysqli_stmt_fetch($resultarray_resale))			//it fetch one by one, this one to load column name of database
		{ 
			echo "<td>" . $flattype . "</td>";
			echo "<td>" . $street . "</td>";
			echo "<td>" . $storey . "</td>";
			echo "<td>" . $floor . "</td>";
			echo "<td>" . $lease . "</td>";
			echo "<td>" . $resaleprice . "</td><tr>";
		}

		$rows_private = array();
		//print_r($query);
		//$resultarray = mysqli_query($conn,$sql);
		$resultarray_private=mysqli_prepare($conn_old_property,$sql_private);
		mysqli_stmt_execute($resultarray_private);			//execute the statement
		mysqli_stmt_bind_result($resultarray_private,$propertytype,$street,$floorange,$area,$contractdate,$price);
		while(mysqli_stmt_fetch($resultarray_private))		//it fetch one by one, this one to load column name of database
		{ 
			echo "<td>" . $propertytype . "</td>";
			echo "<td>" . $street . "</td>";		
			echo "<td>" . $floorange. "</td>";
			echo "<td>" . $area. "</td>";
			echo "<td>" . $contractdate . "</td>";
			echo "<td>" . $price . "</td><tr>";
		}	
}else {
         $error = "No data found";
         echo "<script type='text/javascript'>alert('$error');</script>";
      }
$result_resale = $conn->query($sql_resale);
$result_private = $conn_old_property->query($sql_private);

?>






