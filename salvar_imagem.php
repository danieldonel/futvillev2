<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="salvar_imagem.css"> <!-- CONECTA CSS -->
    <script src="rodape.js"></script> <!-- CONECTA JS -->
    <title>Notícias</title>
</head>
<body>
<div class="cabecalho">
        <div class="logo" onclick="Aparecer();"> 
            <div class="menu"></div>
            <div class="menu"></div>
            <div class="menu"></div>
        </div>
        <div class="logoprinc"><img src="img/ntc.png" width="280px"></div>
        <a href="index.html"><div class="logofut"><img src="img/logo1.png" width="60px"></div></a>
    </div>

    <div class="lateral" id="lateral">
            <div onclick="Fechar();" class="fechar"><img src=img/x.png width="20px"></div>
            <div class="menu_conta"></div>    
            <div class="rodape2">Cadastro</div><br>
            <div class="rodape2">Escalação</div><br>
            <div class="rodape2">Competições</div><br>
            <div class="rodape2">Ranking</div><br>
            <a href="ntc.html"><div class="rodape2">Notícias</div></a><br>
            <div class="rodape2">Dashboard</div><br>
        </div>
    
</body>
</html>
<?php
        // ATENÇÃO: o tipo da coluna na tabela deve ser MEDIUMBLOB
        include("conecta.php");

        $id = $_POST["id"];
        $produto = $_POST["produto"];
        $codigo = $_POST["codigo"];

        // Lê o conteúdo do arquivo de imagem e armazena na variável $imagem
		$imagem = file_get_contents($_FILES["imagem"]["tmp_name"]);
		
		$comando = $pdo->prepare("INSERT INTO codigos(id,produto,codigo,foto) VALUES(:id,:produto,:codigo,:foto)");
        $comando->bindParam(":id", $id);
        $comando->bindParam(":produto", $produto);
        $comando->bindParam(":codigo", $codigo);
        $comando->bindParam(":foto", $imagem, PDO::PARAM_LOB);
		$resultado = $comando->execute();



        
        // As linhas abaixo você usará sempre que quiser mostrar a imagem

        $comando = $pdo->prepare("SELECT * FROM codigos");
		$resultado = $comando->execute();
        while( $linhas = $comando->fetch() )
        {
            $dados_imagem = $linhas["foto"];
            $i = base64_encode($dados_imagem);

            $id =  $linhas["id"];
            $produto =  $linhas["produto"];
            $codigo =  $linhas["codigo"];

            echo("<h2 class=\"title\"> $produto <br> </h2>");
            echo(" <div class=\"red\"> $codigo  <br> </div>");
            echo(" <img src=\"data:image/jpeg;base64,$i\" class=\"ntc1\"><hr>");
        }
		
?>

