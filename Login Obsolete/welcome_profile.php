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
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
   <?php echo $_SESSION['msg']; ?> 
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Name :<br></label><input type = "text" name = "username" class = "box" value = <?php echo $_SESSION['login_name']; ?> /><br /><br />
                  <label>Email :<br></label><input type = "text" name = "email" class = "box" value = <?php echo $_SESSION['login_email']; ?> /><br /><br />
                  <label>Gender :<br></label><input type = "text" name = "gender" class = "box" value = <?php echo $_SESSION['login_gender']; ?> /><br /><br />
                  <label>Contact Number :<br></label><input type = "text" name = "contact" class = "box" value = <?php echo $_SESSION['login_contact']; ?> /><br /><br />
                  <label>ID :<br></label><input type = "text" name = "id" class = "box" value = <?php echo $_SESSION['login_user']; ?> /><br /><br />

                <strong>User Type:</strong><br>
				<input type='text' name='user_type' value=<?php echo $_SESSION['login_usertype']; ?> class = "box"/>        
			</form>      
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>