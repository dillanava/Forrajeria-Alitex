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
  <link rel="icon" href="img/aditivos.ico" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

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

<style>
    .btn-custom {
        height: 250px;
        width: 100%;
        font-size: 1.5em;
        background-color: transparent; /* Fondo transparente */
        border: 4px solid green;       /* Contorno verde, más grueso */
        border-radius: 15px;           /* Bordes redondeados */
        color: green;                  /* Color del texto e íconos */
    }
    .btn-custom i {
        font-size: 5em;
    }
    .btn-custom:hover {
        background-color: rgba(0, 128, 0, 0.1); /* Fondo ligeramente verde al pasar el cursor */
    }
    .button-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; /* Espacio entre botones */
        justify-content: center;
    }
    .button-wrapper {
        flex: 1 1 calc(33.333% - 40px); /* Ajusta el tamaño y el espacio entre botones */
        min-width: 250px; /* Tamaño mínimo para los botones */
    }

/* Titulo e Imagen */
@keyframes myAnimation {
  /* Define tu animación aquí */
}

.navbar-brand img {
  max-height: 100px;
  transition: max-height 0.3s ease-in-out;
}

@media (max-width: 992px) {
  .navbar-brand img {
    max-height: 85px; /* Ajusta el tamaño del logo para pantallas más pequeñas */
  }

  .navbar-brand {
    display: flex;
    justify-content: center;
    width: 100%;
  }

  .titulo-completo {
    display: none;
  }

  .collapse.navbar-collapse {
    width: 100%;
    justify-content: center;
  }
}

/* Logo */
@media (min-width: 992px) {
  .navbar-nav {
    flex-grow: 1;
    justify-content: center;
  }

  .navbar-brand img {
    margin-right: 1750px;
    max-height: 100px;
  }

  .titulo-completo {
    position: absolute;
    left: 45%;
    transform: translateX(-50%);
    font-size: 50px;
    font-family: 'Tempus Sans ITC', cursive;
    animation: myAnimation 5s infinite;
  }
}

/* Añadir margen superior para evitar que el contenido sea cubierto por la barra de navegación */
body {
  padding-top: 60px;
}

/* Iconos */
.navbar-icons {
  display: flex;
  font-size: 1.2rem; /* Ajusta el tamaño de los iconos */
  margin-left: -450px; /* Ajusta este valor según sea necesario para mover los íconos */
}

.nav-icon {
  margin-right: 15px;
}

.nav-icon {
  font-size: 1.5em;
  color: #fff; /* Color del icono ajustado para mejor visibilidad */
  transition: transform 0.3s ease-in-out;
}

.nav-icon:hover {
  transform: scale(1.5);
}

/* Ajustes para móviles */
@media (max-width: 576px) {
  
  .navbar-icons .nav-icon {
    margin-bottom: 10px; /* Añade margen inferior para espacio entre íconos */
  }
  .navbar-toggler {
    position: relative;
    z-index: 1; /* Asegura que el toggler esté encima de otros elementos */
  }
  .navbar-collapse {
    position: relative;
    z-index: 0; /* Asegura que los íconos estén debajo del toggler */
  }
}
</style>


  <title>Forrajeria ALITEX</title>
</head>

<body>
  <header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <!-- Logo y Título -->
        <div class="d-flex align-items-center w-100 justify-content-center">
            <a class="navbar-brand" href="modulos.php">
                <img alt="Logo" src="img/alitex.png">
            </a>
            <a class="navbar-brand titulo-completo" href="modulos.php">Forrajeria "ALITEX" Comercializadora Agropecuaria</a>
        </div>
        <!-- Toggler for mobile view -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
       <!-- Íconos de inicio y regresar -->
       <div class="d-flex align-items-center">
                    <div class="navbar-icons">
                        <a href="modulos.php" class="nav-icon">
                            <i class="bi bi-house"></i>
                        </a>
                        <a href="javascript:history.back()" class="nav-icon">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                    </div>


