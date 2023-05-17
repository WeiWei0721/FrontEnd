<!DOCTYPE html>
<?php 
  include("./login/config.php");
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

      header("location: ./login/welcome_profile_user.php");
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
       
      header("location: ./login/welcome_profile_agent.php");
      // header("location: ../mainlogin.php");
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainlog.css">
    <title>Agent Page v3.0</title>
</head>
<body>
    <header>
        <div class="homelogo">
          <a href="">Our Property Pictures</a>
        </div>
        <nav class="headerbar">
          <a href="">Home</a>
          <a href="">About</a>
          <div class="dropdown">
            <?php 
              if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['login_email'])){
                echo "
                <button class='dropbtn'>".$_SESSION['login_name']."</button>
                <div class='dropdown-content'>
                  <a href='./login/welcome_profile_".$_SESSION['login_usertype'].".php'>My Profile</a>
                  <a href='./login/logout.php'>Logout</a>
                  </div>
                ";
              } else {
                echo "<button class='dropbtn' onclick='openEdit()'>Login/Sign-up</button>";
              }
            ?>
          </div>
        </nav>
    </header>

    <main>
      <div id="editList" class="form-popup">
        <button onclick="closeEdit()" class="spu-close-popup">X</button>
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
                <button type="submit" class="btn" onclick="closeForm()">Log in</button>
                <!-- <button type="button" class="btn cancel" onclick="closeForm()">Close</button> -->
                <a href="./login/sign_up_user.php" style="color : black" class="fa fa-user-plus" aria-hidden="true" ><b> Create New User Account?</b></a><br /><br/>
                <a href="./login/sign_up_agent.php" style="color : black" class="fa fa-user-plus" aria-hidden="true" ><b> Create New Agent Account?</b></a><br /><br/>
                <a href="./login/reset_pass.php" style="color : black" class="fa fa-user-plus" aria-hidden="true" ><b> Forgot Password?</b></a>
                <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(!empty($error)) {echo $error;} ?></div>
            </form>
          </div>
        </div>
      </div>

      <script>
        function openEdit() {
          document.getElementById("editList").style.display = "block";
        }

        function closeEdit() {
          document.getElementById("editList").style.display = "none";
          document.location.reload();
        }

        document.getElementById("defaultOpenForm").click();
      </script>

      <div class ="mapstyle">
        <iframe src="./map/map.php" width="100%" height="700px"></iframe>
      </div>
      
    </main>
    
    
    <footer>
        <p>&copy; TIC4902</p>
    </footer>
</body>
</html>