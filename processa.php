<?php
session_start();

//Incluir a conexão com o BD
include("conexao.php");

//Receber os dados do formulário
$data = $_REQUEST['data'];
$tipo_consulta = $_REQUEST['tipo_consulta'];
$nome = $_REQUEST['nome'];
$telefone = $_REQUEST['telefone'];

//Converção do tema
$data = explode(" ", $data);
list($date, $hora) = $data;
$data_sem_barra = array_reverse(explode("/", $date));
$data_sem_barra = implode("-", $data_sem_barra);
$data_sem_barra = $data_sem_barra . " " . $hora;

//certificação
if(empty($_POST['nome']) || empty($_POST['data']) || empty($_POST['tipo_consulta'])){
	$_SESSION['msg'] = "<div class='alert alert-warning'>Preencha os campos corretamente</div>";
	header("Location: index2.php"); 
	session_start();

}else{
	//Salvar 
	$result_data = "INSERT INTO consultas(tipo_consulta, data, nome, telefone) VALUES ('$tipo_consulta','$data_sem_barra','$nome','$telefone')";
	$resultado_data = mysqli_query($conn, $result_data);

	//Verificar se salvou no banco de dados através do "mysqli_insert_id" que verifica se existe o ID do ultimo dado inserido
	if(mysqli_insert_id($conn)){
		$_SESSION['msg'] = "<div class='alert alert-success'>Marcação efetuada com sucesso</div>";
		header("Location: index2.php");
		session_start();

	}else{
		$_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao efetuar o agendamento</div>";
		header("Location: index2.php");
		session_start();

	}
	
}





?>

