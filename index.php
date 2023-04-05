<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $conn->real_escape_string($_POST['email']);
        $senha = $conn->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' AND tipo IN ('admin', 'normal', 'visualisador')";
        $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['tipo'] = $usuario['tipo'];

            if($usuario['tipo'] == "admin") {
                header("Location: adm.php");
            } else if($usuario['tipo'] == "normal") {
                header("Location: index2.php");
            } else if($usuario['tipo'] == "visualisador") {
                header("Location: visualisador.php"); 
            }

        } else {
            echo "Usuário não encontrado";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
    <link rel="stylesheet" href="dss.css">
</head>
<body >
        
    
        <div class="container">


            <div class="login-form">
                <div class="title">Acesse sua conta</div>
                
                <form action="" method="POST">

                    <div class="input-box">
                        <i class="fa fa-envelope"></i>
                        <input type="text" placeholder="Digite seu email" name = "email" >
                    </div>

                    <div class="input-box">
                        <i class="fa fa-lock"></i>
                        <input type="password" placeholder="Digite sua senha"  name = "senha">
                    </div>
                    <div class="fotgot"> <a href="esqueceuasenha.php">Esqueceu a senha?</a> </div>
                    <div class="input-box">
                        <input type="submit" value="Entrar">
                    </div>
                    <div class="signup-text">
                        
                    </div>

                </form>

            </div>

            <div class="login-img">
                <img src="../sistema2/imagens/REBIRTH (1).png" width="100%" alt="">
            </div>
        </div>
</body>
</html>