<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainpage.css">
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
              <button>Login</button>
              <!-- <div class="dropdown-content">
                  <a href="#">My Profile</a>
                  <a href="#">Sign Out</a>
                </div> -->
          </div>
        </nav>
    </header>

    <main>
      <span class="mapofsg">
        <img src="./image/map.jpg" alt="MAP" usemap="#SGmap" width="760" height="427" >
      </span>
      

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
            echo "<area shape='poly' coords='" . $row['coords'] . "' href='area.php?id=" . $row['id'] . "' data-title='" . $row['data_title'] . "' data-message='" . $row['data_message'] . "'>";
          }
        }

        $conn->close();
        ?>
      </map>

      <div id="popup"></div>

      <script>
        var areas = document.getElementsByTagName("area");
        var popup = document.getElementById("popup");
        
        for (var i = 0; i < areas.length; i++) {
          areas[i].addEventListener("mouseover", function() {
            var title = this.dataset.title;
            var message = this.dataset.message;
            showInfo(title, message);
          });
          
          areas[i].addEventListener("mouseout", hideInfo);
        }
        
        function showInfo(title, message) {
          popup.innerHTML = "<h2>" + title + "</h2><p>" + message + "</p>";
          popup.style.display = "block";
        }
        
        window.addEventListener("mousemove", function(e) {
          popup.style.left = e.pageX + "px";
          popup.style.top = e.pageY + "px";
        });
        
        function hideInfo() {
          popup.style.display = "none";
        }
      </script>
    </main>
    
    
    <footer>
        <p>&copy; TIC4902</p>
    </footer>
</body>
</html>