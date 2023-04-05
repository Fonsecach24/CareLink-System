<?php
session_start();
include("conexao.php");

// Verifica se o id do paciente foi passado por parâmetro
if(!isset($_GET['id'])) {
  header("Location: visualisador.php");
  exit();
}

// Consulta SQL para selecionar o paciente pelo id
$sql = "SELECT * FROM consultas WHERE id = ".$_GET['id'];
$resultado = mysqli_query($conn, $sql);

// Verifica se o paciente foi encontrado
if(mysqli_num_rows($resultado) == 0) {
  header("Location: visualisador.php");
  exit();
}

// Dados do paciente
$dados = mysqli_fetch_array($resultado);

// Configurações do PDF
require_once("fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Relatório do Paciente', 0, 1, 'C');
$pdf->Ln();

// Exibe os dados do paciente no PDF
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 10, 'Nome: ', 0, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, $dados['nome'], 0, 1);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 10, 'Telefone: ', 0, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, $dados['telefone'], 0, 1);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 10, 'Data da consulta: ', 0, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, date('d/m/Y H:i:s', strtotime($dados['data'])), 0, 1);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 10, 'Tipo de consulta: ', 0, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, $dados['tipo_consulta'], 0, 1);

$pdf->Output();
?>
