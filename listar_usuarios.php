<?php include('protect.php');
include('conexao.php');

$query = "SELECT * FROM usuarios";
$resultado = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Lista de Usuários</title>
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
    <h2 class="title">Lista de Usuários Cadastrados</h2>
    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead class="bg-success text-white">
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Tipo</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_assoc($resultado)) { ?>
          <tr>
            <td><?= $row['nome'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['tipo'] ?></td>
            <td>
              <a href="editar_usuario.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
                <i class="fa fa-edit"></i> Editar
              </a>
              <a href="excluir_usuario.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i> Excluir
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>
