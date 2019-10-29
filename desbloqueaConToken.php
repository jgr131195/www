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

        $token_cod = $_GET["token"];
        $mail = $_GET["mail"];

        $sql = "SELECT Usuario_token_aleatorio FROM usuarios where Usuario_email = '$mail'";
        if ($resultado = $mysqli->query($sql)) {
            while ($fila = $resultado->fetch_row()) {
                if ( password_verify($fila[0] , $token_cod) ) {
                    
                    $sql = " UPDATE usuarios SET Usuario_bloqueado = '0' WHERE Usuario_email = '$mail'";
                    if ($conn->query($sql) === TRUE) {
                        echo "cuenta desbloqueada";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }//token

                
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
        $resultado->close();
        $conn->close();

        


    ?>
</body>
</html>
