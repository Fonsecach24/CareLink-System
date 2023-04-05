<?php
session_start();
include("conexao.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lista de itens cadastrados</title>
	<!-- Importação do Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<!-- Estilo personalizado -->
	<style>
		/* Estilo da barra de pesquisa */
		#pesquisa {
			float: right;
			margin-bottom: 10px;
		}
		/* Estilo da tabela */
		.table-striped > tbody > tr:nth-of-type(odd) {
			background-color: #c1e7c8;
		}
		.table-striped > tbody > tr:nth-of-type(even) {
			background-color: #a1d9a7;
		}
	</style>
</head>
<body>
		<section class="left">

            <a href="logout.php" class=""> Sair </a>
            <h1>Consultas Médicas</h1>
			<a href="relatorio_periodo.php" class="btn btn-primary">Gerar Relatório</a>

        </section>

	<!-- Barra de navegação do Bootstrap -->
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Lista Pacientes Registados</a>
			</div>
		</div>
	</nav>
	<div class="container">
		<!-- Barra de pesquisa -->
		<input type="text" class="form-control" id="pesquisa" placeholder="Pesquisar...">
        	<!-- Tabela de itens cadastrados -->
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Nome</th>
					<th>Telefone</th>
					<th>Tipo de consulta</th>
                    <th>Data e hora</th>
                    <th>Gerar relatório</th>
				</tr>
			</thead>
			<tbody>
				<?php
				// Consulta SQL para selecionar os itens cadastrados
				$sql = "SELECT * FROM consultas";
				$resultado = mysqli_query($conn, $sql);
				$i = 1;
				// Loop para exibir os itens cadastrados na tabela
				while ($linha = mysqli_fetch_array($resultado)) {
					echo "<tr>";
					echo "<td>".$i++."</td>";
					echo "<td>".$linha['nome']."</td>";
					echo "<td>".$linha['telefone']."</td>";
					echo "<td>".$linha['tipo_consulta']."</td>";
					echo "<td>".date('d/m/Y H:i:s', strtotime($linha['data']))."</td>";
                    echo "<td><a href='relatorio_paciente.php?id=".$linha['id']."' class='btn btn-primary'>Gerar relatório</a></td>";
					echo "</tr>";
				}
				?>
		
		</tbody>
		</table>
	</div>
</body>
</html>