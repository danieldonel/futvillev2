<?php
    $id = $_GET["id"];
    include("conecta.php");
    
// email vem cadastro e id do produto q vem do produtos

    $comando = $pdo->prepare("UPDATE escalados SET id='$id' WHERE posicao ='atacante'");
    $resultado = $comando->execute();
    //para voltar no formulário:
  
    ?>