<?php include_once "header.php";
?>


<section class="contenido wrapper mt-4">
    <form action="proveedorGuardar.php" method="post">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <?php proveedoresButton(); ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nombre Empresa</th>
                                        <th>Rubro</th>
                                        <th>Teléfono</th>
                                        <th>Mail</th>
                                        <th>Dirección</th>
                                        <th>Localidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $proveedor = obtenerproveedor();
                                    foreach ($proveedor as $p) {
                                        echo '<tr>';
                                        echo '<td>' . htmlspecialchars($p->id_proveedor) . '</td>';
                                        echo '<td>' . htmlspecialchars($p->nombre) . '</td>';
                                        echo '<td>' . htmlspecialchars($p->rubro) . '</td>';
                                        echo '<td>' . htmlspecialchars($p->telefono) . '</td>';
                                        echo '<td>' . htmlspecialchars($p->mail) . '</td>';
                                        echo '<td>' . htmlspecialchars($p->direccion) . '</td>';
                                        echo '<td>' . htmlspecialchars($p->localidad) . '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        Ingresar Nuevo Proveedor
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <tr><td>Empresa</td></tr>
                                <tr><td><input required type="text" name="empresa" class="form-control" placeholder="Nombre Empresa"></td></tr>
                                <tr><td>Rubro Empresa</td></tr>
                                <tr><td><input required type="text" name="rubro" class="form-control" placeholder="Rubro Empresa"></td></tr>
                                <tr><td>Teléfono</td></tr>
                                <tr><td><input required type="text" name="telefono" class="form-control" placeholder="Teléfono Empresa"></td></tr>
                                <tr><td>Mail</td></tr>
                                <tr><td><input required type="email" name="mail" class="form-control" placeholder="Mail Empresa"></td></tr>
                                <tr><td>Dirección Empresa</td></tr>
                                <tr><td><input required type="text" name="direccion" class="form-control" placeholder="Dirección Empresa"></td></tr>
                                <tr><td>Localidad</td></tr>
                                <tr><td><input required type="text" name="localidad" class="form-control" placeholder="Localidad Empresa"></td></tr>
                                <tr>
                                    <td>
                                        <a href="proveedorCargar.php" class="btn btn-primary btn-sm">Volver</a>
                                        <input type="submit" value="Guardar" class="btn btn-success btn-sm">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
    </form>
</section>




<?php include_once "footer.php"; ?>