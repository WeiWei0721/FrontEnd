
<?php
   include("config.php");
   session_start();
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
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Property Details</b></div>
				
            <div style = "margin:30px">
               
               <label>Registration No :<br></label><input type = "text" name = "RegistrationNo" class = "box" value = <?php echo $_SESSION['registration_no']; ?> /><br /><br />
               <label>Property ID :<br></label><input type = "text" name = "ProjectID" class = "box" value = <?php echo $_SESSION['property_id']; ?> /><br /><br />
               <label>Project Name  :<br></label><input type = "text" name = "ProjectName" class = "box"  value = <?php echo $_SESSION['project_name']; ?> /><br/><br />
               <label>Block  :<br></label><input type = "text" name = "Block" class = "box" value = <?php echo $_SESSION['block']; ?> /><br/><br />
               <label>Street Name  :<br></label><input type = "text" name = "StreetName" class = "box" value = <?php echo $_SESSION['street_name']; ?> /><br/><br />
               <label>Flat Type  :<br></label><input type = "text" name = "FlatType" class = "box" value = <?php echo $_SESSION['flat_type']; ?> /><br/><br />
               <label>Postal District  :<br></label><input type = "text" name = "Postal" class = "box" value = <?php echo $_SESSION['postal_district']; ?> /><br/><br />
               <label>Market Segment :<br></label><input type = "text" name = "MarketSegment" class = "box" value = <?php echo $_SESSION['market_segment']; ?> /><br /><br />
               <label>Tenure  :<br></label><input type = "text" name = "Tenure" class = "box" value = <?php echo $_SESSION['tenure']; ?> /><br/><br />
               <label>Typed Sale :<br></label><input type = "text" name = "TypedSale" class = "box" value = <?php echo $_SESSION['typed_sale']; ?> /><br/><br />
               <label>Lease Commence Year  :<br></label><input type = "text" name = "LeaseCommenceDate" class = "box" value = <?php echo $_SESSION['lease_commence_year']; ?> /><br/><br />
               <label>Remaining Lease :<br></label><input type = "text" name = "RemainingLease" class = "box" value = <?php echo $_SESSION['remaining_lease']; ?> /><br /><br />
               <label>No of Units  :<br></label><input type = "text" name = "NoOfUnits" class = "box" value = <?php echo $_SESSION['no_of_unit']; ?> /><br/><br />
               <label>Price  :<br></label><input type = "text" name = "Price" class = "box" value = <?php echo $_SESSION['price']; ?> /><br/><br />
               <label>Floor Area  :<br></label><input type = "text" name = "FloorArea" class = "box" value = <?php echo $_SESSION['floor_area']; ?> /><br/><br />
               <label>Typed Area  :<br></label><input type = "text" name = "TypedArea" class = "box" value = <?php echo $_SESSION['typed_area']; ?> /><br/><br />
               <label>Floor Level  :<br></label><input type = "text" name = "FloorLevel" class = "box" value = <?php echo $_SESSION['floor_level']; ?> /><br/><br />
               <label>Unit Price  :<br></label><input type = "text" name = "UnitPrice" class = "box" value = <?php echo $_SESSION['unit_price']; ?> /><br/><br />
               <label>Date of Sale  :<br></label><input type = "text" name = "DateOfSale" class = "box" value = <?php echo $_SESSION['date_of_sale']; ?> /><br/><br />
   
			</form>      
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>