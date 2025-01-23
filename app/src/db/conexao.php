<?php
 $server = "localhost";
 $bd = "bdtesteimovel";
 $user = "root"; 
 $pass = ""; 
 
    if ($conn = mysqli_connect($server, $user, $pass, $bd)) {
        //echo "Conectado!";
    } else
        echo "Erro na conexão!";

    function mensagem($texto, $tipo) {
        echo "<div class='alert alert-$tipo' role='alert'>
            $texto
        </div>";
    }    
    
?>