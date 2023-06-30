<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $curYear = date("y");
        $curMonth = date("m", time());
        $curQuarter = ceil($curMonth/3);
        echo $curYear. "q" .$curQuarter;
    ?>
</body>
</html>