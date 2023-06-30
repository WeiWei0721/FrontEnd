<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP API Teset</title>
</head>
<body>

    <!-- Obtain URA Token -->
    <?php
        require __DIR__ . '/URATokenGeneration.php';
        $token = getToken();
        $json_data = json_decode($token,true);
        $token = $json_data['Result'];
    ?>

    <!-- Obtain Data from URA API for Private Non-Landed Residential Properties Median Rentals by Name -->
    <?php

        //Connecting to Database
        $servername = "localhost";
        $username = "root";
        $password = "mysql";
        $database = "privateproperty";
        $tablename = "uramedianrental";
        $db = mysqli_connect($servername, $username, $password, $database);

        $sql = "delete from " .$tablename;
        mysqli_query($db, $sql);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 
        "https://www.ura.gov.sg/uraDataService/invokeUraDS?service=PMI_Resi_Rental_Median");
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'AccessKey: 6ed27763-906c-41a3-a25c-66db1be38626',
            'Token: '.$token,
            'User-Agent: Override'
        ]);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $data = curl_exec($ch);


        curl_close($ch);
        // var_dump($data);
        echo "<br/><br/>";
        $json_data = json_decode($data,true);
        $selective = $json_data['Result'];
        transferdata($selective, $db, $tablename);
        unset($json_data);
        unset($selective);

        //Input Data into Databse
        function transferdata($selective, $db, $tablename){
            if (empty($selective)){
                echo "No Data Found";
                return;
            } else {
                //limiter for records
                $count = 1;
                foreach ($selective as $elem){
                    $propdetails = $elem['rentalMedian'];
                    foreach ($propdetails as $prop){
                        if ($count >= 300) {
                            return;
                        } else {
                            $PPdata = array($prop['district'], $elem['project'],$elem['street'], 
                            $prop['median'], $prop['refPeriod']);
                            echo $PPdata[0]. ', ';
                            echo $PPdata[1]. ', ';
                            echo $PPdata[2]. ', ';
                            echo $PPdata[3]. '<br/>';
                            $sql = "INSERT INTO " .$tablename. " (district, project,street, median, refPeriod) 
                            VALUES ('$PPdata[0]', '$PPdata[1]', '$PPdata[2]', '$PPdata[3]', '$PPdata[4]')";
                            mysqli_query($db, $sql);
                            $count ++;
                        }
                    }
                }
            }
        }
        $db->close();
    ?>
</body>
</html>