<?php
include('conexao.php');

	
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro do Usuário - Tarefas Diárias</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form action="user.php" method="post">
        <h1>Criação de Conta</h1>
        <p>
            <input type="email" placeholder="Digite seu E-mail" name="email" > <br>
        </p>

        <p>
            <input type="password" placeholder="Digite sua Senha" name="senha" id="senha" onkeyup="validaSenha()"> <br>
        </p>

        <p>
            <input type="password" placeholder="Confirme sua senha" name="senha2" id="senha2" onkeyup="validaSenha()"> <br>
        </p>

        <p> 
            <input type="text" placeholder="Digite seu Nome" name="nome"> <br>
        </p>

        <button>Salvar</button>
    </form>

    <form action="listar_usuarios.php" method="get">
    <button type="submit">Listar usuários cadastrados</button>
    </form>

    <script>
        function validaSenha(){
            $senha = document.getElementById("senha").value;
            $senha2 = document.getElementById("senha2").value;
            if($senha != $senha2){
                document.getElementById("senha2").style.border = "red 1px solid";
            }else{
                document.getElementById("senha2").style.border = "green 1px solid";
            }
        }
    </script>

    















