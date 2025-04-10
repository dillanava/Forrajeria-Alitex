<?php include_once "headerthree.php";
include_once('funciones.php');
include_once "consultas.php";
$m=0;
$fI="";
$fF="";
if(isset($_POST["fInicio"])  && isset($_POST["fFinal"])) 
{
    $fI=$_POST["fInicio"];
    $fF=$_POST["fFinal"];
    $_SESSION["g-i-f"][2]=TRUE;
    $_SESSION["g-i-f"][0]=$fI;
    $_SESSION["g-i-f"][1]= $fF;

    $ventasArt=informeArtVentaGeneralEF($fI,$fF);

} else {
    $ventasArt = informeArtVentaMes(date('m'), date("Y"));        
}
?>
<section class="contenido wrapper">
    <div class="container position-relative card mb-3">
        <div class="card-header">
            <h3>Informes de Ventas</h3>
            <?php //appInformeArticuloVent(); ?>
        </div>
        <div class="card-body">
            <?php echo $fI; ?>
            <form method="POST" action="informe_ArtVentaGeneral.php">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="fInicio">Primer fecha a consultar:</label>
                        <input type="date" id="fInicio" name="fInicio" class="form-control"
                            value="<?php if(isset($_POST["fInicio"])) { echo $_POST["fInicio"]; } ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="fFinal">Segunda fecha a consultar:</label>
                        <input type="date" id="fFinal" name="fFinal" class="form-control"
                            value="<?php if(isset($_POST["fFinal"])) { echo $_POST["fFinal"]; } ?>">
                    </div>
                </div>
                <button class="btn btn-primary btn-block">Consulta</button>
            </form>
        </div>
    </div>

    <div class="container position-relative card">
        <div class="card-body">
            <form action="mostrarGrafico.php" method="post" target="_blank">
                <button class="btn btn-primary btn-block">Grafico</button>
            </form>
            <div class="table-responsive mt-3">
                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Articulo</th>
                            <th>Presentacion</th>
                            <th>Precio Inicial</th>
                            <th>Precio Final</th>
                            <th>Cantidad Vendida</th>
                            <th>Venta precio Inicial</th>
                            <th>Venta Precio Final</th>
                            <th>Ganancia Marginal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //$ventas = informeVenta();
                        $bd = obtenerConexion();
                        iniciarSesionSiNoEstaIniciada();

                        foreach ($ventasArt as $venta) {
                        ?>
                        <tr>
                            <td><?php echo $venta->id ?></td>
                            <td><?php echo $venta->nombre ?></td>
                            <td><?php echo $venta->tamanio; ?></td>
                            <td><?php echo $venta->precio_inicial; ?></td>
                            <td><?php echo $venta->precio_final; ?></td>
                            <td><?php echo $venta->totalc; ?></td>
                            <td><?php echo $venta->totalInicial; ?></td>
                            <td><?php echo $venta->totalFinal; ?></td>
                            <td><?php echo $venta->GananciaTotal; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php include_once "footer.php"; ?>
