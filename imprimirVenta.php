<?php
include_once "funciones.php";
include_once "imprimirVentaEyP.php";

if (!empty($_POST)) {
    $op = $_POST["op"];
    $_SESSION["o"] = $op;

    $pdf = new PDF("P", "mm", "A4");
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetMargins(20, 10, 10);
    $pdf->SetAutoPageBreak(true, 20);
    $pdf->SetX(3);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(10, 5, '', 0, 0, "C");
    $pdf->Cell(20, 5, "id", 1, 0, "C");
    $pdf->Cell(60, 5, "Articulo", 1, 0, "C");
    $pdf->Cell(40, 5, "Presentacion", 1, 0);
    $pdf->Cell(20, 5, "Cantidad", 1, 0);
    $pdf->Cell(20, 5, "Precio", 1, 0);
    $pdf->Cell(20, 5, "Subtotal", 1, 1);

    $pdf->SetFillColor(233, 229, 235);
    $pdf->SetDrawColor(61, 61, 61);
    $pdf->SetFont('Arial', '', 12);

    $oper = imprimirVenta($op);
    $t = 0;
    $totalDesc = 0;
    foreach ($oper as $E) {
        $pdf->Ln(0.6);
        $pdf->SetX(3);
        $sub = $E->cantidad * $E->precioF;
        $t += $sub;
        $pdf->Cell(10, 5, '', 0, 0, "C");
        $pdf->Cell(20, 5, $E->id_articulo, 1, 0, "C");
        $pdf->Cell(60, 5, $E->nombre, 1, 0);
        if ($E->suelto == 1) {
            $pdf->Cell(40, 5, "Suelto", 1, 0);
        } else {
            $pdf->Cell(40, 5, $E->tamanio, 1, 0);
        }
        $pdf->Cell(20, 5, $E->cantidad, 1, 0, "C");
        $pdf->Cell(20, 5, "$" . $E->precioF, 1, 0, "C");
        $pdf->Cell(20, 5, "$" . $sub, 1, 1, "R");
    }

    // Aquí debes obtener el valor del descuento aplicado y los detalles de la operación y del descuento
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT descuento, detalles, detalle FROM operacion WHERE id_operacion = ?");
    $sentencia->execute([$op]);
    $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

    $descuento = $resultado['descuento'];
    $detallesOperacion = $resultado['detalles'];
    $detallesDescuento = $resultado['detalle'];

    $pdf->Ln(1);
    $pdf->SetX(15);
    $pdf->Cell(10, 5, '', 0, 0, "C");
    $pdf->Cell(20, 5, "", 0, 0);
    $pdf->Cell(30, 5, "Forma de Pago:", 0, 0, "C");
    $pdf->Cell(60, 5, $E->tipoventa, 0, 0);
    $pdf->Cell(20, 5, "", 0, 0, "C");
    $pdf->Cell(20, 5, "Total:", 0, 0, "R");
    $pdf->Cell(20, 5, "$" . ($t - $descuento), 0, 1, "R");
    $pdf->Cell(20, 5, "Descuento:", 0, 0, "R");
    $pdf->Cell(20, 5, "$" . $descuento, 0, 1, "R");

    // Imprimir los detalles de la operación
    $pdf->Ln(1);
    $pdf->SetX(15);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(20, 5, "Detalles de la Operacion:", 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 5, $detallesOperacion);

    // Imprimir los detalles del descuento
    $pdf->Ln(1);
    $pdf->SetX(15);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(20, 5, "Detalles del Descuento:", 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 5, $detallesDescuento);

    $pdf->Output();
}
?>
