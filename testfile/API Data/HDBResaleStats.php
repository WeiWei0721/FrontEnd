<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP API Teset</title>
</head>
<body>
    <?php

        //Connecting to Database
        $servername = "localhost";
        $username = "root";
        $password = "mysql";
        $database = "hdbinfo";
        $db = mysqli_connect($servername, $username, $password, $database);
        
        $datapage = 0;
        $continuePull = true;

        //Connecting to API 
        while ($continuePull){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://data.gov.sg/api/action/datastore_search?offset=".$datapage."&resource_id=52e93430-01b7-4de0-80df-bc83d0afed40");
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            
            $data = curl_exec($ch);
            // var_dump(curl_getinfo($ch))  . '<br/>';
            // echo '<br/><br/>';
            // echo curl_errno($ch) . '<br/>';
            // echo curl_error($ch) . '<br/>'; 

            curl_close($ch);

            $json_data = json_decode($data,true);
            echo '<br/><br/>';
            $selective = $json_data['result']['records'];
            if (empty($selective)){
                echo "No Data Found";
                $continuePull = false;
            } else {
                //Inserting Data into SQL Database
                foreach($selective as $elem){
                    $HDBinfo = array($elem['_id'], $elem['index'], $elem['quarter']);
                    // echo ("Price index: " .$elem['index']. " Quarter: " .$elem['quarter']. " ID: " .$elem['_id']);
                    echo ("Price index: " .$HDBinfo[0]. " Quarter: " .$HDBinfo[1]. " ID: " .$HDBinfo[2]);
                    $sql = "INSERT INTO hdbresalestats (ID, PriceIndex, Quarter) 
                    VALUES ('$HDBinfo[0]', '$HDBinfo[1]', '$HDBinfo[2]' )";
                    mysqli_query($db, $sql);
                    echo '<br/>';
                }
            }
            $datapage += 100;
        }

        $db->close();
    ?>
</body>
</html>