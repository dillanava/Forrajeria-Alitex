<?php
session_start();
include_once("header.php");
?>

<section class="contenido wrapper">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Realizar Pedido</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Articulo</th>
                            <th scope="col">Presentacion</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Precio Inicial</th>
                            <th scope="col">Precio final</th>
                            <th scope="col">En stock</th>
                            <th scope="col">Stock Minimo</th>
                            <th scope="col">Proveedor</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Proveedor y Pedido</th> <!-- Nueva columna -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stocks = stockPedido();
                        foreach ($stocks as $sk) {
                        ?>
                        <tr>
                            <td><?php echo $sk->id_articulo; ?></td>
                            <td><?php echo $sk->nombre; ?></td>
                            <td><?php echo $sk->tamanio; ?></td>
                            <td><?php echo $sk->tipoArti; ?></td>
                            <td><?php echo $sk->precio_inicial; ?></td>
                            <td><?php echo $sk->precio_final; ?></td>
                            <td style="<?php echo $sk->diferencia < 0 ? 'color:red;' : ''; ?>"><b><?php echo $sk->cantidad; ?></b></td>
                            <td><?php echo $sk->stockMinimo; ?></td>
                            <td><?php echo $sk->proveedor; ?></td>
                            <td>
                                <?php if (!productoYaEstaEnPedidoo($sk->id_articulo)) { ?>
                                    <form action="agregar_al_pedido.php" method="post">
                                        <div class="form-group mb-0">
                                            <input type="number" id="cant_art" name="cant_art" required class="form-control form-control-sm" placeholder="Cantidad">
                                            <input type="hidden" name="id_articulo" value="<?php echo $sk->id_articulo; ?>">
                                        </div>
                                        <button type="submit" class="btn btn-secondary btn-sm mt-2">
                                            <i class="fa fa-cart-plus"></i>&nbsp;Solicitar
                                        </button>
                                    </form>
                                <?php } else { ?>
                                    <form action="eliminar_del_pedido.php" method="post">
                                        <input type="hidden" name="id_articulo" value="<?php echo $sk->id_articulo; ?>">
                                        <span class="btn btn-success btn-sm">
                                            <i class="fa fa-check"></i>&nbsp;En el carrito
                                        </span>
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o"></i>&nbsp;Quitar
                                        </button>
                                    </form>
                                <?php } ?>
                            </td>
                            <td>
                                <form action="registarPedido.php" method="post">
                                    <div class="form-group mb-0">
                                        <select name="proveedor" class="form-control form-control-sm">
                                            <?php
                                            $p = obtenerproveedor();
                                            foreach ($p as $oP) {
                                                echo '<option value="'.$oP->id_proveedor.'">'.$oP->nombre."-".$oP->localidad.'</option>';
                                            }
                                            ?>
                                        </select>
                                        <button type="submit" class="btn btn-success btn-sm mt-2">
                                            Realizar Pedido
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php
include_once("footer.php");
?>
