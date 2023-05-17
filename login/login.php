<!DOCTYPE html>
<?php
  
   
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
         
        // header("location: welcome_profile_agent.php");
        header("location: ../mainlogin.php");
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
      .loginPopup {
        /* box-sizing: border-box; */
        /* position: relative; */
        text-align: center;
        width: 100%;
        overflow: auto;
        /* left:40%; */
      }
      .formPopup {
        /* display: none; */
        text-align: left;
        /* transform: translate(25%); */
        border: 3px solid #999999;
        z-index: 9;
      }

      .formtext {
        background-color: #333333;
        margin: 0px;
        color: white;
      }

      .formContainer {
        max-width: 300px;
        padding: 20px;
        background-color: #fff;
      }
      .formContainer input[type=text],
      .formContainer input[type=password] {
        width: 90%;
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

    </style>
  </head>
  <body>
<br>
<br>
<br>

    <div class="loginPopup">
      <div class="formPopup" id="popupForm" >
          <h2 class = "formtext">Sign In Details</h2>
	        <form action = "" method = "post" class="formContainer">
            <label for="email">
              <strong>Username</strong>
            </label>
            <input class="forminput"type="text" id="username" placeholder="Your Email" name="username" required>
            <label for="psw">
              <strong>Password</strong>
            </label>
            <input class="forminput" type="password" id="password" placeholder="Your Password" name="password" required>
            <strong>User Type:</strong><br>
            <input type='radio' name='user_type' value='Agent' checked/>Agent <br>
            <input type='radio' name='user_type' value='User'/>User <br><br/>
            <button type="submit" class="btn">Log in</button>
            <!-- <button type="button" class="btn cancel" onclick="closeForm()">Close</button> -->
            <a href="sign_up_user.php" style="color : black" class="fa fa-user-plus" aria-hidden="true" ><b> Create New User Account?</b></a><br /><br/>
            <a href="sign_up_agent.php" style="color : black" class="fa fa-user-plus" aria-hidden="true" ><b> Create New Agent Account?</b></a><br /><br/>
            <a href="reset_pass.php" style="color : black" class="fa fa-user-plus" aria-hidden="true" ><b> Forgot Password?</b></a>
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(!empty($error)) {echo $error;} ?></div>
        </form>
      </div>
    </div>
  </body>

</html>