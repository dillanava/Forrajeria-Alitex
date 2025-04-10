
<?php include_once "funciones.php"; 
      include_once "botones.php";
if (!isset($_SESSION["idUsuario"])) {
   echo !isset($_SESSION["idUsuario"]);
   exit("Primero debe ingresar al sisteman<br><a href='index.php'>regresar al inicio</a>");
 } ?>


<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/styles.css" rel="stylesheet" type="text/css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

  <script>
    // Función para verificar si el carrito de compras está vacío
    function verificarCarrito() {
      var carrito = <?php echo json_encode($_SESSION["carrito"]); ?>;
      // Si el carrito de compras está vacío, ocultar el botón de "Realizar Venta"
      if (!carrito || carrito.length === 0) {
        document.getElementById("realizarVentaBtn").style.display = "none";
      } else {
        // Si hay productos en el carrito, mostrar el botón de "Realizar Venta"
        document.getElementById("realizarVentaBtn").style.display = "block";
      }
    }
    function togglePasswordVisibility(inputId, iconId) {
        var input = document.getElementById(inputId);
        var icon = document.getElementById(iconId);
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }
  </script>

  <title>Forrajeria ALITEX</title>
</head>

<body>
  <header>
  <nav class="navbar bg-light fixed-top">
  <div class= "container-fluid">
      <!-- Logo -->
      <a class="navbar-brand" href="app.php#" style="padding-right: 100px;">
        <img alt="" src="img/alitex.png" style="max-height: 80px" />
      </a>
      <!-- Título -->
      <a class="navbar-brand d-flex justify-content-center align-items-center flex-grow-1" href="app.php#" style="font-size: 40px; font-family: 'Tempus Sans ITC', cursive; animation: myAnimation 5s infinite;">Forrajeria "ALITEX" Comercializadora Agropecuaria</a>
      <!-- Formulario de búsqueda y usuario -->
<div class="d-flex align-items-center ml-auto">

<?php
$us = obtenerUsuario($_SESSION["idUsuario"]);
foreach ($us as $u) {
    echo '<div style="margin-right: 10px; font-size: 16px; font-family: Arial;">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    ' . $u->usuario . '
                </button>
                <!-- Menú desplegable del nombre de usuario -->
             <ul class="dropdown-menu">
                                    <li>
                                        <form action="logout.php" method="POST" class="dropdown-item" onsubmit="return salirApp()">
                                            <input type="hidden" name="msj" id="ejemplo" value="0">
                                            <button type="submit" class="btn btn-link">Cerrar Sesión</button>
                                        </form>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#agregarUsuarioModal">Agregar Usuario</button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modificarUsuarioModal">Modificar Usuario</button>
                                    </li>
                                    <li>
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#buscarUsuarioModal">Buscar Usuario</button>
                                </li>
                                </ul>
            </div>
          </div>';
}
?>

<!-- Botón de cerrar sesión oculto -->
<form id="formSalir" action="logout.php" method="POST" style="display: none;">
    <input type="text" name="msj" id="ejemplo" readonly style="visibility: hidden;">
    <input type="submit" class="btn btn-secondary btn-lg btn-block" value="Salir Del Sistema">
</form>

<script type="text/javascript">
    function lanzarSalirApp() {
        var mensaje;
        var opcion = confirm("¿Desea abandonar el sistema?");
        if (opcion == true) {
            mensaje = "1";
            document.getElementById("ejemplo").value = mensaje;
            document.getElementById("formSalir").submit(); // Enviamos el formulario para cerrar sesión
        }
    }
</script>
  <!-- Modales para Agregar y Eliminar Usuario -->
  <!-- Modal Agregar Usuario -->
<div class="modal fade" id="agregarUsuarioModal" tabindex="-1" aria-labelledby="agregarUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarUsuarioModalLabel">Agregar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="agregarUsuarioForm" action="agregar_usuario.php" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="apellido" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombreUsuario" class="form-label">Nombre de usuario</label>
                        <input type="text" class="form-control" name="usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Contraseña</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="pass" id="pass" required>
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('pass', 'togglePass')">
                                <i id="togglePass" class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="admin_pass" class="form-label">Contraseña de administrador</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="admin_pass" id="admin_pass" required>
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('admin_pass', 'toggleAdminPass')">
                                <i id="toggleAdminPass" class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Agregar Usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

  <!-- Modal Modificar Usuario -->
