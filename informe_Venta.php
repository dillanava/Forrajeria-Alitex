<?php 
include_once('headertwo.php');
include_once "consultas.php";
$con=0;

if (!isset($_POST["cliente"]) || $_POST["cliente"]==""){
    $cliente="1=2";
    $con++;
} else {
    $cliente ="cliente.apellido like '%".$_POST["cliente"] ."%' OR cliente.nombre like '%".$_POST["cliente"]. "%'";
}

if (!isset($_POST["d"]) || $_POST["d"]==""){
    $descuento="1=2";
    $con++;
} else {
    $descuento="operacion.descuento=".$_POST["d"];
}

if (!isset($_POST["detalles"])|| $_POST["detalles"]==""){
    $detalles="1=2";
    $con++;
} else {
    $detalles="operacion.detalles like '%".$_POST["detalles"] ."%' OR operacion.detalle like '%".$_POST["detalles"]. "%'";
}

if (!isset($_POST["monto"]) || $_POST["monto"]==""){
    $monto='1=2';
    $con++;
} else {
    $monto="operacion.venta=".$_POST["monto"];
}

if (!isset($_POST["tipov"]) || $_POST["tipov"]==""){
    $tipov='1=2';
    $con++;
} else {
    $tipov="operacion.id_tipoVenta=".$_POST["tipov"];
}

if (!isset($_POST["fecha"]) || $_POST["fecha"]==""){
    $fecha='1=2';
    $con++;
} else {
    $fecha="operacion.fecha='".$_POST["fecha"]."'";
}

$sqlB = "SELECT operacion.id_operacion, operacion.venta, operacion.fecha, operacion.descuento, operacion.detalle, "
    ."tipoventa.tipoventa, operacion.detalles, "
    ."cliente.apellido, cliente.nombre "
    ."FROM operacion "
    ."INNER JOIN tipoventa ON operacion.id_tipoVenta=tipoventa.id_tipoventa "
    ."INNER JOIN cliente ON cliente.id_cliente=operacion.id_cliente "
    ."WHERE ". $cliente ." OR ". $descuento ." OR ".$detalles ." OR " .$monto. " OR ". $tipov ." OR ".$fecha;

if ($con == 6) {
    $sqlB = "SELECT operacion.id_operacion, operacion.venta, operacion.fecha, operacion.descuento, operacion.detalle, "
        ."tipoventa.tipoventa, operacion.detalles, "
        ."cliente.apellido, cliente.nombre "
        ."FROM operacion "
        ."INNER JOIN tipoventa ON operacion.id_tipoVenta=tipoventa.id_tipoventa "
        ."INNER JOIN cliente ON cliente.id_cliente=operacion.id_cliente";
}

$a = false;
if (!isset($_GET["inf"])) {
    $ventas = informeVenta();
    $mensaje = "Ventas ";
} elseif ($_GET["inf"] == "inf") {
    $ventas = informeVenta();
    $mensaje = "Ventas ";
} elseif ($_GET["inf"] == "D") {
    $ventas = informeVentaDiaria();
    $mensaje = "Ventas Diarias  ".date('d-m-Y H:i:s');
} elseif ($_GET["inf"] == "Ms") {
    $ventas = informeVentaMes();
    $mensaje = "Ventas Diarias  ".date('M');
} elseif ($_GET["inf"] == "Gnr") {
    $ventas = informeVentaGeneral($sqlB);
    $mensaje = "Ventas ";
    $a = true;
}
?>

<section class="contenido wrapper">
    <div class="container position-relative card mb-3">
        <div class="card-header">
            <h3>Informes de Ventas</h3>
        </div>
        <form action="informe_Venta.php?inf=Gnr" method="post">
            <div class="p-3">
                <?php if ($a == true) { ?>
                    <div class="row mb-2">
                        <div class="col-12 col-md-3 mb-2">
                            <input type="text" class="form-control" placeholder="Buscar cliente" name="cliente">
                        </div>
                        <div class="col-12 col-md-3 mb-2">
                            <input type="date" class="form-control" placeholder="Fecha" name="fecha">
                        </div>
                        <div class="col-12 col-md-3 mb-2">
                            <input type="text" class="form-control" placeholder="Buscar Descuento" name="d">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12 col-md-4 mb-2">
                            <input type="text" class="form-control" placeholder="Buscar Detalles" name="detalles">
                        </div>
                        <div class="col-12 col-md-4 mb-2">
                            <select class="form-control" name="tipov">
                                <option value="">Seleccionar</option>
                                <?php
                                    $pagos = tipopago();
                                    foreach ($pagos as $pago) {
                                ?> 
                                <option value="<?php echo $pago->id_tipoventa ?>"><?php echo $pago->tipoventa ."--". $pago->interes?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-4 mb-2">
                            <input type="text" class="form-control" placeholder="Monto de Compra" name="monto">
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mb-2">
                        <button class="btn btn-primary btn-block">Buscar</button>
                    </div>
                <?php } ?>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <th colspan="8" class="text-center"><?php echo $mensaje; ?></th>
                    </tr>
                    <tr>
                        <th>id_operacion</th>
                        <th>venta</th>
                        <th>fecha</th>
                        <th>descuento</th>
                        <th>detalle</th>
                        <th>tipoventa</th>
                        <th>detalles</th>
                        <th>Cliente</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $bd = obtenerConexion();
                        iniciarSesionSiNoEstaIniciada();
                        foreach ($ventas as $venta) {
                    ?>
                    <tr>
                        <td><?php echo $venta->id_operacion ?></td>
                        <td><?php echo $venta->venta ?></td>
                        <td><?php echo $venta->fecha ?></td>
                        <td><?php echo $venta->descuento ?></td>
                        <td><?php echo $venta->detalle ?></td>
                        <td><?php echo $venta->tipoventa ?></td>
                        <td><?php echo $venta->detalles ?></td>
                        <td><?php echo $venta->apellido . ", " . $venta->nombre ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include_once "footer.php"; ?>
