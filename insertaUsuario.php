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
            $sql = "INSERT INTO usuarios (Usuario_nick, Usuario_clave, Usuario_email)
            VALUES ('$nick', '$password_cod', '$mail')";
            
            if ($conn->query($sql) === TRUE) {
                echo "Alta correcta.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }        
            $conn->close();
            //redireccion 
            //header('Location: index.php');
        } else {
            echo "Datos invalidos.";
        }
      


    ?>
</body>
</html>
