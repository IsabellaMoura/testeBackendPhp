<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
      <div class="row">
        <?php
            include "./db/conexao.php";

            $id = $_POST['id'];
            $nome = $_POST['nome'];

            $sql = "DELETE FROM `tbcorretores` WHERE id = $id";

            if (mysqli_query($conn, $sql)) {
                mensagem("$nome excluido com sucesso", 'success');
            } else {
                mensagem("$nome não foi excluido", 'danger');
            }
        

        ?>
        <hr>
        <a href="/../teste_backend_imovel_guide/app/" class="btn btn-primary">Voltar</a>
      </div>  
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
