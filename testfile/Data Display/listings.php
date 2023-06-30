<!DOCTYPE html>
<?php 
  include("config.php");
  session_start(); 
  
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Listings</title>
</head>
<body>
    <header>
        <div class="homelogo">
          <a href="../../homepage.php">Our Property Pictures</a>
        </div>
        <nav class="headerbar">
          <a href="../../homepage.php">Home</a>
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
    
    
    <?php 
        $_SESSION['id'] = $_GET["id"];
    ?>

    <div class="dataset">
        <iframe src="area.php" frameborder="0" height="100%" width="100%"></iframe>
    </div>
    
    
</body>

<footer>
    <p>&copy; TIC4902</p>
</footer>