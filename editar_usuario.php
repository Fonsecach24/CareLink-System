<?php
include('protect.php');
include('conexao.php');

// Verifica se o ID do usuário foi enviado pela URL
if (!isset($_GET['id'])) {
  header("Location: listar_usuarios.php");
  exit;
}

$id = $_GET['id'];

// Busca os dados do usuário no banco de dados
$query = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($conn, $query);
$usuario = mysqli_fetch_assoc($resultado);

// Verifica se o usuário existe
if (!$usuario) {
  header("Location: listar_usuarios.php");
  exit;
}

// Verifica se o formulário foi enviado
if (isset($_POST['enviar'])) {
  // Obtém os dados do formulário
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $tipo = $_POST['tipo'];

  // Atualiza os dados do usuário no banco de dados
  $query = "UPDATE usuarios SET nome = '$nome', email = '$email', tipo = '$tipo' WHERE id = '$id'";
  mysqli_query($conn, $query);

  // Redireciona de volta para a lista de usuários
  header("Location: listar_usuarios.php");
  exit;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Editar Usuário</title>
  <link rel="stylesheet" href="dss.css">
</head>
<body>
  <section class="left">
    <a href="logout.php" class="iconeSector">
      <ion-icon name="arrow-back" id="voltar"></ion-icon>
    </a>
  </section>

  <div class="container">
    <div class="login-form">
      <h2 class="title">Editar Usuário</h2>
      <form method="POST">
        <div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" name="nome" id="nome" value="<?= $usuario['nome'] ?>">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" name="email" id="email" value="<?= $usuario['email'] ?>">
        </div>
        <div class="form-group">
          <label for="tipo">Tipo:</label>
          <select name="tipo" id="tipo">
            <option value="admin" <?= $usuario['tipo'] == 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="usuario" <?= $usuario['tipo'] == 'normal' ? 'selected' : '' ?>>normal</option>
            <option value="usuario" <?= $usuario['tipo'] == 'visualisador' ? 'selected' : '' ?>>visualisador</option>
          </select>
        </div>
        <div class="form-group">
          <button type="submit" name="enviar" class="btn btn-success">Salvar</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
