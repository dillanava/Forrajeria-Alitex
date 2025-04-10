<?php 
session_start();
include_once('header.php'); ?>

<section class="contenido wrapper">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Nuevo Producto</h2>
                <div class="d-none d-md-block"> <!-- Oculto en dispositivos menores a md (tablets y móviles) -->
                    <?php productosButton() ?>
                </div>
            </div>
            <div class="card-body">
                <form action="stockIngresar.php" method="post">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <tbody>  
                                <tr>
                                    <td colspan="2">Nombre Artículo</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input required id="nombre" type="text" placeholder="Nombre" name="nombre" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Presentación</td>
                                    <td>
                                        <input required id="presentacion" type="text" placeholder="Presentación" name="presentacion" class="form-control">
                                        <select class="form-control mt-2" name="unidad">
                                        <option value="">--- Seleccione Presentación---</option>
                                            <?php
                                            $uni = unidadMedida();
                                            foreach ($uni as $c) { 
                                                ?>
                                                <option value="<?php echo $c->id_unidad ?>"><?php echo $c->umedida ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Seleccione Categoría</td>
                                    <td>Perecedero</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-control" name="categoria">
                                            <option value="">--- Seleccione ---</option>
                                            <?php
                                            $catg = categoria();
                                            foreach ($catg as $categoria_art) { 
                                                ?>
                                                <option value="<?php echo $categoria_art->id_tipoArt ?>"><?php echo $categoria_art->tipoArti ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="caducidad" id="caducidad_si" value="si">
                                            <label class="form-check-label" for="caducidad_si">Sí</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="caducidad" id="caducidad_no" value="no">
                                            <label class="form-check-label" for="caducidad_no">No</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Precio Inicial</td>
                                    <td>Precio Final</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input required id="precioinicial" name="precioinicial" type="number" placeholder="Precio inicial" class="form-control">
                                        <input required id="porcentaje" name="porcentaje" type="number" placeholder="%" class="form-control mt-2" value="">
                                        <button type="button" class="btn btn-primary btn-sm mt-2" onclick="Sumar()">Calcular</button>
                                    </td>
                                    <td>
                                        <input required id="preciofinal" name="preciofinal" type="number" placeholder="Precio Final" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Límite Descuento</td>
                                    <td>Unidad/Cantidad de Venta</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input required id="desceunto" name="descuento" type="number" placeholder="Descuento" class="form-control">
                                    </td>
                                    <td>
                                        <select class="form-control" name="unidadcantidad">
                                        <option value="">--- Seleccione unidad/cantidad ---</option>
                                            <?php
                                            $cnt = cantidad();
                                            foreach ($cnt as $cant) { 
                                                ?>
                                                <option value="<?php echo $cant->id ?>"><?php echo $cant->unidadVenta ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <textarea name="detalles" rows="5" class="form-control" placeholder="Detalles" required></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body d-flex justify-content-between align-items-center">
                        <input type="hidden" name="stock" value="1">
                        <a href="productos.php" class="btn btn-primary">Volver</a>                 
                        <button type="submit" class="btn btn-success">Guardar</button>	
                    </div>
                </form>
                <div class="d-block d-md-none text-center mt-3"> <!-- Visible solo en dispositivos menores a md (tablets y móviles) -->
                    <?php productosButton() ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function Sumar() {
        var precio = Number(document.getElementById('precioinicial').value);
        var porcentaje = Number(document.getElementById('porcentaje').value);
        var result = precio * porcentaje / 100 + precio;
        document.getElementById('preciofinal').value = Math.ceil(result);
    }
</script>
<?php include_once('footer.php'); ?>