<?php
    require_once('connection.php');


    $producto = $_POST['producto'];
    $sql = "SELECT * FROM producto WHERE LOWER(nombre) like Lower('%".$producto."%')";
    $result = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($result);
    if($rows > 0){
        $productos_csv = "";
        while($fila=mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $productos_csv .= $fila['nombre'].",".$fila['precio']."\n";     
        }
        echo $productos_csv;            
    }else{
        echo "No se encontraron productos";
    }

            
?>