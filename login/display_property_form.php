
<?php
   include("config.php");
   session_start();
      
   if($_SERVER["REQUEST_METHOD"] == "POST") {
         echo "Testing";
         $id=$_SESSION['id'];
         $projectname = $_POST['ProjectName']; 
         $block = $_POST['Block'];
         $street_name = $_POST['StreetName'];
         $flat_type = $_POST['FlatType'];
         $postal = $_POST['Postal'];
         $market = $_POST['MarketSegment'];
         $tenure = $_POST['Tenure'];
         $type_sale = $_POST['TypedSale'];
         $lease_year = $_POST['LeaseCommenceDate'];
         $remain_lease = $_POST['RemainingLease'];
         $unit_no = $_POST['NoOfUnits'];
         $price = $_POST['Price'];
         $floor_area = $_POST['FloorArea'];
         $typed_area = $_POST['TypedArea'];
         $floor_level = $_POST['FloorLevel'];
         $unit_price = $_POST['UnitPrice'];
         $date_of_sale = $_POST['DateOfSale'];


   
         $sql = "UPDATE properties SET 
                   ProjectName = '$projectname', Block = '$block', StreetName = '$street_name', 
                   FlatType = '$flat_type', PostalDistrict = '$postal', MarketSegment = '$market', 
                   Tenure = '$tenure', TypeofSale = '$type_sale ', 	LeaseCommenceDate = '$lease_year', 
                   RemainingLease = '$remain_lease', NoofUnits= '$unit_no', Price = '$price', 
                   FloorArea = '$floor_area', TypeofArea = '$typed_area', FloorLevel = '$floor_level', 
                   UnitPrice = '$unit_price', DateofSale = '$date_of_sale'
                   WHERE PropertyID = '" .$_SESSION['propertyid']. "';" ;
         $result = mysqli_query($link,$sql);
         
         // If result matched $myusername and $mypassword, table row must be 1 row	
         if($result) {
            header("location: ../PHPHomepage/maindraft%20v3.0.php");
         }else {
            $error = "Fail to Update";
            echo $error;
            header("location: ../PHPHomepage/maindraft%20v3.0.php");
         }
      } else {
         $error = "Your information is invalid";
      } 

?>
<html>
   <head>
      <title>Profile Page</title>
      
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
	   .btn {
        	padding: 12px 20px;
        	border: none;
        	background-color: #008000;
        	color: #fff;
        	cursor: pointer;
        	width: 100%;
        	margin-bottom: 15px;
        	opacity: 0.8;
		text-align: left;
      	}
         .add {
		padding: 12px 20px;
        	border: none;
        	background-color:#000080;
        	color: #fff;
        	cursor: pointer;
        	width: 100%;
        	margin-bottom: 15px;
        	opacity: 0.8;
            text-align: left;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
   <?php echo $_SESSION['msg']; ?> 

   <?php
      if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['login_user'])){
      $sql = "SELECT * FROM properties WHERE propertyid = ". $_SESSION['propertyid']. " and AgentRegistrationNo= '". $_SESSION['login_user']."';";
      $result = mysqli_query($link,$sql);
      if ($result){ 
         $row = mysqli_fetch_array($result,MYSQLI_BOTH);
         }
      }

   ?>
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Property Details</b></div>
				
            <div style = "margin:30px">

            <form action = "" method = "post">
               
               <label>Registration No :<br></label><input type = "text" name = "RegistrationNo" class = "box" value = <?php echo $_SESSION['login_user']; ?> readonly/><br /><br />
               <label>Property ID :<br></label><input type = "text" name = "ProjectID" class = "box" value = <?php echo $row['PropertyID']; ?> readonly/><br /><br />
               <label>Project Name  :<br></label><input type = "text" name = "ProjectName" class = "box"  value = <?php echo $row['ProjectName']; ?> /><br/><br />
               <label>Block  :<br></label><input type = "text" name = "Block" class = "box" value = <?php echo $row['Block']; ?> /><br/><br />
               <label>Street Name  :<br></label><input type = "text" name = "StreetName" class = "box" value = <?php echo $row['StreetName']; ?> /><br/><br />
               <label>Flat Type  :<br></label><input type = "text" name = "FlatType" class = "box" value = <?php echo $row['FlatType']; ?> /><br/><br />
               <label>Postal District  :<br></label><input type = "text" name = "Postal" class = "box" value = <?php echo $row['PostalDistrict']; ?> /><br/><br />
               <label>Market Segment :<br></label><input type = "text" name = "MarketSegment" class = "box" value = <?php echo $row['MarketSegment']; ?> /><br /><br />
               <label>Tenure  :<br></label><input type = "text" name = "Tenure" class = "box" value = <?php echo $row['Tenure']; ?> /><br/><br />
               <label>Typed Sale :<br></label><input type = "text" name = "TypedSale" class = "box" value = <?php echo $row['TypeofSale']; ?> /><br/><br />
               <label>Lease Commence Year  :<br></label><input type = "text" name = "LeaseCommenceDate" class = "box" value = <?php echo $row['LeaseCommenceDate']; ?> /><br/><br />
               <label>Remaining Lease :<br></label><input type = "text" name = "RemainingLease" class = "box" value = <?php echo $row['RemainingLease']; ?> /><br /><br />
               <label>No of Units  :<br></label><input type = "text" name = "NoOfUnits" class = "box" value = <?php echo $row['NoofUnits']; ?> /><br/><br />
               <label>Price  :<br></label><input type = "text" name = "Price" class = "box" value = <?php echo $row['Price']; ?> /><br/><br />
               <label>Floor Area  :<br></label><input type = "text" name = "FloorArea" class = "box" value = <?php echo $row['FloorArea']; ?> /><br/><br />
               <label>Typed Area  :<br></label><input type = "text" name = "TypedArea" class = "box" value = <?php echo $row['TypeofArea']; ?> /><br/><br />
               <label>Floor Level  :<br></label><input type = "text" name = "FloorLevel" class = "box" value = <?php echo $row['FloorLevel']; ?> /><br/><br />
               <label>Unit Price  :<br></label><input type = "text" name = "UnitPrice" class = "box" value = <?php echo $row['UnitPrice']; ?> /><br/><br />
               <label>Date of Sale  :<br></label><input type = "text" name = "DateOfSale" class = "box" value = <?php echo $row['DateofSale']; ?> /><br/><br />
   
               <button type="submit" name="Submit" class = "btn">Update Property Details</button>
               <button><a href="./welcome_profile_agent.php" style="text-decoration: none;">Back</a></button> 
			</form>      
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

                  
            </div>
				
         </div>
			
      </div>

   <?php

   ?>
   

   <?php $link->close()?>

   </body>
</html>