<?php
session_start();
include_once "headerthree.php";
include_once('funciones.php');
include_once "consultas.php";
$m=0;
if(isset($_POST["month"])) {
        $m=$_POST["month"];
       if(isset($_POST["anio"])){
            $ventasArt = informeArtVentaMes($_POST["month"],$_POST["anio"]);
            $_SESSION["g-mes"][2] = TRUE;
            $_SESSION["g-mes"][0] = $_POST["month"];
            $_SESSION["g-mes"][1] = $_POST["anio"];
       } else {
            $ventasArt = informeArtVentaMes($_POST["month"],date("Y"));
            $_SESSION["g-mes"][2] = TRUE;
            $_SESSION["g-mes"][0] = $_POST["month"];
            $_SESSION["g-mes"][1] = date("Y");
       }
} else {
        echo date("Y");
        $ventasArt = informeArtVentaMes(date('m'),date("Y"));        
        $_SESSION["g-mes"][2] = TRUE;
        $_SESSION["g-mes"][0] = date('m');
        $_SESSION["g-mes"][1] = date("Y");
}
?>
<section class="contenido wrapper">
    <div class="container position-relative card mb-3">
        <div class="card-header">
            <h3>Informes de Ventas</h3>
            <?php 
            //appInformeArticuloVent(); 
            ?>
        </div>
        <div class="card-body">
            <form method="POST" action="informe_ArtVentaMes.php">
                <div class="form-group row mb-2">
                    <label for="anio" class="col-form-label col-4">Año:</label>
                    <div class="col-8">
                        <input required type="text" class="form-control" id="anio" name="anio" value="<?php echo date("Y"); ?>">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="month" class="col-form-label col-4">Mes:</label>
                    <div class="col-8">
                        <select id="month" class="form-control" name="month" onchange="this.form.submit()">
                            <option value="01" <?php if($m=="01"){ echo "selected";}?>>Enero</option>
                            <option value="02" <?php if($m=="02"){ echo "selected";}?>>Febrero</option>
                            <option value="03" <?php if($m=="03"){ echo "selected";}?>>Marzo</option>
                            <option value="04" <?php if($m=="04"){ echo "selected";}?>>Abril</option>
                            <option value="05" <?php if($m=="05"){ echo "selected";}?>>Mayo</option>
                            <option value="06" <?php if($m=="06"){ echo "selected";}?>>Junio</option>
                            <option value="07" <?php if($m=="07"){ echo "selected";}?>>Julio</option>
                            <option value="08" <?php if($m=="08"){ echo "selected";}?>>Agosto</option>
                            <option value="09" <?php if($m=="09"){ echo "selected";}?>>Septiembre</option>
                            <option value="10" <?php if($m=="10"){ echo "selected";}?>>Octubre</option>
                            <option value="11" <?php if($m=="11"){ echo "selected";}?>>Noviembre</option>
                            <option value="12" <?php if($m=="12"){ echo "selected";}?>>Diciembre</option>    
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>

   <div class="container position-relative card mb-3">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-light">
            <form action="mostrarGrafico.php" method="post" target="_blank">
                <input type="hidden" name="d" value="InfArtMes">
                <input type="hidden" name="m" value="<?php echo $m; ?>">
                <input type="hidden" name="a" value="<?php echo date("Y"); ?>">
                <button class="btn btn-primary">Grafico</button>
            </form>
                <tr>
                    <th></th>
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
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</section>

<?php include_once "footer.php"; ?>
