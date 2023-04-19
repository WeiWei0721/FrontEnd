<!DOCTYPE html>
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
         $_SESSION['login_profilepic'] = $row['FileName'];

         header("location: welcome_profile_user.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         echo "<script type='text/javascript'>alert('$error');</script>";
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
	   $_SESSION['login_regstart'] = $row['RegistrationStartDate'];
	   $_SESSION['login_regend'] = $row['RegistrationEndDate'];
	   $_SESSION['login_estateagentname'] = $row['EstateAgentName'];
	   $_SESSION['login_estateagentlicense'] = $row['EstateAgentLicenseNo'];
         $_SESSION['login_profilepic'] = $row['FileName'];
         
         header("location: welcome_profile_agent.php");
      }else {
	   $error = "Your Login Name or Password is invalid";
         echo "<script type='text/javascript'>alert('$error');</script>";
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
    <title>Testing for login</title>
    <style>
      * {
        box-sizing: border-box;
      }
      .openBtn {
        display: flex;
        justify-content: left;
      }
      .openButton {
        border: none;
        border-radius: 5px;
        background-color: #1c87c9;
        color: white;
        padding: 14px 20px;
        cursor: pointer;
        position: fixed;
      }
      .loginPopup {
        position: relative;
        text-align: center;
        width: 100%;
      }
      .formPopup {
        display: none;
        position: fixed;
        text-align: left;
        left: 45%;
        top: 5%;
        transform: translate(-50%, 5%);
        border: 3px solid #999999;
        z-index: 9;
      }
      .formContainer {
        max-width: 300px;
        padding: 20px;
        background-color: #fff;
      }
      .formContainer input[type=text],
      .formContainer input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 20px 0;
        border: none;
        background: #eee;
      }
      .formContainer input[type=text]:focus,
      .formContainer input[type=password]:focus {
        background-color: #ddd;
        outline: none;
      }
      .formContainer .btn {
        padding: 12px 20px;
        border: none;
        background-color: #8ebf42;
        color: #fff;
        cursor: pointer;
        width: 100%;
        margin-bottom: 15px;
        opacity: 0.8;
      }
      .formContainer .cancel {
        background-color: #cc0000;
      }
      .formContainer .btn:hover,
      .openButton:hover {
        opacity: 1;
      }
	.dropbtn {
  	background-color: #04AA6D;
  	color: white;
  	padding: 16px;
  	font-size: 16px;
  	border: none;
	}

	/* The container <div> - needed to position the dropdown content */
	.dropdown {
  	position: relative;
  	display: inline-block;
	}

	/* Dropdown Content (Hidden by Default) */
	.dropdown-content {
 	 display: none;
 	 position: absolute;
  	background-color: #f1f1f1;
  	min-width: 160px;
  	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  	z-index: 1;
	}

	/* Links inside the dropdown */
	.dropdown-content a {
 	 color: black;
 	 padding: 12px 16px;
 	 text-decoration: none;
 	 display: block;
	}

	/* Change color of dropdown links on hover */
	.dropdown-content a:hover {background-color: #ddd;}

	/* Show the dropdown menu on hover */
	.dropdown:hover .dropdown-content {display: block;}

	/* Change the background color of the dropdown button when the dropdown content 	is shown */
	.dropdown:hover .dropbtn {background-color: #3e8e41;}
    	</style>
  </head>
  <body>
<div class="dropdown">
  <button class="dropbtn">User Account</button>
  <div class="dropdown-content">
    <a onclick="openForm()">Login</a>
    <a href="reset_pass.php">Reset Password</a>
    <a href="logout.php">Logout</a>
  </div>
</div>
<br>
<br>
<br>

    <div class="loginPopup">
      <div class="formPopup" id="popupForm" >
          <h2>Sign In Details</h2>
          <label for="email">
            <strong>Username</strong>
          </label>
	    <form action = "" method = "post" class="formContainer">
          <input type="text" id="username" placeholder="Your Email" name="username" required>
          <label for="psw">
    <strong>Password</strong>
          </label>
          <input type="password" id="password" placeholder="Your Password" name="password" required>
	    <strong>User Type:</strong><br>
	      <input type='radio' name='user_type' value='Agent' checked/>Agent <br>
            <input type='radio' name='user_type' value='User'/>User <br><br/>
          <button type="submit" class="btn">Log in</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
	    <a href="sign_up_user.php" style="color : black" class="fa fa-user-plus" aria-hidden="true" ><b> Create New User Account?</b></a><br /><br/>
	    <a href="sign_up_agent.php" style="color : black" class="fa fa-user-plus" aria-hidden="true" ><b> Create New Agent Account?</b></a><br /><br/>
          <a href="reset_pass.php" style="color : black" class="fa fa-user-plus" aria-hidden="true" ><b> Forgot Password?</b></a>
<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
        </form>
      </div>
    </div>
    <script>
      function openForm() {
        document.getElementById("popupForm").style.display = "block";
      }
      function closeForm() {
        document.getElementById("popupForm").style.display = "none";
      }
    </script>
  </body>
</html>