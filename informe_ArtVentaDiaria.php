<?php
session_start();
include_once "headerthree.php";
include_once "consultas.php";
$m=0;
$con=0;
//----------------------------------------

	$ventasArt = informeArtVentaDiaria();
    $_SESSION["g-d"][0] =TRUE;
   
	?>

<section class="contenido wrapper">
    <div class="container position-relative card mb-3">
        <div class="card-header">
            <h3>Informes de Ventas</h3>
            <?php //appInformeArticuloVent();
            //appInformeArticuloVent(); 
            ?>
        </div>
    </div>

    <div class="container position-relative card mb-3">
        <div class="card-body">
            <form action="mostrarGrafico.php" method="post" target="_blank">
                <button class="btn btn-primary mb-3">Grafico</button>
            </form>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Articulo</th>
                            <th>Presentacion</th>
                            <th>Precio Inicial</th>
                            <th>Precio Final</th>
                            <th>Cantidad Vendida</th>
                            <th>Venta Precio Inicial</th>
                            <th>Venta Precio Final</th>
                            <th>Ganancia Marginal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($ventasArt as $venta) {
                        ?>
                        <tr>
                            <td><?php echo $venta->id?></td>
                            <td><?php echo $venta->nombre?></td>
                            <td><?php echo $venta->tamanio;?></td>
                            <td><?php echo $venta->precio_inicial;?></td>
                            <td><?php echo $venta->precio_final;?></td>
                            <td><?php echo $venta->totalc;?></td>
                            <td><?php echo $venta->totalInicial;?></td>
                            <td><?php echo $venta->totalFinal;?></td>
                            <td><?php echo $venta->GananciaTotal;?></td>
                        </tr>
                        <?php 
                        } 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php include_once"footer.php";