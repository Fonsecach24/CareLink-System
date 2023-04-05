<?php 
	session_start();
	//Conexão com banco de dados
	include("conexao.php");
	
	//Obter o ID da consulta a ser excluída
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		
		//Excluir a consulta do banco de dados
		$result_consultas = "DELETE FROM consultas WHERE id='$id'";
		$resultado_consultas = mysqli_query($conn, $result_consultas);
		
		//Redirecionar para a página de consultas
		header("Location: index2.php");
		exit();
	}else{
		//Se não houver ID, redirecionar para a página de consultas
		header("Location: index2.php");
		exit();
	}
?>
