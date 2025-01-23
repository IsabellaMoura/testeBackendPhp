<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <header class="container-fluid bg-dark text-light">
        <div class="text-center">Editar Informações</div>
    </header>
</head>
<body>

    <?php

    include "./db/conexao.php";
    $id = $_GET['id'] ?? '';
    $sql = "SELECT * FROM tbcorretores WHERE id = $id";
    $dados = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_assoc($dados);

    ?>

    <div class="container">
      <div class="row">
      <div class="col">
        <form action="edit_info.php" method="POST">
            <div class="form-group">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required value="<?php echo $linha['nome'];?>">
            </div>
            <div class="form-group">
                <label for="creci" class="form-label">Creci</label>
                <input type="text" class="form-control" id="creci" name="creci" required value="<?php echo $linha['creci'];?>">
            </div>
            <div class="form-group">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required value="<?php echo $linha['cpf'];?>">
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="btn btn-success" value="Salvar">
                <input type="hidden" name="id" value="<?php echo $linha['id']?>">
            </div>
        </form>
        <hr>
        <a href="pesquisa.php" class="btn btn-primary">Voltar</a>
        </div>
      </div>  
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
