<!DOCTYPE html>
<?php 
error_reporting(0);
?>
<html>
<head>
    <title>Search Bar with Dropdown</title>
    <style>
        .dropdown {
            display: none;
        }
    </style>
    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("dropdown");
            dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
        }
    </script>
</head>
<body>
    <form method="get" action="area.php">
        <input type="text" name="query" placeholder="Search..." onclick="toggleDropdown()">
        <div id="dropdown" class="dropdown">
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
        <button type="submit">Search</button>
    </form>
</body>
</html>

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

        img {
            max-width: 100%;
            max-height: 100%;
        }

        img {
            display: block;
            margin: auto;
            max-width: 100%;
            max-height: 100%;
        }
    </style>
</head>

<body>


    <h2>Click on each map district to gather more information:</h2>

    <img src="./image/map.jpg" alt="MAP" usemap="#SGmap">

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

</body>

</html>