<div class="modal fade" id="modificarUsuarioModal" tabindex="-1" aria-labelledby="modificarUsuarioModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modificarUsuarioModalLabel">Modificar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="modificarUsuarioForm" action="modificar_usuario.php" method="POST">
          <div class="mb-3">
            <label for="usuarioAntiguo" class="form-label">Usuario Antiguo</label>
            <input type="text" class="form-control" name="usuarioAntiguo" required>
          </div>
          <div class="mb-3">
            <label for="nuevoUsuario" class="form-label">Nuevo Usuario</label>
            <input type="text" class="form-control" name="usuario" required>
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre a Modificar</label>
            <input type="text" class="form-control" name="nombre" required>
          </div>
          <div class="mb-3">
            <label for="apellido" class="form-label">Apellido a Modificar</label>
            <input type="text" class="form-control" name="apellido" required>
          </div>
          <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono a Modificar</label>
            <input type="text" class="form-control" name="telefono" required>
          </div>
          <div class="mb-3">
    <label for="mod_pass" class="form-label">Contraseña Nueva</label>
    <div class="input-group">
        <input type="password" class="form-control" name="pass" id="mod_pass" required>
        <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('mod_pass', 'toggleModPass')">
            <i id="toggleModPass" class="bi bi-eye"></i>
        </button>
    </div>
</div>


          <div class="mb-3">
            <label for="admin_pass" class="form-label">Contraseña de administrador</label>
            <div class="input-group">
              <input type="password" class="form-control" name="admin_pass" id="mod_admin_pass" required>
              <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('mod_admin_pass', 'toggleModAdminPass')">
                <i id="toggleModAdminPass" class="bi bi-eye"></i>
              </button>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Modificar Usuario</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Buscar Usuario -->
<div class="modal fade" id="buscarUsuarioModal" tabindex="-1" aria-labelledby="buscarUsuarioModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="buscarUsuarioModalLabel">Buscar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="buscarUsuarioForm" onsubmit="return buscarUsuario();">
          <div class="mb-3">
            <label for="buscar_admin_pass" class="form-label">Contraseña de administrador</label>
            <div class="input-group">
              <input type="password" class="form-control" name="admin_pass" id="buscar_admin_pass" required>
              <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('buscar_admin_pass', 'toggleBuscarAdminPass')">
                <i id="toggleBuscarAdminPass" class="bi bi-eye"></i>
              </button>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Buscar Usuario</button>
          </div>
        </form>
        <div id="resultadosBusqueda" class="p-3"></div>
      </div>
    </div>
  </div>
</div>

<!-- Añadir el script de AJAX al final del body -->
<script>
function buscarUsuario() {
    var adminPass = document.getElementById('buscar_admin_pass').value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'buscar_usuario.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('resultadosBusqueda').innerHTML = xhr.responseText;
        }
    };

    xhr.send('admin_pass=' + encodeURIComponent(adminPass));
    return false;
}
</script>
<!-- Agrega este script al final de tu archivo o en una sección de scripts -->
<script>
    document.getElementById('togglePassword').addEventListener('click', function (e) {
        // Toggle the type attribute
        const passwordInput = document.getElementById('admin_pass');
        const toggleIcon = document.getElementById('toggleIcon');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Toggle the eye / eye-slash icon
        toggleIcon.classList.toggle('bi-eye');
        toggleIcon.classList.toggle('bi-eye-slash');
    });
</script>

<!-- Estilo Ojo de Visualizar Contraseña -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">

  <form class="d-flex mr-3" role="search" action="app.php" method="POST">
    <input class="form-control me-2" name="buscar" type="search" placeholder="Buscar" aria-label="Search">
    <button class="btn btn-outline-success" type="submit" style="margin-right: 10px;">Buscar</button>
  </form>

       <!-- Botón de despliegue para el menú offcanvas -->
<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
  <span class="navbar-toggler-icon"></span>
</button>

        <!-- Menú offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="backdrop-filter: blur(3px); background-image: url('img/blcanva1.jpg'); background-size: cover;">
  <div class="offcanvas-header">
    <a class="navbar-brand" href="#">
      <img alt="" src="img/aditivos.png" style="max-height: 350px" />
    </a>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <div class="container-fluid">
    <form class="d-flex" role="search" action="app.php" method="POST">
      <input class="form-control me-2" name="buscar" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>
  </div>



      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="app.php#">Inicio</a>
          </li>

       <!-- Sección Venta -->
       <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Venta</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="app.php">Venta</a></li>
              <li><a class="dropdown-item" href="appSuelto.php">Venta Sueto</a></li>
              <li><a class="dropdown-item" href="CuentaCorriente.php">Pagar Cuenta Corriente</a></li>
              <li><a class="dropdown-item" href="cuentaCorrienteEstadoGeneral.php">Estado De Cuenta</a></li>
              <li><a class="dropdown-item" href="cuentaCorrienteMovimientos.php">Movimiento En Cuenta</a></li>
              <li><hr class="dropdown-divider"></li>
              
            </ul>
          </li>
          <!-- Sección Articulos -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Articulos</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="productos.php">Lista Articulos</a></li>
              <li><a class="dropdown-item" href="productoAgregar.php">Nuevos Articulos</a></li>
              <li><a class="dropdown-item" href="productosEditar.php">Modificar Articulo</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="stockModificar.php">Modificar Stock</a></li>
              <li><a class="dropdown-item" href="stockCambiarPrecio.php">Modificar Precio</a></li>
              <li><hr class="dropdown-divider"></li>
              
            </ul>
          </li>
          <!-- Otras secciones -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cliente</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="clienteCargar.php">Nuevo Cliente</a></li>
              <li><a class="dropdown-item" href="clienteModificar.php">Modificar Cliente</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Proveedor</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="proveedorCargar.php">Nuevo Proveedor</a></li>
              <li><a class="dropdown-item" href="proveedorModificar.php">Modificar Proveedor</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categoria</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="categoriaCargar.php">Nueva Categoria</a></li>
              <li><a class="dropdown-item" href="categoriaModificar.php">Modificar Categoria</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="informes.php">Informes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pedido.php">Pedido</a>
          </li>

          </ul>
          
          <div>&nbsp;&nbsp;&nbsp;</div>
          <div class="card-body d-flex justify-content-between align-items-center">
    <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php 
                $us = obtenerUsuario($_SESSION["idUsuario"]);
                foreach ($us as $u) {
                    echo $u->usuario;
                } 
                ?>
            </a>
             
