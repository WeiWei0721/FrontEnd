<?php
   include("config.php");
   session_start();

   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($link,$_POST['username']);
      $mypassword = mysqli_real_escape_string($link,$_POST['password']); 
	 $usertype = mysqli_real_escape_string($link, $_POST['user_type']);

    if($usertype=='User')
    {
      $sql = "SELECT * FROM user WHERE UserName = '$myusername' and UserPassword = '$mypassword'";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_contact'] = $row['ContactNumber'];
         $_SESSION['login_user'] = $row['UserID'];
         $_SESSION['login_gender'] = $row['Gender'];
         $_SESSION['login_email'] = $row['Email'];
         $_SESSION['login_name'] = $myusername;
	    $_SESSION['login_password'] = $mypassword;
	    $_SESSION['login_usertype'] = $usertype;


         header("location: welcome_profile.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
    }
    else if($usertype=='Agent')
    {
      $sql = "SELECT * FROM agent WHERE Name = '$myusername' and AgentPassword = '$mypassword'";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $row['RegistrationNo'];
         $_SESSION['login_contact'] = $row['ContactNumber'];
         $_SESSION['login_gender'] = $row['Gender'];
         $_SESSION['login_email'] = $row['Email'];
         $_SESSION['login_name'] = $myusername;
	    $_SESSION['login_password'] = $mypassword;
	    $_SESSION['login_usertype'] = $usertype;
         
         header("location: welcome_profile.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
    }
    else
    {
      $error = "Your Login Name or Password is invalid";
    }

   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
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
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
   <?php echo $_SESSION['msg']; ?> 
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Name :<br></label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />

                <strong>User Type:</strong><br>
				<input type='radio' name='user_type' value='Agent' checked/>Agent <br>
                <input type='radio' name='user_type' value='User'/>User <br><br/>
                  <input type = "submit" value = " Submit "/><br /><br/>         
            <a href="sign_up.html" style="color : black" class="fa fa-user-plus" aria-hidden="true" ><b> Create New User Account?</b></a><br /><br/>
            <a href="reset_pass.php" style="color : black" class="fa fa-user-plus" aria-hidden="true" ><b> Forgot Password?</b></a>
			</form>      
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>