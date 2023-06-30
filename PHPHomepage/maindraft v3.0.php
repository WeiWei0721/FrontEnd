<!DOCTYPE html>
<?php 
  include("config_back.php");
  include("../login/config.php");
  session_start(); 
  
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main v3.0.css">
    <title>Agent Page v3.0</title>
</head>
<body>
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
                    <a href='../login/welcome_profile_".$_SESSION['login_usertype'].".php'>My Profile</a>
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

    <main>
      
      <br>

        <div class="tab">
            <button class="tablinks" onclick="openView(event, 'Imageview')" id = "defaultOpen">Images</button>
            <button class="tablinks" onclick="openView(event, 'Videoview')">VR View</button>
            <button onclick="openEdit()">Edit Listing</button>
          </div>


          <!-- Edit Picture View -->
          <div id="Imageview" class="tabcontent">
            <div class ="container">

              <?php
            
                $query = " select * from image where PropertyID = '" .$_SESSION['propertyid']. "' and AgentRegistrationNo = '" .$_SESSION['login_user']. "';";
                $result = mysqli_query($db, $query);

                if(isset($displayErrMessage))
                {
                ?>
                  <div class="alert alert-danger">
                    <?php 
                      echo $displayErrMessage;
                      unset($displayErrMessage);
                    ?>
                  </div>
                <?php 
                } else {
                  while ($data = mysqli_fetch_assoc($result)) {
                    ?>
                      <div class="mySlides">
                        <img src="./Upload Function/pic_upload/image/<?php echo $data['filename']; ?>" >
                      </div>   
                <?php
                  }
                }
              ?>
            
              <!-- Next and previous buttons -->
              <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
              <a class="next" onclick="plusSlides(1)">&#10095;</a>
            
              <!-- Thumbnail images -->
                <?php
                  $servername = "localhost";
                  $username = "root";
                  $password = "mysql";
                  $database = "uploadimage";
              
                  $db = mysqli_connect($servername, $username, $password, $database);
              
                  $query = " select * from image where PropertyID = '" .$_SESSION['propertyid']. "' and AgentRegistrationNo = '" .$_SESSION['login_user']. "';";
                  $result = mysqli_query($db, $query);

                  if(isset($displayErrMessage))
                  {
                  ?>
                    <div class="alert alert-danger">
                      <?php 
                        echo $displayErrMessage;
                        unset($displayErrMessage);
                      ?>
                    </div>
                  <?php 
                  } else {
                  ?>
                  <div class="row">
                    <?php  
                      $counter = 1;
                      while ($data = mysqli_fetch_assoc($result)) {
                    ?>
                          <div class="column">
                            <img class="demo cursor" src="./Upload Function/pic_upload/image/<?php echo $data['filename']; ?>" 
                            onclick="currentSlide(<?php echo $counter; ?>)">
                          </div>   
                    <?php
                      $counter ++;
                      }
                    ?>
                  </div>
                  <?php
                  }
                ?>
              
            </div>

          <!-- To scroll Images -->
          <script>
            let slideIndex = 1;
            showSlides(slideIndex);
            
            function plusSlides(n) {
              showSlides(slideIndex += n);
            }
            
            function currentSlide(n) {
              showSlides(slideIndex = n);
            }
            
            function showSlides(n) {
              let i;
              let slides = document.getElementsByClassName("mySlides");
              let dots = document.getElementsByClassName("demo");
              if (n > slides.length) {slideIndex = 1}
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
              }
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";
              dots[slideIndex-1].className += " active";
            }
            </script>
          </div>

          <!-- VR Video Tab -->
          <div id="Videoview" class="tabcontent">
            <iframe width="900" height="506" src="https://www.youtube.com/embed/B_LPNh9kYkA" title="Veer Penthouse Unit 3502 - 360° VR Video Tour" 
            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
          </div>
          <!-- VR Video Tab End -->

          <!-- To open Tab Views-->
          <script>
            document.getElementById("defaultOpen").click();

            function openView(evt, viewName) {
              var i, tabcontent, tablinks;
              tabcontent = document.getElementsByClassName("tabcontent");
              for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
              }
              tablinks = document.getElementsByClassName("tablinks");
              for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace("active", "");
              }
              document.getElementById(viewName).style.display = "block";
              evt.currentTarget.className += " active";
            }
          </script>
          <!-- To open Tab Views End-->

          <script>
            // Open Tab
            document.getElementById("defaultOpen").click();

            function openView(evt, viewName) {
              var i, tabcontent, tablinks;
              tabcontent = document.getElementsByClassName("tabcontent");
              for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
              }
              tablinks = document.getElementsByClassName("tablinks");
              for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace("active", "");
              }
              document.getElementById(viewName).style.display = "block";
              evt.currentTarget.className += " active";defaultOpenForm
            }
          </script>

          <!-- Pop Out Window -->
          <div id="editList" class="form-popup">
              <button onclick="closeEdit()" class="spu-close-popup">X</button>
              <div class="edittab">
                <button class="tablinkForm" onclick="openFormView(event, 'PropDetails')" id = "defaultOpenForm">Details</button>
                <button class="tablinkForm" onclick="openFormView(event, 'ImageEdit')" id = "defaultOpenForm">Images</button>
                <button class="tablinkForm" onclick="openFormView(event, 'VideoEdit')">VR Video</button>

              </div>

              <!-- Edit Property Details -->
              <div id="PropDetails" class="tabcontentForm">
                <form class="form-container">
                  <iframe src="../login/display_property_form.php">
                  </iframe>
                </form>
              </div>

              <!-- Edit Images -->
              <div id = "ImageEdit" class="tabcontentForm">
                <form class="form-container">
                  <iframe src="./Upload Function/pic_upload/pic_upload_index.php">
                  </iframe>
                </form>
              </div>

              <!-- Edit Video -->
              <div id = "VideoEdit" class="tabcontentForm">
                <form class="form-container">
                  <iframe src="./Upload Youtube/index.php"></iframe>
                </form>
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

              function openFormView(evt, viewName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontentForm");
                for (i = 0; i < tabcontent.length; i++) {
                  tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinkForm");
                for (i = 0; i < tablinks.length; i++) {
                  tablinks[i].className = tablinks[i].className.replace("active", "");
                }
                document.getElementById(viewName).style.display = "block";
                evt.currentTarget.className += " active";
              }
            </script>
          <!-- Pop Out Window End-->
          <?php
          if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['login_user'])){
            $sql = "SELECT * FROM properties WHERE propertyid = ". $_SESSION['propertyid']. " and AgentRegistrationNo= '". $_SESSION['login_user']."';";
            $result = mysqli_query($link,$sql);
            
            if ($result){
              $row = mysqli_fetch_array($result,MYSQLI_BOTH);
              $_SESSION['id'] = $row['District'];
              // while ($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
                  ?>

                  <div class = "listinginfo">
                    <div class="detailsbox">
                      <span class="propname">
                        <?php echo $row['ProjectName']; ?>
                      </span>
                      <span class="propaddress">
                        <?php echo "Block ". $row['Block']. " " .$row['StreetName']. ", " .$row['PostalDistrict'] ; ?>
                      </span>
                      <br>
                      <span class="listprice">
                        SGD $<?php echo $row['Price']; ?>
                      </span>
                      <span class="listdetails">
                        PSF $<?php echo $row['UnitPrice']; ?>, 
                        <?php echo $row['FlatType']; ?><img class="illuimg" src="./images/bedroom.PNG">
                      </span>
                    </div>

                    <div class="detailsbox">
                      <span class="propname">
                        <h4>Property Details</h4>
                      </span>

                      <table class="proptb">
                        <tr class="listbox">
                          <td class="listdets">
                            <span class="listheader">
                              Property ID
                            </span>
                            <span class="headerdets">
                            <?php echo $row['PropertyID']; ?>
                            </span>
                          </td>
                          <td class="listdets">
                            <span class="listheader">
                              Floor Size
                            </span>
                            <span class="headerdets">
                              <?php echo $row['FloorArea']. " ". $row['TypeofArea']; ?>
                            </span>
                          </td>
                        </tr>

                        <tr class="listbox">
                          <td class="listdets">
                            <span class="listheader">
                              Project Name
                            </span>
                            <span class="headerdets">
                              <?php echo $row['ProjectName']; ?>
                            </span>
                          </td>
                          <td>
                            <span class="listheader">
                              PSFT Price
                            </span>
                            <span class="headerdets">
                              $<?php echo $row['UnitPrice']; ?> per <?php echo $row['TypeofArea']; ?>
                            </span>
                          </td>
                        </tr>

                        <tr class="listbox">
                          <td class="listdets">
                            <span class="listheader">
                              Flat Type
                            </span>
                            <span class="headerdets">
                              <?php echo $row['FlatType']; ?>
                            </span>
                          </td>
                          <td>
                            <span class="listheader">
                              Tenure
                            </span>
                            <span class="headerdets">
                              <?php echo $row['Tenure']; ?>
                            </span>
                          </td>
                        </tr>

                        <tr class="listbox">
                          <td class="listdets">
                            <span class="listheader">
                              Type of Sale
                            </span>
                            <span class="headerdets">
                              <?php echo $row['TypeofSale']; ?>
                            </span>
                          </td>
                          <td>
                            <span class="listheader">
                              Floor Level
                            </span>
                            <span class="headerdets">
                              <?php echo $row['FloorLevel']; ?>
                            </span>
                          </td>
                        </tr>

                        <tr class="listbox">
                          <td class="listdets">
                            <span class="listheader">
                              Date of Sale
                            </span>
                            <span class="headerdets">
                              <?php echo $row['DateofSale']; ?>
                            </span>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>

          <?php
                  };
                } else {
                  echo mysqli_error($link);
                  echo "No Records to display";
                }
            // }
          ?>

          <div class="insightspage">
            <h1>Insights here</h1>
            <iframe src="./Data Display/area.php" frameborder="0" height="100%" width="100%"></iframe>
          </div>

    </main>
    
    
    <footer>
        <p>&copy; TIC4902</p>
    </footer>
</body>
</html>