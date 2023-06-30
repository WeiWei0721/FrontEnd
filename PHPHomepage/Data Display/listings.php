<!DOCTYPE html>
<?php 
  include("config.php");
  session_start(); 
  if (isset($_GET['viewid'])) {
    $_SESSION['propertyid'] = $_GET['viewid'];
    header("location: ../maindraft%20v3.0.php");
  }
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

    <div class="listinginfo">
      <div class="listingsbox">
         <div class="headerfield">
            <span class="headername" style="width: 25%;" >
               Your Property Listings
            </span>
            <table class="proptb2">
               <tr class="listbox2">
                  <th>
                     Property ID
                  </th>
                  <th>
                     Property Type
                  </th>
                  <th>
                     Postal
                  </th>
                  <th>
                     StreetName
                  </th>
                  <th>
                     UnitPrice	
                  </th>
                  <th>
                     Tenure	
                  </th>
                  <th>
                     Lease Commencement Date	
                  </th>
                  <th>
                     Remaining Lease
                  </th>
                  <th>
                     Listing Agent
                  </th>
                  <th>
                     Click here to View
                  </th>
               </tr>

               <?php
                  if (session_status() == PHP_SESSION_ACTIVE){
                    $sql = "SELECT PropertyID, FlatType, PostalDistrict, StreetName, UnitPrice, Tenure, LeaseCommenceDate, RemainingLease, AgentRegistrationNo 
                    FROM properties WHERE District = '". $_SESSION['id']."';";
                    $result = mysqli_query($conn_new_property,$sql);
                    if ($result){
                      while ($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
                ?>

                         <tr class="listbox2">
                            <td><?php echo $row[0]; ?></td>
                            <td><?php echo $row[1]; ?></td>
                            <td><?php echo $row[2]; ?></td>
                            <td><?php echo $row[3]; ?></td>
                            <td><?php echo $row[4]; ?></td>
                            <td><?php echo $row[5]; ?></td>
                            <td><?php echo $row[6]; ?></td>
                            <td><?php echo $row[7]; ?></td>
                            <td><?php echo $row[8]; ?></td>
                            <td>
                               <a href="?viewid=<?php echo $row['PropertyID']?>" class="viewbtn">View</a>
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
    


    <div class="dataset">
        <iframe src="area.php" frameborder="0" height="100%" width="100%"></iframe>
    </div>
    
    
</body>

<footer>
    <p>&copy; TIC4902</p>
</footer>