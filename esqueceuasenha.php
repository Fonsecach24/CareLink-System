<?php
    include("conexao.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar senha</title>
</head>
<body>
    <h1>Recuperar senha</h1>

    <?php 
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        

        if(!empty($dados['SendRecupSenha'])){
            var_dump($dados);

            $query_usuario = "SELECT id, nome, usuario
                                        FROM usuarios
                                        WHERE usuario =:usuario
                                        LIMIT 1";

        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->bindparam(':usuario', $dados['usuario'],PDO::param_STR);
        $result_usuario->execute(); 

        if(($result_usuario) AND ($result_usuario->rowcount() != 0)){

        }else{
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário não encontrado!</p>";
        }

        }

        
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
         }

        
    ?>

    <form action="" method="POST">

         <div class="input-box">
            <i class="fa fa-envelope"></i>
            <input type="text" placeholder="Digite seu email" name = "usuario" 
            value = "<?php if(isset($dados['usuario'])){echo $dados['usuario'];} ?>"><br><br>

            <input type="submit" value="Recuperar" name="SendRecupSenha"> 
        </div>

    </form>

</body>
</html>