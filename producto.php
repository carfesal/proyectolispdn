<html>
  <head>
    <title>Carrito Compras</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
  </head>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Carrito Lis</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
            <a class="nav-link" href="acerca.php">Log Out</a>
          </li>
        </ul>
        <?php
          session_start();
          if(isset($_SESSION['usr'])){
            echo "<span class='navbar-text navbar-right mr-1'>Total: $<span id='total' >".$_SESSION['total']."</span>  </span>
                  <span class='navbar-text navbar-right'>".$_SESSION['usr']."</span>";
          }else{
            echo "<span class='navbar-text navbar-right'>No logueado</span>";
          }
        ?>
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
                              <form method='POST'>
                                <div class='mb-3'>
                                  
                                  <label for='cantidad' class='form-label'>Cantidad:</label>
                                  <input type='number' class='form-control' id='cantidad".$fila['id']."' name='cantidad'>
                                </div>
                                <input type='button' class='btn btn-primary' onclick='alClic(".$fila['id'].",".$fila['precio'].")' value='Agregar' name='submit'>
                              </form>
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
      <div class="container">
        <h4>INGRESAR PRODUCTO</h4>

        <form method="POST" class="form-inline my-2 my-lg-1">        		
          <div class="form-group">
            <label for="nombresTxt">Nombre Producto:</label>
            <input type="text" class="form-control" name="nombre" id="nombresTxt" placeholder="Ingrese Usuario" required>
          </div>
          <div class="form-group">
            <label for="categoriaTxt">Categoria:</label>
            <input type="text" class="form-control" name="categoria" id="categoriaTxt" placeholder="Ingrese Categoria" required>
          </div>

          <div class="form-group">
            <label for="stock">Stock: </label>
            <input type="number" class="form-control" name="stock" id="stock" required>
          </div>
          <div class="form-group">
            <label for="precio">Precio: </label>
            <input type="number" class="form-control" name="precio" id="precio" required>
          </div>
          <input class="btn btn-outline-success my-3 my-sm-0" type="submit" name="sub" value="Crear Producto">       
        </form>
        <?php
          if(isset($_POST['sub'])){
            $nombre= $_POST['nombre'];
            $categoria=$_POST['categoria'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['stock'];
          
          
            $sql = "SELECT * FROM producto WHERE nombre='$nombre'"  ;
          
            $resultado = mysqli_query($conn,$sql);
          
            $count = mysqli_num_rows($resultado);
            if ($count == 0){
                  $sql2 = "INSERT INTO producto (nombre,categoria,stock,precio) VALUES ('$nombre','$categoria','$cantidad','$precio')";
                  $result = mysqli_query($conn,$sql2);
                  if($result){
                    echo "<div class='alert alert-success' role='alert'>
                            Producto creado exitosamente
                          </div>";
                  }else{
                    echo "<div class='alert alert-danger' role='alert'>
                            Ocurrio un problema
                          </div>";
                  }
                }else{
                      echo "<div class='alert alert-danger' role='alert'>
                                Producto ya existe
                            </div>";
                }
          }
          // validar
          
        ?>
      </div>
      
    </div>
    
    <script type="text/javascript">
      function alClic(id, precio){
        console.log("Entra"+id); 
        cantidad = parseInt(document.getElementById('cantidad'+id).value);
        total = document.getElementById('total');
        subtotal = precio * cantidad;
        if(total){
          $.post('agregar_carrito.php',{'subtotal': subtotal}, function(data){
            $('body').append(data);
          });
        }else{
          alert('Debe loguearse para agregar al carrito.');
        }
      }
    </script>
  </body>
  
</html>