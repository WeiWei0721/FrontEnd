<?php
   include("config.php");
   session_start();


   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $id=$_SESSION['id'];
      $myusername = $_POST['username']; 
      $contactnumber = $_POST['contact'];
      $email = $_POST['email'];
      $gender = $_POST['gender'];
      $usertype = $_POST['user_type'];
      $registrationstart = $_POST['regstart'];
      $registrationend = $_POST['regend'];
      $estateagentname = $_POST['estateagentname'];
      $estateagentlicense = $_POST['estateagentlicense'];

      $sql = "UPDATE agent SET 
                Gender = '$gender', ContactNumber = '$contactnumber', Email = '$email', RegistrationStartDate = '$registrationstart', RegistrationEndDate = '$registrationend', EstateAgentNAme = '$estateagentname', EstateAgentLicenseNo = '$estateagentlicense'
                WHERE Name = '$myusername'";
      $result = mysqli_query($link,$sql);
      
      // If result matched $myusername and $mypassword, table row must be 1 row	
      if($result) {
         header("location: ./welcome_profile_agent.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         header("location: ./welcome_profile_agent.php");
      }
   }     
    else
    {
      $error = "Your information is invalid";
    } 
  
?>
<html>
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
	   .display-image{
            width: 100%;
            justify-content: center;
            padding: 5px;
            margin: 15px;
         }
      </style>
      
   </head>

   <body bgcolor = "#FFFFFF">
   <?php echo $_SESSION['msg']; ?> 

   <?php
      if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['login_user'])){
      $sql = "SELECT * FROM agent WHERE RegistrationNo = '". $_SESSION['login_user']. "';";
      $result = mysqli_query($link,$sql);
      if ($result){ 
         echo "Success";
         $row = mysqli_fetch_array($result,MYSQLI_BOTH);}}
   ?>
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Profile Update</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">

		    <div id="display-image">
                  <img src="./agent_image/<?php echo $_SESSION['login_profilepic']; ?>" width="200" height="200"></div><br /> <br />
                  <label>Name :<br></label><input type = "text" name = "username" class = "box" value = <?php echo $row['Name']; ?> /><br /><br />
                  <label>Email :<br></label><input type = "text" name = "email" class = "box" value = <?php echo $row['Email']; ?> /><br /><br />
                  <label>Gender :<br></label><input type = "text" name = "gender" class = "box" value = <?php echo $row['Gender']; ?> /><br /><br />
                  <label>Contact Number :<br></label><input type = "text" name = "contact" class = "box" value = <?php echo $row['ContactNumber']; ?> /><br /><br />
                  <label>ID :<br></label><input type = "text" name = "id" class = "box" value = <?php echo $row['RegistrationNo']; ?> /><br /><br />
                  <label>Registration Start Date :<br></label><input type = "text" name = "regstart" class = "box" value = <?php echo $row['RegistrationStartDate']; ?> /><br /><br />
                  <label>Registration End Date :<br></label><input type = "text" name = "regend" class = "box" value = <?php echo $row['RegistrationEndDate']; ?> /><br /><br />
                  <label>Estate Agent Name :<br></label><input type = "text" name = "estateagentname" class = "box" value = <?php echo $row['EstateAgentName']; ?> /><br /><br />
                  <label>Estate Agent License No :<br></label><input type = "text" name = "estateagentlicense" class = "box" value = <?php echo $row['EstateAgentLicenseNo']; ?> /><br /><br />

         <button type="submit" name="Submit" class = "btn">Update Profile</button>
         <button><a href="./welcome_profile_agent.php" style="text-decoration: none;">Back</a></button> 


   
			</form>      
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
   

					
          