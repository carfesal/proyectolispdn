<html>
  <head>
    <title>Carrito Compras</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  </head>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Carrito Lis</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="producto.php">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="acerca.php">Acerca de</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <body>

    <div class="container">
      <form method="POST">
        <div class="form-group">
          <label for="nombresTxt">Nombres:</label>
          <input type="text" class="form-control" name="nombres" id="nombresTxt" placeholder="Ingrese Usuario" required>
        </div>
        <div class="form-group">
          <label for="usuarioTxt">Usuario:</label>
          <input type="text" class="form-control" name="usuario" id="usuarioTxt" placeholder="Ingrese Usuario" required>
        </div>
        <div class="form-group">
          <label for="passTxt">Contraseña:</label>
          <input type="password" class="form-control" name="contrasena" id="passTxt" placeholder="Ingrese Contraseña" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" value="submit" name="submit">Registro</button><br>
                
      </form>
        <?php
            require_once('connection.php');
            if(isset($_POST['submit'])){
                $nombres = $_POST['nombres'];
                $usuario = $_POST['usuario'];
                $password = $_POST['contrasena'];
    
                $val = "SELECT * FROM usuario WHERE usuario='$usuario'";
                $result = mysqli_query($conn, $val);
    
                $rows = mysqli_num_rows($result);
                if($rows > 0){
                    echo "<div class='alert alert-danger' role='alert'>
                            Usuario ya existente ingrese otro usuario
                        </div>";
                }else{        
                    $query = "INSERT INTO usuario (nombres, usuario, contrasena) VALUES ('$nombres','$usuario','$password')";
                    $res = mysqli_query($conn, $query);
                    if($res){
                        echo "<div class='alert alert-success' role='alert'>
                            Usuario creado exitosamente
                        </div>";
                    }
                }   
            }
            
        ?>
    </div>
    


      
  </body>
</html>