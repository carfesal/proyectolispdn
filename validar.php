<?php
require_once('connection.php');

$usr=$_POST['usuario'];
$pass=$_POST['contrasena'];

$query = "SELECT * FROM usuario WHERE usuario='$usr' AND contrasena='$pass'";
$result = mysqli_query($conn, $query);
$rows = mysqli_num_rows($result);


if ($rows == 1){
    session_start();
    $fila = mysqli_fetch_row($result);
    $_SESSION['usr'] = $fila[1];
    $_SESSION['id'] =$fila[0];
    echo "Ingreso exitoso,".$fila[1].",".$fila[0];

}else{
    echo "Acceso denegado!!";
}

?>