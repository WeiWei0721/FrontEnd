<!DOCTYPE html>
<html>
<head>
  <style>
    #popup {
      position: absolute;
      z-index: 9999;
      background-color: white;
      border: 1px solid black;
      padding: 10px;
      opacity: 0;
      transition: opacity 0.3s ease-in-out;
      pointer-events: none;
    }
    #popup.show {
      opacity: 1;
      pointer-events: auto;
    }
  </style>
</head>
<body>

  <h2>Image Maps</h2>
  <p>Click on the map to go to a new page and read more about the topic:</p>

  <img src="./image/map.jpg" alt="MAP" usemap="#SGmap" width="760" height="427">

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
    var throttledMousemove = throttle(showPopup, 50); // 50ms 节流函数

    for (var i = 0; i < areas.length; i++) {
      areas[i].addEventListener("mouseenter", function() {
        var title = this.dataset.title;
        var message = this.dataset.message;
        popup.innerHTML = "<h2>" + title + "</h2><p>" + message + "</p>";
        popup.classList.add("show");
      });
      
      areas[i].addEventListener("mouseleave", function() {
        popup.classList.remove("show");
      });
    }
    
    function showPopup(e) {
      popup.style.left = e.pageX + "px";
      popup.style.top = e.pageY + "px";
    }
    
    function throttle(callback, delay) {
      var previousCall = new Date().getTime();
      return function() {
        var time = new Date().getTime();
        if ((time - previousCall) >= delay) {
          previousCall = time;
          callback.apply(null, arguments);
        }
      };
    }

    window.addEventListener("mousemove", throttledMousemove);
  </script>

</body>
</html>
