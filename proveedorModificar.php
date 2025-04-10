<?php include_once "header.php";
$i='false';
if (isset($_POST["prov"])) {
    $i='true'; 
    $c=$_POST["prov"];
} 

?>
    <section class="contenido wrapper mt-4">
    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <?php proveedoressButton(); ?>
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
                                    <th></th>
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
                                    ?>
                                    <td>
                                        <form action="proveedorModificar.php" method="post">
                                            <input type="hidden" name="prov" value="<?php echo htmlspecialchars($p->id_proveedor); ?>">
                                            <button class="btn btn-success btn-sm">Modificar</button>
                                        </form>
                                    </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <h3>Modificar Datos de Proveedor</h3>
                </div>
                <div class="card-body">
                    <form action="proveedorModificarGuardar.php" method="post">
                        <?php 
                        $proveedor = obtenerproveedor();
                        foreach ($proveedor as $p) {
                            if ($i == "true" && $c == $p->id_proveedor) {
                                $id = htmlspecialchars($p->id_proveedor);
                                $rubro = htmlspecialchars($p->rubro);
                                $nombre = htmlspecialchars($p->nombre);
                                $telefono = htmlspecialchars($p->telefono);
                                $mail = htmlspecialchars($p->mail);
                                $direccion = htmlspecialchars($p->direccion);
                                $localidad = htmlspecialchars($p->localidad);
                            }
                        }
                        ?>
                        <div class="form-group">
                            <label for="empresa">Empresa</label>
                            <input type="text" name="empresa" class="form-control" value="<?php echo $i == 'true' ? $nombre : ''; ?>" placeholder="Nombre Empresa" required>
                        </div>
                        <div class="form-group">
                            <label for="rubro">Rubro Empresa</label>
                            <input type="text" name="rubro" class="form-control" value="<?php echo $i == 'true' ? $rubro : ''; ?>" placeholder="Rubro Empresa" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" name="telefono" class="form-control" value="<?php echo $i == 'true' ? $telefono : ''; ?>" placeholder="Teléfono Empresa" required>
                        </div>
                        <div class="form-group">
                            <label for="mail">Mail</label>
                            <input type="email" name="mail" class="form-control" value="<?php echo $i == 'true' ? $mail : ''; ?>" placeholder="Mail Empresa" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección Empresa</label>
                            <input type="text" name="direccion" class="form-control" value="<?php echo $i == 'true' ? $direccion : ''; ?>" placeholder="Dirección Empresa" required>
                        </div>
                        <div class="form-group">
                            <label for="localidad">Localidad</label>
                            <input type="text" name="localidad" class="form-control" value="<?php echo $i == 'true' ? $localidad : ''; ?>" placeholder="Localidad Empresa" required>
                        </div>
                        <input type="hidden" name="c" value="<?php echo htmlspecialchars($id); ?>">
                        <a href="proveedorCargar.php" class="btn btn-primary btn-sm">Volver</a>
                        <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>






<?php include_once "footer.php"; ?>