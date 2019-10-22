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
 /*
        session_start();
        $mail = $_SESSION['email'];
        session_unset();
        session_destroy();
*/
        $token_cod = $_GET["token"];
        echo $token_cod;
/*
        $sql = "SELECT Usuario_token_aleatorio FROM usuarios where Usuario_email = '$mail'";
        if ($conn->query($sql) === TRUE) {
            if (password_verify ( string $password , string $token_cod )) {
                $sql = " UPDATE usuarios SET Usuario_bloqueado = '0' WHERE Usuario_email = '$mail'";
                if ($conn->query($sql) === TRUE) {
                    echo "Usuario desbloqueado";
                
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }        
                $conn->close();
            } else {
                echo "Error desbloqueo";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }        
        $conn->close();
*/
    ?>
</body>
</html>
