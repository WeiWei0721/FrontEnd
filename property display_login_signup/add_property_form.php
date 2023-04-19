<?php
   include("config.php"); 
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $projectID = mysqli_real_escape_string($link, $_REQUEST['ProjectID']);
      $projectName = mysqli_real_escape_string($link, $_REQUEST['ProjectName']);
      $registrationNo = mysqli_real_escape_string($link, $_REQUEST['RegistrationNo']);
	$block = mysqli_real_escape_string($link,  $_REQUEST['Block']);	
	$streetname = mysqli_real_escape_string($link,  $_REQUEST['StreetName']);
	$flattype = mysqli_real_escape_string($link,  $_REQUEST['FlatType']);	
	$postaldistrict = mysqli_real_escape_string($link,  $_REQUEST['Postal']);
	$marketsegment = mysqli_real_escape_string($link,  $_REQUEST['MarketSegment']);
	$tenure = mysqli_real_escape_string($link, $_REQUEST['Tenure']);
	$typedsale = mysqli_real_escape_string($link,  $_REQUEST['TypedSale']);
	$leasecommencedate = mysqli_real_escape_string($link,  $_REQUEST['LeaseCommenceDate']);	
	$remaininglease = mysqli_real_escape_string($link,  $_REQUEST['RemainingLease']);
	$units = mysqli_real_escape_string($link,  $_REQUEST['NoOfUnits']);
	$price = mysqli_real_escape_string($link, $_REQUEST['Price']);
	$floorarea = mysqli_real_escape_string($link,  $_REQUEST['FloorArea']);
	$typedarea = mysqli_real_escape_string($link,  $_REQUEST['TypedArea']);
	$floorlevel = mysqli_real_escape_string($link,  $_REQUEST['FloorLevel']);
	$unitprice = mysqli_real_escape_string($link,  $_REQUEST['UnitPrice']);
	$dateofsale = mysqli_real_escape_string($link,  $_REQUEST['DateOfSale']);

      $sql = "INSERT INTO properties (AgentRegistrationNo, PropertyID, ProjectName, Block, StreetName, FlatType, PostalDistrict, MarketSegment, Tenure, TypedSale, LeaseCommenceDate, RemainingLease, NoofUnits, Price, FloorArea, TypedArea, FloorLevel, UnitPrice, DateofSale) VALUES ( '$registrationNo', '$projectID', '$projectName', '$block', '$streetname', '$flattype', '$postaldistrict', '$marketsegment', '$tenure', '$typedsale' , '$leasecommencedate',  '$remaininglease',  '$units',  '$price', '$floorarea',  '$typedarea', '$floorlevel', '$unitprice', '$dateofsale')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

    $registrationNo = mysqli_real_escape_string($link, $_POST['RegistrationNo']);
    $propertyID = mysqli_real_escape_string($link, $_POST['ProjectID']);
    $sql = "SELECT * FROM properties WHERE AgentRegistrationNo = '$registrationNo' and PropertyID = '$propertyID'";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
      
    $count = mysqli_num_rows($result);
		
    if($count == 1) {
    $_SESSION['registration_no'] = $row['AgentRegistrationNo'];
    $_SESSION['property_id'] = $row['PropertyID'];
    $_SESSION['project_name'] = $row['ProjectName'];
    $_SESSION['block'] = $row['Block'];
    $_SESSION['street_name'] = $row['StreetName'];
    $_SESSION['flat_type'] = $row['FlatType'];
    $_SESSION['postal_district'] = $row['PostalDistrict'];
    $_SESSION['market_segment'] = $row['MarketSegment'];
    $_SESSION['tenure'] = $row['Tenure'];
    $_SESSION['typed_sale'] = $row['TypedSale'];
    $_SESSION['lease_commence_year'] = $row['LeaseCommenceDate'];
    $_SESSION['remaining_lease'] = $row['RemainingLease'];
    $_SESSION['no_of_unit'] = $row['NoofUnits'];
    $_SESSION['price'] = $row['Price'];
    $_SESSION['floor_area'] = $row['FloorArea'];
    $_SESSION['typed_area'] = $row['TypedArea'];
    $_SESSION['floor_level'] = $row['FloorLevel'];
    $_SESSION['unit_price'] = $row['UnitPrice'];
    $_SESSION['date_of_sale'] = $row['DateOfSale'];
    header("location: display_property_form.php");
}else {
         $error = "Database error";
         echo "<script type='text/javascript'>alert('$error');</script>";
      }
}

?>

