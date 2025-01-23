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

            $nome = $_POST['nome'];
            $creci = $_POST['creci'];
            $cpf = $_POST['cpf'];
            $errors = [];

            if (strlen($nome) < 2) {
                $errors[] = "O nome deve ter pelo menos 2 caracteres.";
            }
            
            if (strlen($creci) < 2) {
                $errors[] = "O CRECI deve ter pelo menos 2 caracteres.";
            }
            
            if (strlen($cpf) != 11) {
                $errors[] = "O CPF deve ter exatamente 11 caracteres.";
            }
            
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>" . $error . "</div>";
                }
                include 'cadastro.php'; 
                exit;
            }
            
            $sql = "INSERT INTO tbcorretores (nome, creci, cpf) VALUES ('$nome', '$creci', '$cpf')";
            if (mysqli_query($conn, $sql)) {
                echo "<div class='alert alert-success'>Cadastro realizado com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Erro ao cadastrar: " . mysqli_error($conn) . "</div>";
            }

            $sql = "INSERT INTO `tbcorretores`(`nome`, `cpf`, `creci`) VALUES ('$nome','$cpf','$creci')";


            if (mysqli_query($conn, $sql)) {
                mensagem("$nome cadastrado com sucesso", 'success');
            } else {
                mensagem("$nome não foi cadastrado", 'danger');
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
