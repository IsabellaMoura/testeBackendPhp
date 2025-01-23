<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <header class="container-fluid bg-dark text-light">
        <div class="text-center">Lista</div>
    </header>
</head>
<body>

    <?php
        $pesquisa = $_POST['busca'] ?? '';
        include "./db/conexao.php";
        $sql = "SELECT * FROM tbcorretores where nome LIKE '%$pesquisa%' ";
        $dados = mysqli_query($conn, $sql);

    ?>


    <div class="container">
      <div class="row">
      <div class="col">
        <nav class="navbar navbar-light bg-light">
        <!-- <form class="form-inline" action="pesquisa.php" method="post">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisa</button>
        </form> -->
        </nav>
        <table class="table table-hover table-dark">
        <thead>
            <tr>
            <th scope="col">Nome</th>
            <th scope="col">Creci</th>
            <th scope="col">CPF</th>
            <th scope="col">Config</th>
            </tr>
        </thead>
        <tbody>
            <?php    
            while($linha = mysqli_fetch_assoc($dados)){
                $id = $linha['id'];
                $nome = $linha['nome'];
                $creci = $linha['creci'];
                $cpf = $linha['cpf'];

                echo "<tr>
                        <th scope='row'>$nome</th>
                        <td>$creci</td>
                        <td>$cpf</td>
                        <td width=150px>
                        <a href='cadastro_edit.php?id=$id' class='btn btn-success btn-sm'>Editar</a>
                        <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma'
                        onclick=" .'"' ."pegar_dados($id, '$nome')" .'"' .">Excluir</a>
                        </td>    
                     </tr>";
            }

            ?>

        </tbody>
        </table>
        <a href="/../teste_backend_imovel_guide/app/" class="btn btn-primary">Voltar</a>
        </div>
      </div>  
    </div>

    <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Exclusão</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="excluir_info.php" method="POST">
            <p>Deseja realmente excluir? <b id="nome">Nome da pessoa</b></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
            <input type="hidden" name="id" id="id" value="">
            <input type="hidden" name="nome" id="nome_1" value="">
            <input type="submit" class="btn btn-danger" value="Excluir">
            </form>
        </div>
        </div>
    </div>
    </div>

    <script type="text/javascript">
        function pegar_dados(id, nome){
            document.getElementById('nome').innerHTML = nome;
            document.getElementById('nome_1').value = nome;
            document.getElementById('id').value = id;
        }
    </script>    

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
