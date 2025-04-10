<?php
//include_once "funciones.php";
include_once "header.php";


?>

<section class="contenido wrapper ">
    <div class="container position-relative card" >
            <div class="card-header">
               <h3>Informes de Ventas por Articulo y por Cliente de forma Diaria, Mensual o General</h3>
                <?php //appButton() ?>
            </div>
            <div class="card-body">
               <h3>Informes de Ventas</h3>
                <?php appInformeVenta() ?>
            </div>
           
    </div>
<br>
    <div class="container position-relative card" >
            <div class="card-header">
               <h3>Informes  Venta de  Articulos</h3>
                <?php appInformeVentaArticulo() ?>
            </div>
            <div class="card-body">
                <?php //appInformeVentaArticulo() ?>
            </div>
    </div>
<br>       
    <div class="container position-relative card" >
            <div class="card-header">
               <h3>Informes Venta Por Cliente</h3>
                <?php //appButton() ?>
            </div>
            <table class="table table-striped table-hover">
                 
                <tr>
                    <th rowspan="3" align="right"><a href="informe_ArtVentaTotal.php?inf=inf" target="_blank" rel="noopener noreferrer">Ventas por Articulo</a> </th>
                    <td><a href="informe_ArtVentaDiaria.php?inf=D" target="_blank" rel="noopener noreferrer">Venta de Articulo Por Cliente</a></td>
                    
                </tr>
                <tr>
                    <td><a href="informe_ArtVentaMes.php?inf=Ms" target="_blank" rel="noopener noreferrer">Venta Mensual por Articulo</a></td>
                    
                </tr>
                <tr>
                    <td><a href="informe_ArtVentaGeneral.php?inf=Gnr" target="_blank" rel="noopener noreferrer">Venta General de Articulo</a></td>
                </tr>
            
                
             </table> 
        </div>
</section>


<?php include_once"footer.php";