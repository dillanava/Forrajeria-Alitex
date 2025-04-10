<?php include_once "header.php";
?>


<section class="contenido wrapper mt-4">
    <form action="categoriaGuardar.php" method="post">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <?php categoriButton(); ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Categoria</th>
                                        <th>Detalles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $cat = categoria();
                                    foreach ($cat as $c) {
                                        echo '<tr>';
                                        echo '<td>' . htmlspecialchars($c->id_tipoArt) . '</td>';
                                        echo '<td>' . htmlspecialchars($c->tipoArti) . '</td>';
                                        echo '<td>' . htmlspecialchars($c->detalles) . '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        Ingresar Nueva Categoría
                    </div>
                    <div class="card-body">
                        <form action="categoriaGuardar.php" method="post">
                            <div class="form-group">
                                <label for="categoria">Categoría</label>
                                <input type="text" name="categoria" class="form-control" placeholder="Categoría" required>
                            </div>
                            <div class="form-group">
                                <label for="detalles">Detalles</label>
                                <input type="text" name="detalles" class="form-control" placeholder="Detalles" required>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="categoriaCarga.php" class="btn btn-primary btn-sm">Volver</a>
                                <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>       
    </form>
</section>




<?php include_once "footer.php"; ?>