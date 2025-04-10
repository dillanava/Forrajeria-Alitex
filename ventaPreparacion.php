<?php 
session_start();
include_once('header.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Incluye SweetAlert2 -->
<section class="contenido wrapper">
  <div class="container position-relative card">
    <div class="card-header">
      <ul class="nav nav-pills card-header-pills">
        <li class="nav-item">
          <a class="nav-link active" href="#">Carrito</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="productos.php#">Productos</a>
        </li>
      </ul>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Artículo</th>
            <th scope="col">Presentación</th>
            <th scope="col">Categoría</th>
            <th scope="col">Precio</th>
            <th scope="col">Unidad Cant</th>
            <th scope="col">Límite Descuento</th>
            <th scope="col">Stock</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Sub Total</th>
            <th scope="col">Sub Con Descuento</th>
            <th scope="col">Aplicar Descuento</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $Total=0;
            $text=0;
            $productos = obtenerProductos();
            foreach ($productos as $producto) {
              foreach ($_SESSION["carrito"] as list($a, $b)) {
                if ($producto->id_articulo==$a) {
                  $Total += $producto->precio_final * $b;
                  $text++;
                  ?>
                  <tr>
                    <th scope="row" align="center"><?php echo $producto->id_articulo ?></th>
                    <td><?php echo $producto->nombre ?></td>
                    <td><?php echo $producto->tamanio ?></td>
                    <td><?php echo $producto->tipoArti ?></td>
                    <td><?php echo "$".$producto->precio_inicial;?></td>
                    <td><?php echo $producto->id_unidadVenta ?></td>
                    <td><?php echo "%".$producto->limites_descuento ?></td>
                    <td><?php echo $producto->cantidad ?></td>
                    <td align="center"><?php echo  $b ?></td>
                    <td><?php echo  $producto->precio_final * $b;?></td>
                    <script type="text/javascript">
                      var i;
                      var precio=0;
                      var porcentaje=0;
                      var result;
                      var acum=0;
                      var totaldesc=<?php echo $Total; ?>;
                      
                      function Sumar(id){
                        i=id;
                        precio=Number(document.getElementById('precio'+id).value);
                        porcentaje=Number(document.getElementById('porcentaje'+id).value);
                        result=precio-precio*porcentaje/100;
                        res=precio*porcentaje/100;
                        acum+= res;
                        t=totaldesc-acum;
                        document.getElementById('porcentaje'+id).value=0;
                        document.getElementById('precio'+id).value=result;
                        document.getElementById('total').value=acum;
                        document.getElementById('totaldesc').value=t;
                        return result;
                      }
                    </script>
                    <td><input type="text" size="6px" id="precio<?php echo $text ?>" value="<?php echo $b * $producto->precio_final ?>" disabled="disabled"></td>
                    <td><input type="text" size="2px" id="porcentaje<?php echo $text ?>" value="0"></td>  
                    <td><input type="button" onclick="Sumar(<?php echo $text ?>)" name="suma" value="Calcular" class="btn btn-secondary btn-sm"></td>
                    <td>
                      <form action="carritoEliminar.php" method="post">               
                        <input type="hidden" name="id_producto" value="<?php echo $producto->id_articulo; ?>">
                        <input type="hidden" name="redireccionar_carrito" value="1">
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                      </form>
                    </td>
                  </tr> 
                  <?php    
                }
              }
            }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="1" class="is-size-4 has-text-right"><strong>Total</strong></td>
            <td colspan="2" class="is-size-4"><?php echo number_format($Total, 2) ?></td>
            <td></td>                    
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</section>
<br>
<section>
  <div class="container position-relative card">
    <div class="card-header">
      <?php nuevoCliente(); ?>
    </div>
    <form action="ventaTerminar.php" method="post" id="ventaForm">
      <div class="card-body">
        <h5 class="card-title">Artículos Seleccionados</h5>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Seleccionar Cliente</th>
                <th colspan="4">Seleccionar Forma de Pago</th>
              </tr>
            </thead>
            <tbody>
              <tr>     
                <th>
                  <select name="cliente" size="1" class="form-control">
                    <?php
                    $Clientes = cliente();
                    foreach ($Clientes as $cliente) {?> 
                      <option value=<?php echo $cliente->id_cliente ?>><?php echo $cliente->apellido .", ".$cliente->nombre ?></option>
                    <?php } ?>
                  </select>
                </th>
                <th colspan="3">
                  <?php
                  $pagos = tipopago();
                  foreach ($pagos as $pago) {
                    if (in_array($pago->id_tipoventa, [1, 2, 3])) { ?> 
                      <input required type="radio" name="tipov" value="<?php echo $pago->id_tipoventa ?>" 
                        <?php echo $pago->id_tipoventa == 1 ? "checked" : "" ?> id="<?php echo $pago->id_tipoventa ?>">
                      <label for="<?php echo $pago->id_tipoventa ?>">
                        <img src="img/<?php echo ($pago->id_tipoventa == 1) ? "efectivo.png" : (($pago->id_tipoventa == 2) ? "tarjeta.png" : "cuentacorriente.png") ?>" width="40" height="40" align="top">
                      </label>
                    <?php }
                  } ?>
                </th>
              </tr>
              <tr>
                <th>Total Sin Descuento</th>
                <th>Total Con Descuento</th>
                <th colspan="2">Descuento en Pesos</th>
              </tr>
              <tr>
                <th><?php echo number_format($Total, 2) ?></th>
                <td><input type="text" size="5px" id="totaldesc" value="0" class="form-control" disabled="disabled"></td>
                <td colspan="2"><input type="text" size="5px" name="desc" id="total" value="0" class="form-control"></td>
              </tr>
              <tr>
                <th colspan="2">Detalles de Operación</th>
                <th colspan="2" class="text-right">Entrega en cuenta corriente</th>
              </tr>
              <tr>
                <th colspan="3"><textarea name="detallesop" rows="2" cols="60" placeholder="Detalles" class="form-control"></textarea></th>
                <td colspan="1"><input type="text" size="5px" name="entrega" id="entrega" value="0" class="form-control"></td>
              </tr>
              <tr>
                <th colspan="2">Detalles de Descuento</th> 
              </tr>
              <tr>
                <th colspan="4"><textarea name="detallesdes" rows="2" cols="60" placeholder="Detalles" class="form-control"></textarea></th>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="2" class="is-size-4 has-text-right"><strong></strong></td>
                <td colspan="2" class="is-size-4"><?php echo number_format($Total, 2); ?></td>
              </tr>
            </tfoot>
          </table>
        </div>
        <input type="hidden" name="total" value="<?php echo $Total; ?>">
        <input type="text" name="msj" id="msj" readonly style="visibility:hidden;">
        <button class="btn btn-success btn-lg" type="button" onclick="vT()">
      <i class="fa fa-check">Terminar Compra</i>
    </button>
  </div>
</form>

<script type="text/javascript">
function vT() {
    Swal.fire({
        title: '¿Desea Realizar la Venta?',
        showCancelButton: true,
        confirmButtonText: `Sí`,
        cancelButtonText: `No`,
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("msj").value = "1";
            document.getElementById("ventaForm").submit();
        } else {
            document.getElementById("msj").value = "0";
        }
    });
}
</script>
