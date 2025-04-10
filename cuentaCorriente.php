<?php 
include_once "header.php";
//include_once "funciones.php";
$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';
?>
<section class="contenido wrapper">
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h3>Cuenta Corriente</h3>
      </div>
      <div class="card-body">
        <form action="cuentaCorriente.php" method="POST">
          <div class="form-group">
            <label for="cliente">Cliente</label>
            <select name="cliente" class="form-control" onchange="this.form.submit()">
              <option value="" disabled selected>--- Seleccionar Cliente ---</option>
              <?php 
              $total = "--";
              $cte = "--";
              $cuentaCorriente = obtener_cuentaCorriente();
              foreach ($cuentaCorriente as $cC) {
                if (isset($_POST["cliente"]) && $_POST["cliente"] == $cC->id_cliente) { ?>
                  <option value="<?php echo $cC->id_cliente; ?>" selected><?php echo $cC->apellido .", ". $cC->nombre; ?></option>
                  <?php
                  $total = $cC->total;
                  $cte = $cC->apellido .", ". $cC->nombre; 
                  $cliente_id = $cC->id_cliente;
                } else { ?>
                  <option value="<?php echo $cC->id_cliente; ?>"><?php echo $cC->apellido .", ". $cC->nombre; ?></option>
                <?php }
              } ?>
            </select>
          </div>
        </form>
      </div>
    </div>    
  </div>
</section>


<section>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Estado de Cuenta</h3>
            </div>
            <div class="card-body">
                <?php if ($mensaje): ?>
                    <div class="alert alert-success"><?php echo $mensaje; ?></div>
                <?php endif; ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    function vT() {
                        Swal.fire({
                            title: '¿Deseas realizar el pago?',
                            showCancelButton: true,
                            confirmButtonText: 'Sí',
                            cancelButtonText: 'No',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById("msj").value = "1";
                                document.getElementById("pagoForm").submit();
                            } else {
                                document.getElementById("msj").value = "0";
                            }
                        });
                    }
                </script>    
                <form id="pagoForm" action="cuentaCorrientePago.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $cliente_id; ?>">
                    <input type="text" name="msj" id="msj" readonly style="visibility:hidden;">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <tbody>
                                <tr>
                                    <th>Cliente:</th>
                                    <td><?php echo $cte; ?></td>
                                </tr>
                                <tr>
                                    <th>Deuda:</th>
                                    <td><?php echo $total; ?></td>
                                </tr>
                                <tr>
                                    <th>Pago:</th>
                                    <td>
                                        <div class="row">
                                            <div class="col-12 col-md-8 mb-2 mb-md-0">
                                                <input type="text" name="pago" class="form-control" placeholder="Cantidad">
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <button type="button" class="btn btn-success btn-block" onclick="vT()">Pagar</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include_once "footer.php"; ?>
