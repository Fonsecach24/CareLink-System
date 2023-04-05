<?php 
	session_start();
	//Conexão com banco de dados
	include("conexao.php");
	
	//Verificar se o formulário foi enviado
	if(isset($_POST['editar'])){
		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$telefone = $_POST['telefone'];
		$tipo_consulta = $_POST['tipo_consulta'];
		$data = $_POST['data'];
		
		//Atualizar os dados no banco de dados
		$result_consultas = "UPDATE consultas SET nome='$nome', telefone='$telefone', tipo_consulta='$tipo_consulta', data='$data' WHERE id='$id'";
		$resultado_consultas = mysqli_query($conn, $result_consultas);
		
		//Redirecionar para a página de consultas
		header("Location: index2.php");
		exit();
	}
	
	//Obter o ID da consulta a ser editada
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		
		//Obter os dados da consulta a ser editada
		$result_consultas = "SELECT * FROM consultas WHERE id='$id'";
		$resultado_consultas = mysqli_query($conn, $result_consultas);
		$row_consultas = mysqli_fetch_assoc($resultado_consultas);
	}else{
		//Se não houver ID, redirecionar para a página de consultas
		header("Location: index2.php");
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar Consulta</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<h2>Editar Consulta</h2>
	<form method="POST" action="">
		<input type="hidden" name="id" value="<?php if(isset($row_consultas)){echo $row_consultas['id'];} ?>">
		<div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" class="form-control" id="nome" name="nome" value="<?php if(isset($row_consultas)){echo $row_consultas['nome'];} ?>">
		</div>
		<div class="form-group">
			<label for="telefone">Telefone:</label>
			<input type="text" class="form-control" id="telefone" name="telefone" value="<?php if(isset($row_consultas)){echo $row_consultas['telefone'];} ?>">
		</div>
		
        <div class="form-group">
			<label for="tipo_consulta">Tipo de Consulta:</label>
			<select class="form-control" id="tipo_consulta" name="tipo_consulta">
				<option value="Exame de Sangue" <?php if(isset($row_consultas) && $row_consultas['tipo_consulta']=="Exame de Sangue"){echo "selected";} ?>>Exame de Sangue</option>
				<option value="Consulta Médica" <?php if(isset($row_consultas) && $row_consultas['tipo_consulta']=="Consulta Médica"){echo "selected";} ?>>Consulta Médica</option>
				<option value="Retorno" <?php if(isset($row_consultas) && $row_consultas['tipo_consulta']=="Retorno"){echo "selected";} ?>>Retorno</option>
				<option value="Outro" <?php if(isset($row_consultas) && $row_consultas['tipo_consulta']=="Outro"){echo "selected";} ?>>Outro</option>
			</select>
		</div>
		<div class="form-group">
			<label for="data">Data:</label>
			<input type="date" class="form-control" id="data" name="data" value="<?php if(isset($row_consultas)){echo $row_consultas['data'];} ?>">
		</div>
		<button type="submit" class="btn btn-primary" name="editar">Editar</button>
		<a href="consultas.php" class="btn btn-default">Cancelar</a>
	</form>
</div>
</body>
</html>