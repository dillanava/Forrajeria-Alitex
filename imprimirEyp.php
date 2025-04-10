<?php
require 'fpdf184/fpdf.php';
include_once "funciones.php";

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $imp = imprimirPedido($_SESSION["o"]);
        foreach($imp as $i){
            $fecha = $i->fecha;
            $usuario = $i->apellido .", ".$i->nombre;
            $proveedor = $i->proveedor;
        }
        
        $this->SetFont('Times','B',20);
        $this->Cell(0, 1, "________________________________________________________", 0, 1, "C");
        $this->Image("img/alitex.png",20,17,20); //imagen(archivo, png/jpg || x,y,tamaño)
        $this->setXY(60,15);
        $this->Cell(100,10,'Forrajeria ALITEX',0,1,'C',0);
        $this->SetFont('Times','B',10);
        $this->Cell(200,10,'Premezclas Texcoco',0,1,'C',0);
        $this->Ln(1);
        $this->SetFont('Times','B',20);
        $this->Cell(0, 2, "________________________________________________________", 0, 1, "C");
        $this->Ln(1);
        $this->SetFont('Arial','B',8);
        
        // Ajustamos las celdas para evitar el amontonamiento
        $this->Cell(70,8,"Fecha:  ". $fecha ,0,0,'R',0); 
        $this->Cell(80,8,"Proveedor:  ". $proveedor ,0,0,'C',0);
        $this->Cell(40,8,"Usuario:  "  . $usuario ,0,1,'R',0);
        
        $this->SetFont('Times','B',20); 
        $this->Cell(0, 1, "________________________________________________________", 0, 1, "C"); 
        $this->Ln(5);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-20);
        $this->SetFont('Times','B',20); 
        $this->Cell(0, 1, "________________________________________________________", 0, 1, "C"); 
        $this->SetFont('Arial','B',10);
        $this->Cell(170,10,'Forrajeria ALITEX',0,0,'C',0);
        $this->Cell(25,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,1,'C');
        $this->Cell(170,10,'Telefono: 5512464069',0,1,'C',0);
        $this->SetFont('Times','B',20); 
        $this->Cell(0, 1, "________________________________________________________", 0, 1, "C"); 
    }
}
?>
