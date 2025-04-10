<?php
include_once "funciones.php";
$a=0;
$existe=ProductosEnPedido();
foreach($existe as $E){
    $a++;
}
$proveedor=$_POST["proveedor"];

if($a==0){
    echo "Debe seleccionar algún artículo para realizar el pedido. <a href='pedido.php'>Aquí</a>";
}else{
    ingresarOperacionPedido($proveedor);
    $oper=operacionPedido();
    foreach($oper as $E){
        $operacion=$E->id_operacionPedido;
    }
    $existe=ProductosEnPedido();
    foreach($existe as $E){
        ingresarPedido($operacion,$E->id_articulo,$E->cantidad);
    } 
    borrarPedidoCar();
}

include_once("header.php");
?>
<section class="contenido wrapper">
  <div class="container position-relative card">
    <div class="row"> 
      <div class="card-header" align="center">
        <h3>Imprimir</h3>
      </div> 
      <div class="card-body" align="center">
        <form action="imprimirPedido.php" method="post" target="_blank">
          <input type="hidden" name="op" value="<?php echo $operacion; ?>">
          <button class="btn btn-primary btn btn-sm">Imprimir Pedido</button>
        </form>
      </div>
      <div class="card-footer" align="center">
        <form action="pedido.php" method="post">
          <input type="hidden" name="op" value="<?php echo $operacion; ?>">
          <button class="btn btn-primary btn btn-sm">Continuar Con El Pedido</button>
        </form>
      </div>
    </div>
  </div>
</section>
<?php include_once("footer.php"); ?>
