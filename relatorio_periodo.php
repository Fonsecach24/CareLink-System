<?php
session_start();
include("conexao.php");
require('fpdf/fpdf.php'); // inclui a biblioteca FPDF

// Cria uma nova instância da classe FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Define a fonte e o tamanho do título
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Relatório de Consultas Médicas',0,1,'C');

// Cria a tabela de dados
$pdf->SetFont('Arial','',12);
$pdf->Cell(10,10,'#',1,0,'C');
$pdf->Cell(60,10,'Nome',1,0,'C');
$pdf->Cell(30,10,'Telefone',1,0,'C');
$pdf->Cell(50,10,'Tipo de Consulta',1,0,'C');
$pdf->Cell(40,10,'Data e Hora',1,1,'C');

// Consulta SQL para selecionar os itens cadastrados
$sql = "SELECT * FROM consultas";
$resultado = mysqli_query($conn, $sql);
$i = 1;
// Loop para exibir os itens cadastrados na tabela
while ($linha = mysqli_fetch_array($resultado)) {
    $pdf->Cell(10,10,$i++,1,0,'C');
    $pdf->Cell(60,10,$linha['nome'],1,0,'L');
    $pdf->Cell(30,10,$linha['telefone'],1,0,'L');
    $pdf->Cell(50,10,$linha['tipo_consulta'],1,0,'L');
    $pdf->Cell(40,10,date('d/m/Y H:i:s', strtotime($linha['data'])),1,1,'L');
}

// Gera o arquivo PDF e o exibe no navegador
$pdf->Output();
?>
