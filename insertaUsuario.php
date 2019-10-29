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
        $valido = 0;
        $nick = $_POST['nick'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/";

        if ($password==$password2) {
            $password_cod = password_hash($password, PASSWORD_DEFAULT);
            $valido++;
        }
        if (!empty($nick)) {
            $valido++;
        }
        if ((!empty($mail))&&(preg_match ($regex, $mail)==1)) {
            $valido++;
        }

        if ($valido==3) {
            $sql = "INSERT INTO usuarios (Usuario_nick, Usuario_clave, Usuario_email, Usuario_bloqueado)
            VALUES ('$nick', '$password_cod', '$mail', '1')";
            
            if ($conn->query($sql) === TRUE) {

                $fecha = getdate();
                $caracter = ["@","#","¬","&","%"];
                $token = $fecha[0];
                $token.=$caracter[mt_rand(0,4)];

                $token_cod = password_hash($token, PASSWORD_DEFAULT);

                //token
                $sql = " UPDATE usuarios SET Usuario_token_aleatorio = '$token_cod' WHERE Usuario_email = '$mail'";
                if ($conn->query($sql) === TRUE) {
                    $para = $mail;
                    $titulo = "Confimacion de registro";
                    $mensaje = "
                        <!DOCTYPE html>
                        <html>
                        <head>
                            <title></title>
                            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' />
                        </head>
                        <body>
                            <p>Hola, le mandamos este correo para que confirme su registro en nuestro sitio web</p>
                            <a href='https://juangandulloramirez.000webhostapp.com/desbloqueaConToken.php?token=$token_cod&mail=$mail' class='btn btn-success'>Desbloquear</a>

                        </body>
                        </html> 
                    ";
                    
                    $cabeceras = "MIME-Version: 1.0\r\n"; 
                    $cabeceras .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

                    $enviado = mail($para, $titulo, $mensaje, $cabeceras);

                    if ($enviado) {
                        echo 'Email enviado';
                    } else {
                        echo 'Email error';
                    }
                   
                    //redireccion 
                    //header('Location: index.php');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }//token

                echo "Alta correcta.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }        
            $conn->close();

        } else {
            echo "Datos invalidos.";
        }
      


    ?>
</body>
</html>

