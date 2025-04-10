<?php include_once "header.php";
$i='false';
if (isset($_POST["categoria"])) {
    $i='true'; 
    $c=$_POST["categoria"];
    echo $c;
} 

?>
<section class="contenido wrapper mt-4">
    <div class="row">
        <div class="col-lg-8 col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <?php categoriaButton(); ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Categoria</th>
                                    <th>Detalles</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $cat = categoria();
                                foreach ($cat as $ct) {
                                    echo '<tr>';
                                    echo '<td>' . htmlspecialchars($ct->id_tipoArt) . '</td>';
                                    echo '<td>' . htmlspecialchars($ct->tipoArti) . '</td>';
                                    echo '<td>' . htmlspecialchars($ct->detalles) . '</td>';
                                    echo '<td>';
                                    echo '<form action="categoriaModificar.php" method="post">';
                                    echo '<input type="hidden" name="categoria" value="' . htmlspecialchars($ct->id_tipoArt) . '">';
                                    echo '<button class="btn btn-secondary btn-sm">Modificar Categoria</button>';
                                    echo '</form>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <h3>Modificar Datos de la Categoría</h3>
                </div>
                <div class="card-body">
                    <form action="categoriaModificarGuardar.php" method="post">
                        <?php 
                        $cat = categoria();
                        foreach ($cat as $ct) {
                            if ($i == 'true' && $c == $ct->id_tipoArt) {
                                $id = $ct->id_tipoArt;
                                $tipo = $ct->tipoArti;
                                $detalles = $ct->detalles;
                            }
                        }
                        ?>
                        <div class="form-group">
                            <label for="tipo">Categoría</label>
                            <input type="text" name="tipo" class="form-control" value="<?php if ($i == 'true') { echo htmlspecialchars($tipo); } ?>" placeholder="Categoría" required>
                        </div>
                        <div class="form-group">
                            <label for="detalles">Detalles</label>
                            <input type="text" name="detalles" class="form-control" value="<?php if ($i == 'true') { echo htmlspecialchars($detalles); } ?>" placeholder="Detalles" required>
                        </div>
                        <input type="hidden" name="ctg" value="<?php echo htmlspecialchars($id); ?>">
                        <div class="d-flex justify-content-between">
                            <a href="categoriaCargar.php" class="btn btn-primary btn-sm">Volver</a>
                            <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>






<?php include_once "footer.php"; ?>