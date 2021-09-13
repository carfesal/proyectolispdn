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
            <a class="nav-link" href="acerca.php">Log Out</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <body>

    <div class="container">
      <form method="POST">
        <div class="form-group">
          <label for="usuarioTxt">Usuario:</label>
          <input type="text" class="form-control" name="usuario" id="usuarioTxt" placeholder="Ingrese Usuario" required>
        </div>
        <div class="form-group">
          <label for="passTxt">Contraseña:</label>
          <input type="password" class="form-control" name="contrasena" id="passTxt" placeholder="Ingrese Contraseña" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" value="validar" name="submit">Login</button><br>
        <p>Sin cuenta?<a href="registro.php" class="btn btn-link">Registrate</a></span>
        
      </form>
      <?php
        if(isset($_POST['submit'])){
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
              $_SESSION['total']=0;
              echo "<script> location.href='index.php'</script>";
  
          }else{
              echo "Acceso denegado!!";
          }
        }
        

      ?>
    </div>
    


      
  </body>
</html>