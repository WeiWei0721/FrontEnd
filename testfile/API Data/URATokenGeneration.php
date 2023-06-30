<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URATokenGeneration</title>
</head>
<body>
    <?php

        function getToken(){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.ura.gov.sg/uraDataService/insertNewToken.action");
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'AccessKey: 6ed27763-906c-41a3-a25c-66db1be38626',
            ]);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            
            $data = curl_exec($ch);
            // var_dump(curl_getinfo($ch))  . '<br/>';
            // echo '<br/><br/>';
            // echo curl_errno($ch) . '<br/>';
            // echo curl_error($ch) . '<br/>'; 
    
            curl_close($ch);
            return $data;
        }


    ?>
</body>
</html>