<!-- Formulario de búsqueda y usuario -->
<div class="collapse navbar-collapse" id="navbarContent">
    <div class="d-flex align-items-center ms-auto">
        <?php
            $us = obtenerUsuario($_SESSION["idUsuario"]);
            foreach ($us as $u) {
                echo '
                <div class="dropdown me-3 order-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        ' . $u->usuario . '
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
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
                        <li>
                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#eliminarUsuarioModal">Eliminar Usuario</button>
                        </li>
                    </ul>
                </div>';
            }
        ?>

        <!-- Aquí iría el formulario de búsqueda -->
<form class="d-flex mr-3 flex-grow-1" role="search" action="app.php" method="POST">
  <input class="form-control me-2 flex-grow-1" name="buscar" type="search" placeholder="Buscar" aria-label="Search">
</form>
</div>
</div>

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

<!-- Modal eliminar Usuario -->
<div class="modal fade" id="eliminarUsuarioModal" tabindex="-1" aria-labelledby="eliminarUsuarioModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminarUsuarioModalLabel">Eliminar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="eliminarUsuarioForm" action="eliminar_usuario.php" method="POST">
          <div class="mb-3">
            <label for="usuario_eliminar" class="form-label">Nombre de usuario a eliminar</label>
            <input type="text" class="form-control" name="usuario" id="usuario_eliminar" required>
          </div>
          <div class="mb-3">
            <label for="elim_admin_pass" class="form-label">Contraseña de administrador</label>
            <div class="input-group">
              <input type="password" class="form-control" name="admin_pass" id="elim_admin_pass" required>
              <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('elim_admin_pass', 'toggleElimAdminPass')">
                <i id="toggleElimAdminPass" class="bi bi-eye"></i>
              </button>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Eliminar Usuario</button>
          </div>
        </form>
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
if(!isset($_POST["buscar"]))
{
   $productos = obtenerProductos();
}else
{
  $productos =obtenerProductosBuscar($_POST["buscar"]);
}
            ?>


<section class="contenido wrapper">
    <div class="container position-relative card">
        <div class="card-header">
            <h3>Modificar Stock</h3>
            <?php stockButton() ?>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Artículo</th>
                        <th scope="col">Presentación</th>
                        <th scope="col">Tipo Artículo</th>
                        <th scope="col">Precio Inicial</th>
                        <th scope="col">Precio Final</th>
                        <th scope="col">Unidad Cant.</th>
                        <th scope="col">Límite Descuento</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Detalles</th>
                        <th scope="col" colspan="2" class="text-center">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto) { ?>
                        <tr>
                            <th scope="row"><?php echo $producto->id_articulo ?></th>
                            <td><?php echo $producto->nombre ?></td>
                            <td><?php echo $producto->tamanio ?></td>
                            <td><?php echo $producto->tipoArti ?></td>
                            <td><?php echo $producto->precio_inicial ?></td>
                            <td><?php echo $producto->precio_final ?></td>
                            <td><?php echo $producto->id_unidadVenta ?></td>
                            <td><?php echo $producto->limites_descuento ?></td>
                            <?php
                            $producto->stockMinimo = 15;
                            if ($producto->cantidad <= $producto->stockMinimo) { ?>
                                <td style="color:red"><b><?php echo $producto->cantidad ?></b></td>
                            <?php } else { ?>
                                <td><?php echo $producto->cantidad ?></td>
                            <?php } ?>
                            <td><?php echo $producto->detalles ?></td>
                            <td colspan="2">
                                <form action="stockMcant.php" method="post" class="d-flex flex-column flex-md-row align-items-md-center">
                                    <input type="hidden" name="id_producto" value="<?php echo $producto->id_articulo ?>">
                                    <input type="text" name="stock" class="form-control form-control-sm mb-2 mb-md-0" style="min-width: 100px;">
                                    <button class="btn btn-success btn-sm ms-md-2">Modificar Stock</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php           
include_once "footer.php"; ?>