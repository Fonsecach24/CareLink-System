<?php 
	session_start();
	//Conexão com banco de dados
	include("conexao.php");
?>
<div class="panel panel-danger text-center">
	<nav class="navbar navbar-default">
		<h3 class="text-center text-danger">Consultas para Hoje</h3>
	</nav>
  	<?php
  		$result_horarios = "SELECT * FROM consultas WHERE DAY(data) = DAY(CURDATE()) AND MONTH(data) = MONTH(CURDATE()) AND YEAR(data) = YEAR(CURDATE())";
		$resultado_horarios = mysqli_query($conn, $result_horarios);
		while($row_horarios = mysqli_fetch_array($resultado_horarios)){
			echo "<div class='text-center'>";
			echo "<strong>Nome:</strong> ".$row_horarios['nome']."<br>";
			echo "<strong>Telefone</strong> ".$row_horarios['telefone']."<br>";
			if(isset($row_horarios['tipo'])){
			echo "<strong>tipo_consulta:</strong> ".$row_horarios['tipo']."<br>";
			}
			echo "<strong>Data e Horário:</strong> ".date('d/m/Y H:i:s', strtotime($row_horarios['data']))."<br>";
            //Botões de editar e excluir
			echo "<a href='editar_consulta.php?id=".$row_horarios['id']."'>Editar</a>";
			echo " | ";
			echo "<a href='excluir_consulta.php?id=".$row_horarios['id']."'>Excluir</a>";
			echo "</div>";
			echo "<br>";
		}
  	?>
</div>
<hr>
<div class="panel panel-success text-center">
	<nav class="navbar navbar-default">
		<h3 class="text-center text-success">Consultas deste mês</h3>
	</nav>
    <?php
    	$result_horarios = "SELECT * FROM consultas WHERE MONTH(data) = MONTH(CURDATE()) AND YEAR(data) = YEAR(CURDATE())";
		$resultado_horarios = mysqli_query($conn, $result_horarios);
		while($row_horarios = mysqli_fetch_array($resultado_horarios)){
			echo "<strong>Nome:</strong> ".$row_horarios['nome']."<br>";
			echo "<strong>Telefone</strong> ".$row_horarios['telefone']."<br>";
			echo "<strong>tipo_consulta:</strong> ".$row_horarios['tipo_consulta']."<br>";
			echo "<strong>Data e Horário:</strong> ".date('d/m/Y H:i:s', strtotime($row_horarios['data']))."<br>";
			//Botões de editar e excluir
			echo "<a href='editar_consultas.php?id=".$row_horarios['id']."'>Editar</a>";
			echo " | ";
			echo "<a href='excluir_consulta.php?id=".$row_horarios['id']."'>Excluir</a>";
			echo "<hr>";
		}
    ?> 
</div>
