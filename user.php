

<?php

require_once ("conexao.php");

$email = $_POST['email'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];


$sql = "INSERT INTO 
            usuarios (email,senha,nome )
            VALUES
            ('$email', '$senha', '$nome')
        ";
$resultado = mysqli_query($conn, $sql);

if($resultado == true){
    header("Location:index.php");

}




?>