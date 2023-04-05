<?php
session_start();
include('conexao.php');

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 'admin') {
    header("Location: index.php");
}

if (!isset($_GET['id'])) {
    header("Location: adm.php");
}

$id = $_GET['id'];

$sql_code = "DELETE FROM usuarios WHERE id = $id";
$sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);

header("Location: adm.php");
?>
