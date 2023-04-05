<?php
include('protect.php');

	
?>
<?php
if(!isset($_SESSION)){
	session_start();
}
?>

<?php
if(isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['nome'])) {

    include('conexao.php');

    $email = $conn->real_escape_string($_POST['email']);
    $senha = $conn->real_escape_string($_POST['senha']);
    $nome = $conn->real_escape_string($_POST['nome']);
    $tipo = $conn->real_escape_string($_POST['tipo']);
    

    $sql_code = "INSERT INTO usuarios (email, senha, nome,tipo) VALUES ('$email', '$senha', '$nome','$tipo')";
    $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);

    if($sql_query) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Falha ao cadastrar usuário. Tente novamente mais tarde.";
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
    <title>Cadastro de Usuários</title>
    <link rel="stylesheet" href="dss.css">
</head>
<body>
<section class="left">
            <a href="logout.php" class="iconeSector">
                <ion-icon name="arrow-back" id="voltar"></ion-icon>
            </a>
            <a href="#name"><span class="white-text name">Usuário: <?= $_SESSION['nome']?></span></a> 
            <h1>Consultas Médicas</h1>
        </section>


    <div class="container">
        
        <div class="login-form">
            <div class="title">Cadastro de Novo Usuário</div>
            
            <form action="" method="POST">

                

                <div class="input-box">
                    <i class="fa fa-envelope"></i>
                    <input type="text" placeholder="Digite o e-mail do usuário" name="email">
                </div>

                <div class="input-box">
                    <i class="fa fa-lock"></i>
                    <input type="password" placeholder="Digite a senha do usuário" name="senha">
                </div>
                <div class="input-box">
                    <i class="fa fa-user"></i>
                    <input type="text" placeholder="Digite o nome do usuário" name="nome">
                </div>

                <div class="input-box">
                    <input type="submit" value="Cadastrar">
                </div>
                <div>
                    <select name="tipo" id="">
                        <option>admin</option>  
                        <option>normal</option>
                        <option>visualisador</option> 
                    </select>
                </div>

            </form>

            <form action="listar_usuarios.php" method="get">
              <button type="submit">Listar usuários cadastrados</button>
            </form>


        </div>

        <div class="login-img">
            <img src="../sistema2/imagens/REBIRTH (1).png" width="100%" alt="">
        </div>
    </div>
    
</body>
</html>