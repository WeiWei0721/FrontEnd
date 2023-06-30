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
          <a href="homepage.php">Our Property Pictures</a>
        </div>
        <nav class="headerbar">
          <a href="homepage.php">Home</a>
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

      <!-- Search Bar -->
      <div class="search-container">
        <form method="get" action="./PHPHomepage/Data Display/listings.php" class="search-bar">
            <input type="text" name="query" placeholder="Search..." onclick="toggleDropdown()" >
              <div id="search-dropdown" class="search-drop">
                  <select name="id">
                      <option value="1">District 1: Boat Quay, Cecil, Havelock Road, Marina, Peoples Park, Raffles Place, Suntec City</option>
                      <option value="2">District 2: Anson, Chinatown, Shenton Way, Tanjong Pagar</option>
                      <option value="3">District 3: Alexandra, Queenstown, Redhill, Tiong Bahru</option>
                      <option value="4">District 4: Harbourfront, Keppel, Sentosa, Telok Blangah</option>
                      <option value="5">District 5: Buona Vista, Clementi, Dover, Hong Leong Garden, Pasir Panjang, West Coast</option>
                      <option value="6">District 6: Beach Road (part), City Hall, High Street, North Bridge Road</option>
                      <option value="7">District 7: Beach Road, Bencoolen Road, Bugis, Golden Mile, Middle Road, Rocher</option>
                      <option value="8">District 8: Farrer Park, Little India, Seranggon Road</option>
                      <option value="9">District 9: Cairnhill, Killiney, Orchard, River Valley</option>
                      <option value="10">District 10: Ardmore, Balmoral, Bukit Timah, Grange Road, Holland Road, Orchard Boulevard, Tanglin</option>
                      <option value="11">District 11: Chancery, Dunearn Road, Moulmein, Newton, Novena, Thomson, Watten Estate</option>
                      <option value="12">District 12: Balestier, Toa Payoh</option>
                      <option value="13">District 13: Braddell, Macpherson, Potong Pasir</option>
                      <option value="14">District 14: Eunos, Geylang, Kembangan, Paya Lebar, Sims</option>
                      <option value="15">District 15: Amber Road, East Coast, Joo Chiat, Katong, Marine</option>
                      <option value="16">District 16: Bayshore, Bedok, Chai Chee, Eastwood, Kew Drive, Upper East Coast</option>
                      <option value="17">District 17: Changi, Flora, Loyang</option>
                      <option value="18">District 18: Paris Ris, Simei, Tampines</option>
                      <option value="19">District 19: Hougang, Punggol, Sengkang, Seranggon Garden</option>
                      <option value="20">District 20: Ang Mo Kio, Bishan, Bradell, Thomson</option>
                      <option value="21">District 21: Clementi Park, Hume Avenue, Ulu Pandan, Upper Bukit Timah</option>
                      <option value="22">District 22: Boon Lay, Tuas, Jurong</option>
                      <option value="23">District 23: Bukit Batok, Bukit Panjang, Choa Chu Kang, Dairy Farm, Hillview</option>
                      <option value="24">District 24: Lim Chu Kang, Sungei Gedong, Tengah</option>
                      <option value="25">District 25: Admiralty Road, Kranji, Woodgrove, Woodlands</option>
                      <option value="26">District 26: Springleaf, Tagore, Upper Thomson</option>
                      <option value="27">District 27: Admiralty Drive, Sembawang, Yishun</option>
                      <option value="28">District 28: Seletar, Yio Chu Kang</option>
                  </select>
              </div>
            <button type="submit"><img src="./PHPHomepage/images/save.png"></button>
        </form>
      </div>

      <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("search-dropdown");
            dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
        }
      </script>

      <!-- Map Search Function -->
      <div class ="mapstyle">
        <h2>Click on each map district to gather more information:</h2>

        <img src="./PHPHomepage/Data Display/image/map.jpg" alt="MAP" usemap="#SGmap">

        <map name="SGmap">
            <?php
        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "mysql";
        $dbname = "mapfunction";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // Query the database for the areas and their information
        $sql = "SELECT id,href,data_title, data_message,coords FROM image_areas";
        $result = $conn->query($sql);

        // Output each area with its information as an <area> tag
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<area shape='poly' coords='" . $row['coords'] . "' href='./PHPHomepage/Data Display/listings.php?id=" . $row['id'] . "' data-title='" . $row['data_title'] . "' data-message='" . $row['data_message'] . "'>";
          }
        }

        $conn->close();
        ?>
        </map>

        <div id="popup"></div>

        <script>
            var areas = document.getElementsByTagName("area");
            var popup = document.getElementById("popup");
            var throttledMousemove = throttle(showPopup, 50); // 50ms 节流函数

            for (var i = 0; i < areas.length; i++) {
                areas[i].addEventListener("mouseenter", function () {
                    var title = this.dataset.title;
                    var message = this.dataset.message;
                    popup.innerHTML = "<h2>" + title + "</h2><p>" + message + "</p>";
                    popup.classList.add("show");
                });

                areas[i].addEventListener("mouseleave", function () {
                    popup.classList.remove("show");
                });
            }

            function showPopup(e) {
                popup.style.left = e.pageX + "px";
                popup.style.top = e.pageY + "px";
            }

            function throttle(callback, delay) {
                var previousCall = new Date().getTime();
                return function () {
                    var time = new Date().getTime();
                    if ((time - previousCall) >= delay) {
                        previousCall = time;
                        callback.apply(null, arguments);
                    }
                };
            }

            window.addEventListener("mousemove", throttledMousemove);
        </script>
      </div>
      
    </main>
    
    
    <footer>
        <p>&copy; TIC4902</p>
    </footer>
</body>
</html>