<html>
   
   <head>
      <title>Add Property</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
	   /* Style the tab */
	   .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
 		width: 400px;
         }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
         }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
         }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
         }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
 		width: 375px;
         }

  	  .tabcontent.active { 
		display: block; 
	   }
        .tablinks.active { 
		cursor: not-allowed; 
 	   }
      </style>
      
   </head>
  <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')">Property Details</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">VR Video Upload (Optional)</button>
  </div>

  <div id="London" class="tabcontent active">
  
   <body bgcolor = "#FFFFFF">
   <?php echo $_SESSION['msg']; ?> 
	
      <div align = "center">
         <div style = "width:370px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Add Property</b></div>
				
            <div style = "margin:30px">
	  <h3>Welcome
         
         <strong> <?php echo $_SESSION['login_name']; ?>
 </strong>
       </h3>
               
               <form action = "" method = "post">
                  <label>Registration No :<br></label><input type = "text" name = "RegistrationNo" class = "box" value = <?php echo $_SESSION['login_user']; ?> /><br /><br />
                  <label>Property ID :<br></label><input type = "text" name = "ProjectID" class = "box"/><br /><br />
                  <label>Project Name  :<br></label><input type = "text" name = "ProjectName" class = "box" /><br/><br />
                  <label>Block  :<br></label><input type = "text" name = "Block" class = "box" /><br/><br />
                  <label>Street Name  :<br></label><input type = "text" name = "StreetName" class = "box" /><br/><br />
                  <label>Flat Type  :<br></label><input type = "text" name = "FlatType" class = "box" /><br/><br />
                  <label>Postal District  :<br></label><input type = "text" name = "Postal" class = "box" /><br/><br />
                  <label>Market Segment :<br></label><input type = "text" name = "MarketSegment" class = "box"/><br /><br />
                  <label>Tenure  :<br></label><input type = "text" name = "Tenure" class = "box" /><br/><br />
                  <label>Typed Sale :<br></label><input type = "text" name = "TypedSale" class = "box" /><br/><br />
                  <label>Lease Commence Year  :<br></label><input type = "text" name = "LeaseCommenceDate" class = "box" /><br/><br />
                  <label>Remaining Lease :<br></label><input type = "text" name = "RemainingLease" class = "box"/><br /><br />
                  <label>No of Units  :<br></label><input type = "text" name = "NoOfUnits" class = "box" /><br/><br />
                  <label>Price  :<br></label><input type = "text" name = "Price" class = "box" /><br/><br />
                  <label>Floor Area  :<br></label><input type = "text" name = "FloorArea" class = "box" /><br/><br />
                  <label>Typed Area  :<br></label><input type = "text" name = "TypedArea" class = "box" /><br/><br />
                  <label>Floor Level  :<br></label><input type = "text" name = "FloorLevel" class = "box" /><br/><br />
                  <label>Unit Price  :<br></label><input type = "text" name = "UnitPrice" class = "box" /><br/><br />
                  <label>Date of Sale  :<br></label><input type = "text" name = "DateOfSale" class = "box" /><br/><br />
                  <input type = "submit" value = " Add Property "/><br /><br/>         

			</form>      
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

     </div>


  <div id="Paris" class="tabcontent">
  
   <body bgcolor = "#FFFFFF">
   <?php echo $_SESSION['msg']; ?> 
	
      <div align = "center">
         <div style = "width:370px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Add Video</b></div>
				
            <div style = "margin:30px">
	  <h3>Welcome
         
         <strong> <?php echo $_SESSION['login_name']; ?>
 </strong>
       </h3>
               
               <form action = "" method = "post">
			<label>Registration No :<br></label><input type = "text" name = "RegistrationNo" class = "box" value = <?php echo $_SESSION['login_user']; ?> /><br /><br />
                  <label>Current Video :<br></label><input type = "text" name = "CurrentVideo" class = "box" /><br /><br />
                  <label>Video Preview :<br></label><input type = "text" name = "VideoPreview" class = "box"/><br /><br />
                  <label>Video Title :<br></label><input type = "text" name = "VideoTitle" class = "box" /><br/><br />
                  <label>Video Description  :<br></label><input type = "text" name = "VideoDescription" class = "box" /><br/><br />
                  <label>Tags  :<br></label><input type = "text" name = "Tags" class = "box" /><br/><br />
			<label for="cars">Privacy:</label><br/>
			<select name="Privacy" id="Privacy">
 			 <option value="public">Public</option>
 			 <option value="private">Private</option>
 			 <option value="unlisted">Unlisted</option>
			<br/><br />
			</select>
			<br><br><br><br>
                  <input type = "submit" value = " Upload "/><br /><br/>         

			</form>      
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

     </div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].classList.remove("active");
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].classList.remove("active");
  }
  evt.currentTarget.classList.add("active");
  document.getElementById(cityName).classList.add("active");
}
</script>

   </body>
</html>