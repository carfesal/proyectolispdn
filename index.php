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
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
        <?php
          session_start();
          if(isset($_SESSION['usr'])){
            echo "<span class='navbar-text navbar-right mr-1'>Total: $<span id='total' >".$_SESSION['total']."</span>  </span><span class='navbar-text navbar-right'>".$_SESSION['usr']."</span>";
          }else{
            echo "<span class='navbar-text navbar-right'>No logueado</span>";
          }
        ?>
      </div>
    </nav>
  </header>
  <body>
    <div class="container">
      <?php
        
        if(isset($_SESSION['usr'])){
          echo "<div class='jumbotron jumbotron-fluid'>
                  <div class='container'>
                    <h1 class='display-4'>Bienvenido, ".$_SESSION['usr']."</h1>
                  </div>
                </div>";
        }else{
          echo "<div class='jumbotron jumbotron-fluid'>
                  <div class='container'>
                    <h1 class='display-4'>No ha iniciado sesion</h1>
                  </div>
                </div>";
        }
      ?>
    </div>
  </body>
</html>