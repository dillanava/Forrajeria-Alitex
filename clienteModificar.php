<?php include_once "header.php";
$i = 'false';
if (isset($_POST["cliente"])) {
    $i = 'true'; 
    $c = $_POST["cliente"];
    echo $c;
} 
?>
<section class="contenido wrapper mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <?php clientButton(); ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Apellido</th>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Correo Electrónico</th>
                                        <th>Dirección</th>
                                        <th>Localidad</th>
                                        <th>Estado</th>
                                        <th>Modificar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $proveedor = cliente();
                                    foreach($proveedor as $p) {
                                        echo '<tr>';
                                        echo '<td>'.$p->id_cliente.'</td>';
                                        echo '<td>'.$p->apellido.'</td>'; 
                                        echo '<td>'.$p->nombre.'</td>';
                                        echo '<td>'.$p->telefono.'</td>';
                                        echo '<td>'.$p->email.'</td>';
                                        echo '<td>'.$p->direccion.'</td>';
                                        echo '<td>'.$p->localidad.'</td>';
                                        echo '<td>'.$p->estado.'</td>';
                                    ?>
                                    <td>
                                        <form action="clienteModificar.php" method="post">               
                                            <input type="hidden" name="cliente" value="<?php echo $p->id_cliente ?>">
                                            <button class="btn btn-secondary btn-sm">Modificar Cliente</button> 
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
            <div class="col-lg-2">
                <div class="card">
                    <div class="card-header">
                        <h3>Modificar Datos de Cliente</h3>
                    </div>
                    <div class="card-body">
                        <form action="clienteModificarGuardar.php" method="post">
                            <?php 
                            $proveedor = cliente();
                            foreach($proveedor as $p) {
                                if ($i == 'true' && $c == $p->id_cliente) {
                                    $id = $p->id_cliente;
                                    $apellido = $p->apellido; 
                                    $nombre = $p->nombre;
                                    $telefono = $p->telefono;
                                    $email = $p->email;
                                    $direccion = $p->direccion;
                                    $localidad = $p->localidad;
                                    $estado = $p->estado; // Agregado
                                }
                            }
                            ?>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido" class="form-control" placeholder="Apellido" value="<?php if ($i=='true') { echo $apellido; } ?>">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?php if ($i=='true') { echo $nombre; } ?>">
                            </div>    
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" name="telefono" class="form-control" placeholder="Teléfono" value="<?php if ($i=='true') { echo $telefono; } ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" name="email" class="form-control" placeholder="Correo Electrónico" value="<?php if ($i=='true') { echo $email; } ?>">
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" name="direccion" class="form-control" placeholder="Dirección" value="<?php if ($i=='true') { echo $direccion; } ?>">
                            </div>
                            <div class="form-group">
                                <label for="localidad">Localidad</label>
                                <input type="text" name="localidad" class="form-control" placeholder="Localidad" value="<?php if ($i=='true') { echo $localidad; } ?>">
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select name="estado" class="form-control" required>
                                    <option value="" selected disabled>Selecciona un estado</option>
                                    <option value="Aguascalientes">Aguascalientes</option>
                                    <option value="Baja California">Baja California</option>
                                    <option value="Baja California Sur">Baja California Sur</option>
                                    <option value="Campeche">Campeche</option>
                                    <option value="Chiapas">Chiapas</option>
                                    <option value="Chihuahua">Chihuahua</option>
                                    <option value="Coahuila">Coahuila</option>
                                    <option value="Colima">Colima</option>
                                    <option value="Ciudad de México">Ciudad de México</option>
                                    <option value="Durango">Durango</option>
                                    <option value="Guanajuato">Guanajuato</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Hidalgo">Hidalgo</option>
                                    <option value="Jalisco">Jalisco</option>
                                    <option value="Estado de México">Estado de México</option>
                                    <option value="Michoacán">Michoacán</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Nayarit">Nayarit</option>
                                    <option value="Nuevo León">Nuevo León</option>
                                    <option value="Oaxaca">Oaxaca</option>
                                    <option value="Puebla">Puebla</option>
                                    <option value="Querétaro">Querétaro</option>
                                    <option value="Quintana Roo">Quintana Roo</option>
                                    <option value="San Luis Potosí">San Luis Potosí</option>
                                    <option value="Sinaloa">Sinaloa</option>
                                    <option value="Sonora">Sonora</option>
                                    <option value="Tabasco">Tabasco</option>
                                    <option value="Tamaulipas">Tamaulipas</option>
                                    <option value="Tlaxcala">Tlaxcala</option>
                                    <option value="Veracruz">Veracruz</option>
                                    <option value="Yucatán">Yucatán</option>
                                    <option value="Zacatecas">Zacatecas</option>
                                </select>
                            </div>
                            <input type="hidden" name="cliente" value="<?php echo $id; ?>">
                            <div class="form-group">
                                <button class="btn btn-success btn-sm">Guardar Cliente</button>
                                <a href="clienteModificar.php" class="btn btn-primary btn-sm">Volver</a>
                            </div>    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "footer.php"; ?>
