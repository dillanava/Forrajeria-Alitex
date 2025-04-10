<?php
require 'fpdf184/fpdf.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vendedor = htmlspecialchars($_POST['vendedor']);
    $cliente = htmlspecialchars($_POST['cliente']);
    $productos = htmlspecialchars($_POST['productos']);
    $unidades = htmlspecialchars($_POST['unidades']);
    $fecha = htmlspecialchars($_POST['fecha']);
    $clientes_vendedor = htmlspecialchars($_POST['clientes_vendedor']);
    $cantidad_vendida_vendedor_cliente = htmlspecialchars($_POST['cantidad_vendida_vendedor_cliente']);
    $ventas_totales_cliente = htmlspecialchars($_POST['ventas_totales_cliente']);
    $productos_comprados = htmlspecialchars($_POST['productos_comprados']);
} else {
    die("Método de solicitud no permitido.");
}

class PDF extends FPDF
{
    private $data;

    public function __construct($data)
    {
        parent::__construct();
        $this->data = $data;
    }

    // Cabecera de página
    function Header()
    {
        $this->SetFont('Times', 'B', 20);
        $this->Cell(0, 1, "________________________________________________________", 0, 1, "C");
        $this->setX(15);
        $this->Image("img/alitex.png", 20, 17, 20); // imagen(archivo, png/jpg || x,y,tamaño)
        $this->setXY(60, 15);
        $this->Cell(100, 10, 'Forrajeria ALITEX', 1, 0, 'C', 0);
        $this->SetXY(60, 25);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(100, 10, 'Premezclas Texcoco', 0, 1, 'C', 0);
        $this->Ln(10); // Añade más espacio después del encabezado
        $this->SetFont('Times', 'B', 20);
        $this->Cell(0, 2, "________________________________________________________", 0, 1, "C");
        $this->Ln(10); // Añade más espacio antes del cuerpo
    }

    function Body()
    {
        $this->SetFont('Arial', 'B', 12);

        $this->Cell(60, 10, 'Vendedor:', 1);
        $this->Cell(0, 10, $this->data['vendedor'], 1, 1);
        
        $this->Cell(60, 10, 'Cliente:', 1);
        $this->Cell(0, 10, $this->data['cliente'], 1, 1);
        
        $this->Cell(60, 10, 'Producto:', 1);
        $this->Cell(0, 10, $this->data['productos'], 1, 1);
        
        $this->Cell(60, 10, 'Unidades:', 1);
        $this->Cell(0, 10, $this->data['unidades'], 1, 1);
        
        $this->Cell(60, 10, 'Fecha:', 1);
        $this->Cell(0, 10, $this->data['fecha'], 1, 1);
        
        $this->Cell(60, 10, 'Clientes del Vendedor:', 1);
        $this->Cell(0, 10, $this->data['clientes_vendedor'], 1, 1);
        
        $this->Cell(60, 10, 'Cantidad Vendida al Cliente:', 1);
        $this->Cell(0, 10, $this->data['cantidad_vendida_vendedor_cliente'], 1, 1);
        
        $this->Cell(60, 10, 'Ventas Totales del Cliente:', 1);
        $this->Cell(0, 10, $this->data['ventas_totales_cliente'], 1, 1);
        
        $this->Cell(60, 10, 'Productos Comprados:', 1);
        $this->Cell(0, 10, $this->data['productos_comprados'], 1, 1);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-20);
        $this->SetFont('Times', 'B', 20);
        $this->Cell(0, 1, "________________________________________________________", 0, 1, "C");
        $this->SetFont('Arial', 'B', 10);
        // Número de página
        $this->Cell(170, 10, 'Forrajeria ALITEX', 0, 0, 'C', 0);
        $this->Cell(25, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 1, 'C');
        $this->Cell(170, 10, 'Telefono: 5512464069', 0, 1, 'C', 0);
        $this->SetFont('Times', 'B', 20);
        $this->Cell(0, 1, "________________________________________________________", 0, 1, "C");
    }
}

$data = [
    'vendedor' => $vendedor,
    'cliente' => $cliente,
    'productos' => $productos,
    'unidades' => $unidades,
    'fecha' => $fecha,
    'clientes_vendedor' => $clientes_vendedor,
    'cantidad_vendida_vendedor_cliente' => $cantidad_vendida_vendedor_cliente,
    'ventas_totales_cliente' => $ventas_totales_cliente,
    'productos_comprados' => $productos_comprados
];

$pdf = new PDF($data);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Body();
$pdf->Output();
?>
