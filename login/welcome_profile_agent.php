<?php
   include("config.php");
   session_start();

// to delete pictures
	
if(isset($_GET['deleteid']))
{
	$querySelect = "select * from properties where propertyid = ".$_GET['deleteid']. " and AgentRegistrationNo= '". $_SESSION['login_user']."';";
	$ResultSelectStmt = mysqli_query($link,$querySelect);

	if (!$ResultSelectStmt) {
		echo "Query execution failed: " . mysqli_error($db);
	}  else {

      $fetchRecords = mysqli_fetch_array($ResultSelectStmt,MYSQLI_BOTH);
	
      $querySelect = "delete from properties where propertyid = ".$_GET['deleteid']. " and AgentRegistrationNo= '". $_SESSION['login_user']."';";
      $delete = mysqli_query($link,$querySelect);
   }

	
} elseif (isset($_GET['viewid'])) {
   $_SESSION['propertyid'] = $_GET['viewid'];
   header("location: ../PHPHomepage/maindraft%20v3.0.php");
}
?>
<html>
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../mainlog.css">
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
            width: 90%;
            height: 20px;
         }
	   .btn {
        	padding: 12px 20px;
        	border: none;
        	background-color: #008000;
        	color: #fff;
        	cursor: pointer;
        	width: 25%;
         margin-left: 20px;
        	margin-bottom: 15px;
        	opacity: 0.8;
         text-align: center;
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
      <header>
         <div class="homelogo">
            <a href="">Our Property Pictures</a>
         </div>
         <nav class="headerbar">
            <a href="../homepage.php">Home</a>
            <a href="">About</a>
            <div class="dropdown">
               <?php 
               if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['login_email'])){
                  echo "
                  <button class='dropbtn'>".$_SESSION['login_name']."</button>
                  <div class='dropdown-content'>
                     <a href='./welcome_profile_".$_SESSION['login_usertype'].".php'>My Profile</a>
                     <a href='./logout.php'>Logout</a>
                  </div>
                  ";
               } else {
                  echo "No User Found";
               }
               ?>
            </div>
         </nav>
      </header>
   <?php //echo $_SESSION['msg']; ?> 
   <!-- no session[msg] found in login.php -->

   <div class="listinginfo">

      <div class="detailsbox">
         <div style="width: 95%;">
            <span class="headername">
               <h4>Your Particulars: <?php echo $_SESSION['login_usertype']; ?></h4>
            </span>
            
            <table class="proptb">
               <tr class="listbox">
                  <td class="listdets">
                     <span class="headerdets">
                        <label class="listheader">Name<br></label>
                        <input type = "text" name = "username" class = "box" value = <?php echo $_SESSION['login_name']; ?> />
                     </span>
                  </td>
                  <td class="listdets">
                     <span class="headerdets">
                        <label class="listheader">Email<br></label>
                        <input type = "text" name = "email" class = "box" value = <?php echo $_SESSION['login_email']; ?> />
                     </span>
                  </td>
               </tr>

               <tr class="listbox">
                  <td class="listdets">
                     <span class="headerdets">
                        <label class="listheader">Gender<br></label>
                        <input type = "text" name = "gender" class = "box" value = <?php echo $_SESSION['login_gender']; ?> />
                     </span>
                  </td>
                  <td class="listdets">
                     <span class="headerdets">
                        <label class="listheader">Contact Number<br></label>
                        <input type = "text" name = "contact" class = "box" value = <?php echo $_SESSION['login_contact']; ?> />
                     </span>
                  </td>
               </tr>

               <tr class="listbox">
                  <td class="listdets">
                     <span class="headerdets">
                        <label class="listheader">ID<br></label>
                        <input type = "text" name = "id" class = "box" value = <?php echo $_SESSION['login_user']; ?> />
                     </span>
                  </td>
                  <td class="listdets">
                     <span class="headerdets">
                        <label class="listheader">Registration Start Date<br></label>
                        <input type = "text" name = "id" class = "box" value = <?php echo $_SESSION['login_regstart']; ?> />
                     </span>
                  </td>
               </tr>

               <tr class="listbox">
                  <td class="listdets">
                     <span class="headerdets">
                        <label class="listheader">Registration End Date<br></label>
                        <input type = "text" name = "id" class = "box" value = <?php echo $_SESSION['login_regend']; ?> />
                     </span>
                  </td>
                  <td class="listdets">
                     <span class="headerdets">
                        <label class="listheader">Estate Agent Name<br></label>
                        <input type = "text" name = "id" class = "box" value = <?php echo $_SESSION['login_estateagentname']; ?> />
                     </span>
                  </td>
               </tr>

               <tr class="listbox">
                  <td class="listdets">
                     <span class="headerdets">
                        <label class="listheader">Estate Agent License No<br></label>
                        <input type = "text" name = "id" class = "box" value = <?php echo $_SESSION['login_estateagentlicense']; ?> />
                     </span>
                  </td>
               </tr>
            </table>

            <input type="button" class = "btn" onclick="window.location.href='update_profile_agent.php';" value ="Update Profile"/>
         </div>
      </div>

      <div class="picbox">
         <div style="width: 95%;">
            <span class="headername">
               <h4 >Profile Picture</h4>
            </span>
            <img src="./agent_image/<?php echo $_SESSION['login_profilepic']; ?>" width="300px" height="auto">
         </div>
      </div>

   </div>

   <div class="listinginfo">
      <div class="listingsbox">
         <div class="headerfield">
            <span class="headername" style="width: 25%;" >
               Your Property Listings
            </span>
            <input type="button" class = "btn" onclick="window.location.href='add_property_form.php';" value ="Add Property" style="float: right;">
            <table class="proptb2">
               <tr class="listbox2">
                  <th>
                     PropertyID
                  </th>
                  <th>
                     PostalDistrict
                  </th>
                  <th>
                     StreetName
                  </th>
                  <th>
                     UnitPrice	
                  </th>
                  <th>
                     Edit/Delete	
                  </th>
               </tr>

               <?php
                  if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['login_user'])){
                     $sql = "SELECT propertyid, PostalDistrict, StreetName, UnitPrice FROM properties WHERE AgentRegistrationNo= '". $_SESSION['login_user']."';";
                     $result = mysqli_query($link,$sql);
                     if ($result){
                        while ($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
                           ?>

                           <tr class="listbox2">
                              <td><?php echo $row[0]; ?></td>
                              <td><?php echo $row[1]; ?></td>
                              <td><?php echo $row[2]; ?></td>
                              <td><?php echo $row[3]; ?></td>
                              <td>
                                 <a href="?viewid=<?php echo $row['propertyid']?>" class="viewbtn">View</a>
                                 <a href="?deleteid=<?php echo $row['propertyid']?>" class="deletebtn">Delete</a>
                              </td>
                           </tr>

                           <?php
                        };
                     } else {
                        echo mysqli_error($link);
                        echo "No Records to display";
                     }
                  }
               ?>
            </table>
         </div>

      </div>


   </div>


   <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(!empty($error)) {echo $error;} ?></div>
   </body>

   <footer>
        <p>&copy; TIC4902</p>
   </footer>
</html>