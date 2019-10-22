<?php
    $sql = " UPDATE usuarios SET Usuario_bloqueado = '0' WHERE Usuario_email = '$mail'";
    if ($conn->query($sql) === TRUE) {
        echo "Usuario desbloqueado";
    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }        
    $conn->close();

?>