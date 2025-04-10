<?php include_once('header.php'); ?>
<div class="container">
<section class="contenido wrapper" id="primera-seccion">
    <div class="container position-relative card mt-4">
        <div class="card-header">
            <h3>Movimientos en Cuenta</h3>
            <form method="GET" action="">
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="id" class="form-label">ID:</label>
                        <input type="text" name="id" id="id" class="form-control" value="<?php echo isset($_GET['id']) ? htmlspecialchars($_GET['id']) : ''; ?>">
                    </div>
                    <div class="col-md-2">
                        <label for="apellido" class="form-label">Apellido:</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" value="<?php echo isset($_GET['apellido']) ? htmlspecialchars($_GET['apellido']) : ''; ?>">
                    </div>
                    <div class="col-md-2">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : ''; ?>">
                    </div>
                    <div class="col-md-2">
                        <label for="monto" class="form-label">Monto:</label>
                        <input type="number" name="monto" id="monto" class="form-control" value="<?php echo isset($_GET['monto']) ? htmlspecialchars($_GET['monto']) : ''; ?>">
                    </div>
                    <div class="col-md-2">
                        <label for="fecha" class="form-label">Fecha:</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo isset($_GET['fecha']) ? htmlspecialchars($_GET['fecha']) : ''; ?>">
                    </div>
                    <div class="col-md-2">
                        <label for="usuario" class="form-label">Usuario:</label>
                        <input type="text" name="usuario" id="usuario" class="form-control" value="<?php echo isset($_GET['usuario']) ? htmlspecialchars($_GET['usuario']) : ''; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive mt-4">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Monto (+Ingreso, -Deuda)</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $id = isset($_GET['id']) ? $_GET['id'] : '';
                        $apellido = isset($_GET['apellido']) ? $_GET['apellido'] : '';
                        $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
                        $monto = isset($_GET['monto']) ? $_GET['monto'] : '';
                        $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : '';
                        $usuario = isset($_GET['usuario']) ? $_GET['usuario'] : '';

                        $estados = estadosCuentasMovimientos($id, $apellido, $nombre, $monto, $fecha, $usuario);
                        foreach ($estados as $estado) { ?>
                            <tr>
                                <th scope="row"><?php echo htmlspecialchars($estado->id_cliente); ?></th>
                                <td><?php echo htmlspecialchars($estado->apellido); ?></td>
                                <td><?php echo htmlspecialchars($estado->nombre); ?></td>
                                <td><?php echo htmlspecialchars(-1 * $estado->monto); ?></td>
                                <td><?php echo htmlspecialchars($estado->fecha); ?></td>
                                <td><?php echo htmlspecialchars($estado->apUser . ", " . $estado->nomUser); ?></td>
                            </tr>
                        <?php } ?>        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
</div>
<?php include_once "footer.php"; ?>