<!-- Menú desplegable del nombre de usuario -->
<ul class="dropdown-menu">
                                    <li>
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#agregarUsuarioModal">Agregar Usuario</button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modificarUsuarioModal">Modificar Usuario</button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#buscarUsuarioModal">Buscar Usuario</button>
                                    </li>
                                </ul>

        </li>
    </ul>
    
</div>

<script type="text/javascript">
    function salirApp() {
        var mensaje;
        var opcion = confirm("¿Desea abandonar el sistema?");
        if (opcion == true) {
            mensaje = "1";
        } else {
            mensaje = "0";
        }
        document.getElementById("ejemplo").value = mensaje;
        return opcion; // Devuelve true o false según la opción seleccionada
    }
</script>
          </div>
        </div>
      </div>
    </nav>
  </header>
<?php
include_once "funciones.php";
?>
<section class="contenido wrapper ">
<div class="container position-relative card" >
        <div class="card-header ">
        <h2 class="is-size-2">Eliminar Producto</h2>
        <?php productosButton() ?>

        </div>    
    <form action="productosEliminarRegistro.php" method="post">   
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Articulo</th>
                    <th scope="col">Presentacion</th>
                    <th scope="col">Tipo Articulo</th>
                    <th scope="col">Precio Inicial</th>
                    <th scope="col">Precio Final</th>
                    <th scope="col"> unidad cant</th>
                    <th scope="col">Limite Descuento</th>
                    <th scope="col">Stock</th>
                    <th scope="col">caducidad</th>
                    <th scope="col">Detalles</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            
             
                <input type="text" name="msj" id="msj" readonly style="visibility:hidden;">
                <?php  
               if(!isset($_POST["buscar"]))
               {
                  $productos = obtenerProductos();
               }else
               {
                 $productos =obtenerProductosBuscar($_POST["buscar"]);
               }
                foreach ($productos as $producto) 
                {
                    
                    ?>
                    <tr>
                            <th scope="row"><?php echo $producto->id_articulo ?></th>
                            <td><?php echo $producto->nombre ?></td>
                            <td><?php echo $producto->tamanio ?></td>
                            <td><?php echo $producto->tipoArti ?></td>
                            <td><?php echo $producto->precio_inicial ?></td>
                            <td><?php echo $producto->precio_final ?></td>
                            <?php
                                    if($producto->suelto==1){
                                    echo "<td style='color:blue' ><b>Suelto(".$producto->id_unidadVenta.")</b></td>";
                                    }else{
                                    echo "<td>".$producto->id_unidadVenta  ."</td>";
                                    }
                            ?>
                                            
                            <td><?php echo $producto->limites_descuento ?></td>
                            <td><?php echo $producto->cantidad ?></td>
                            <td><?php echo $producto->caducidad ?></td>
                            <td><?php echo $producto->detalles ?></td>
                            <td><script type="text/javascript">
                                            function vT(i)
                                            {
                                                var mensaje;
                                                var opcion = confirm("Desea Eliminar el Articulo");
                                                if (opcion == true) {
                                                    mensaje = i;
                                                } else {
                                                    mensaje = "-1";
                                                }
                                                document.getElementById("msj").value = mensaje;
                                            }
                                </script>  
                                <button class="btn btn-danger btn-sm" onclick="vT(<?php echo $producto->id_articulo; ?>)">
                                    Eliminar
                                </button>   
                        </td>
                        <?php 
                } ?>
                                   
                    </tr>
        </tbody>
    </table>
</form> 
</div>
</section>
  <a href="ventaPreparacion.php" class="btn-flotante">Vender</a>
<?php include_once "footer.php" ?>