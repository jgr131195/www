<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
    <?php 
        include_once "conexion.php"; //conexion BD
 
        $token = $_GET["token"];

        echo $token;


    ?>
</body>
</html>
