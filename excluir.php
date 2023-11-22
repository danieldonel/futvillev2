<?php
  include("conecta.php");
    $nome="";
    $email="";

  if(isset($_GET["email"]))
  {
    $email=$_GET["email"];
    $comando = $pdo->prepare("SELECT * FROM codigos WHERE email='$email'");
    $resultado = $comando->execute();
    while($linha=$comando->fetch() )
    {
      $nome=$linha["nome"];
      $email=$linha["email"];
 
    }

    
  }  
?>

<div class=tudo><?php
     include("conecta.php");
    $comando = $pdo->prepare("SELECT * FROM codigos");
    $resultado = $comando->execute();
    while( $linhas = $comando->fetch() )
    {
        
        $id = $linhas["id"];
        $nome =  $linhas["produto"];
        $email =  $linhas["codigo"];
  
        
        echo( "Id: $id / Nome: $nome / Email: $email <br>");
    
    }
    ?>
    <?php
  include("conecta.php");
    $id="";
    $nome="";
    $email="";

  if(isset($_GET["email"]))
  {
    $email=$_GET["email"];
    $comando = $pdo->prepare("SELECT * FROM codigos WHERE email='$email'");
    $resultado = $comando->execute();
    while($linha=$comando->fetch() )
    {
      $id=$linha["id"];
      $nome=$linha["produto"];
      $email=$linha["codigo"];

    
    }
  }
?></div>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
    <link rel="stylesheet" href="cadastro.css">
    <link rel="shortcut icon" href="imagens/icone2.png" type="image/x-icon">
    <style>
        body{
            background-image:url("imagens/cadastro2.png");
            background-size: 170%;
        }
    
    </style>
</head>
<body>
<h2 class=titulo>Cadastrantes aqui:</h2>

    <section class="area-login">
        <div class="login">

        
        <form action="crud.php" method="post">
            <input type="text" name="id" placeholder="ID" autofocus> 
            <input type="text" name="nome" placeholder="TÍTULO" autofocus> 
            <input type="text" name="email" placeholder="TEXTO" autofocus>

            
                
                <div class="icone3"><img src="img/icone3.png" alt="icone" width="27px"></div>
                <div class="icone4"><img src="img/icone4.png" alt="icone" width="37px"></div>
                <button class="botoes" name="excluir" type="submit">Excluir</button>
                <button class="botoes" name="alterar" type="submit">Alterar</button>
                <h2 class=sele>*Selecionar ID para alterar/excluir</h2>
            
        </form>



    </section>
</body>
</html>