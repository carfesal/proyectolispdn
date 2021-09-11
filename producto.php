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
          <li class="nav-item">
            <a class="nav-link" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item active">
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
    <div class="container my-1">
      <form class="form-inline my-2 my-lg-1" method="POST">
          <input class="form-control mr-sm-2 mb-1" name="producto" type="search" placeholder="Ingrese nombre de producto" aria-label="Search" required>
          <button class="btn btn-outline-success my-3 my-sm-0" type="submit" name="submit">Buscar producto</button>
      </form>
      <div class="container">
          <?php
            require_once('connection.php');
            
            if(isset($_POST['submit'])){
              //echo "Entra al submit";
              $producto = $_POST['producto'];
              $sql = "SELECT * FROM producto WHERE LOWER(nombre) like Lower('%".$producto."%')";
              $result = mysqli_query($conn,$sql);
              $rows = mysqli_num_rows($result);
              if($rows > 0){
                echo "<div class='row'>";
                while($fila=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                  echo "<div class='col-sm-6'>
                          <div class='card'>
                            <div class='card-body'>
                              <h5 class='card-title'>".$fila['nombre']."</h5>
                              <p class='card-text'>Precio: $".$fila['precio']."</p>
                              <p class='card-text'>Stock: ".$fila['stock']."</p>
                              <a href='#' class='btn btn-primary'>Comprar</a>
                            </div>
                          </div>
                        </div>";
                }

                echo "</div>";
              }else{
                echo "<div class='alert alert-danger' role='alert'>
                        No se encuentra ese producto
                      </div>";
              }

            }
          ?>
      </div>
      
    </div>
    
  </body>
</html>