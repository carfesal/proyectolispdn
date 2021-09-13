<?php
    require_once('connection.php');

    $nombres = $_POST['nombres'];
    $usuario = $_POST['usuario'];
    $password = $_POST['contrasena'];

    $val = "SELECT * FROM usuario WHERE usuario='$usuario'";
    $result = mysqli_query($conn, $val);
    echo "$usuario";
    $rows = mysqli_num_rows($result);
    if($rows > 0){
        echo "Usuario ya existente";
    }else{        
        $query = "INSERT INTO usuario (nombres, usuario, contrasena) VALUES ('$nombres','$usuario','$password')";
        $res = mysqli_query($conn, $query);
        if($res){
            echo "Usuario creado Exitosamente";
        }
                
    }   

    
    
?>