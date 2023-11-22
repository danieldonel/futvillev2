
<?php 
session_start();

include("conecta.php");

if (!isset($_SESSION["nome"]))
{
        $texto="Faça login";
        $imagem="img/perfilsemfoto.png";
}
else
{
    $texto=$_SESSION["nome"];
   
    $id=$_SESSION["id"];
    $comando = $pdo->prepare("SELECT imagem_perfil FROM cadastro WHERE id=$id");
    $resultado = $comando->execute();
    while( $linhas = $comando->fetch() )
    {
        $dados_imagem = $linhas["imagem_perfil"];
        $imagem = base64_encode($dados_imagem);
       
    }


    //$imagem="img/imagem_conta.jpg";
}    

$erroLogin = $_GET["erroLogin"] ?? "";
$erroVazio = $_GET["erroVazio"] ?? "";
    
$usuarioLogado = isset($_SESSION["logado"]) && $_SESSION["logado"] === true;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="escalacao.css">
    <link rel="stylesheet" href="cadastro.css">
    <link rel="stylesheet" href="rodape.css">
    <script src="rodape.js"></script>
    <script src="escalacao.js"></script>
</head>
<body>
<div class="cabecalho">
        <div class="logo" id="hamburguer" onclick="Aparecer();"> 
            <div class="menu"></div>
            <div class="menu"></div>
            <div class="menu"></div>
        </div>
        <div class="logo"><a href="pagina_inicial.php"><img src="img/LOGO FUT VILLE.png" width="280px"></div></a>
        <div class="logo" onclick="Aparecer2()"><img src="img/noti.png" width="20px"></div>
    </div>


        <div class="lateral" id="lateral">
            <div onclick="Fechar();" class="fechar"><img src=img/x.png width="20px"></div> <br>      
            <div class="foto_conta">
                <div class="imagem_conta" onclick="escolherfoto();">

                

                
             


    <?php
                  
                if ($imagem=="" || $imagem=="img/perfilsemfoto.png")
                {
                    echo("<img class=\"imagem_conta\" src='img/perfilsemfoto.png' width=\"100%\">");
 
                }
                else{
                echo("<img class=\"imagem_conta\" src='data:image/jpeg;base64,$imagem' width=\"100%\">");
                

            }
            
            
     ?>       
            
            
            </div>



           



            
                <div class="nome_imagem"><?php echo( $texto); ?></div>
            </div> <br><br>
            <div class="menu_conta">  
            <a href="cadastro.php"> <div class="rodape2">Cadastro</div></a><br>
            <a href="escalacao.php"><div class="rodape2">Escalação</div><br>
            <a href="competições.php"><div class="rodape2">Competições</div><br></a>
           
            <a href="noticiacerta.php"><div class="rodape2">Notícias</div><br></a>
            <a href="dashboard.php"><div class="rodape2">Dashboard</div><br></a>
            
            <?php if ($usuarioLogado): ?>
            <a href="logout.php" class="logout-button">
            <span class="logout-icon"></span> Sair
            </a>
           
            <form id="formimagem" action="adicionarfoto.php" method="post" enctype="multipart/form-data">
            <input id="nova_imagem_perfil" type="file" onchange="enviar_foto();" name="foto" accept="image/*">
           
            </form>
             <?php endif; ?>


            </div>  
        </div>
        
  
        
    
    
        <div class="quadrado_anuncio"></div>

        <div class="lateral2" id="lateral2">
         
                <h3 class="titulo">NOTIFICAÇÕES</h1>
                
        <?php
include("conecta.php");
$comando = $pdo->prepare("SELECT * FROM notificacao ");
$resultado = $comando->execute();


while ($linhas = $comando->fetch()) {
    
    $noti = $linhas["noti"];
    $link = $linhas["link"];


    echo ("
 
    <br>
  
    
    <a class=\"mensagem\" href=\"$link\"><div class=\"mensagem\" >$noti</div></a>");


}
?>
        <div onclick="Fechar2();" class="fechar2"><img src=img/x.png width="20px"></div> 
        
    </script>


    </div>
</html>
    
    <div class="escalacao">
        <div class="SUAESCALAÇÃO"><b>SUA ESCALAÇÃO</b></div>
    </div>
    <hr>

    <div class="campo">
        <img class="campinho" src="img/campinho.png" width="350px">
    </div>

   <div class="carteira">
        <div class="carteira_valor">
            PREÇO DO TIME <br>
            F$ <b>0.00</b>
        </div>
        <div class="divisao"></div>
        <div class="carteira_saldo">
            VOCÊ AINDA TEM <br>
            F$ <b>0.00</b>
        </div>
    </div>

    <hr>
    
    
    <?php
include("conecta.php"); // conectar com banco de dados

if ($_SESSION["logado"]) {
    $idUsuarioLogado = $_SESSION["id"];
} else {
    // O usuário não está logado
    // Redirecione ou tome outra ação apropriada
}

$comando = $pdo->prepare("SELECT * FROM escalacao INNER JOIN jogadores1 ON jogadores1.id = escalacao.atacante WHERE escalacao.id = ?");
$resultado = $comando->execute([$idUsuarioLogado]);

while ($linhas = $comando->fetch()) {
    $id = $linhas["id"];
    $nome = $linhas["nome"];
    $foto = base64_encode($linhas["foto"]);
    $posicao = $linhas["posicao"];
    $preco = $linhas["preco"];
    ?>
    <div class="atacante">
        <img src="img/jogadores1.png" class="botao-atacante" onclick="filtrarAtacantes();">
        <div class="transparente"></div>

        <img src="data:image/jpeg;base64, <?php echo $foto; ?>" class="botao-foto" onclick="filtrarAtacantes();">
        <div class="transparente"></div>

        <img src="img/jogadores1.png" class="botao-atacante" onclick="filtrarAtacantes();">
        <div class="transparente"></div>
    </div>
    <?php
}
?>

<?php
include("conecta.php"); // conectar com banco de dados

$comando = $pdo->prepare("SELECT * FROM escalacao INNER JOIN jogadores1 ON jogadores1.id = escalacao.meio WHERE escalacao.id = ?");
$resultado = $comando->execute([$idUsuarioLogado]);

while ($linhas = $comando->fetch()) {
    $id = $linhas["id"];
    $nome = $linhas["nome"];
    $foto = base64_encode($linhas["foto"]);
    $posicao = $linhas["posicao"];
    $preco = $linhas["preco"];
    ?>
    <div class="meiocampo">
        <img src="img/jogadores1.png" class="botao-atacante" onclick="filtrarMeias();">
        <div class="transparente"></div>

        <img src="data:image/jpeg;base64, <?php echo $foto; ?>" class="botao-foto" onclick="filtrarMeias();">
        <div class="transparente"></div>

        <img src="img/jogadores1.png" class="botao-atacante" onclick="filtrarMeias();">
        <div class="transparente"></div>
    </div>
    <?php
}
?>

<?php
include("conecta.php"); // conectar com banco de dados

$comando = $pdo->prepare("SELECT * FROM escalacao INNER JOIN jogadores1 ON jogadores1.id = escalacao.zagueiro WHERE escalacao.id = ?");
$resultado = $comando->execute([$idUsuarioLogado]);

while ($linhas = $comando->fetch()) {
    $id = $linhas["id"];
    $nome = $linhas["nome"];
    $foto = base64_encode($linhas["foto"]);
    $posicao = $linhas["posicao"];
    $preco = $linhas["preco"];
    ?>
    <div class="zagueiro">
        <img src="img/jogadores1.png" class="botao-atacante" onclick="filtrarAtacantes();">
        <div class="transparente1"></div>

        <img src="data:image/jpeg;base64, <?php echo $foto; ?>" class="botao-foto" onclick="filtrarAtacantes();">
        <div class="transparente1"></div>

    </div>
    <?php
}
?>

<?php
include("conecta.php"); // conectar com banco de dados

$comando = $pdo->prepare("SELECT * FROM escalacao INNER JOIN jogadores1 ON jogadores1.id = escalacao.lateral WHERE escalacao.id = ?");
$resultado = $comando->execute([$idUsuarioLogado]);

while ($linhas = $comando->fetch()) {
    $id = $linhas["id"];
    $nome = $linhas["nome"];
    $foto = base64_encode($linhas["foto"]);
    $posicao = $linhas["posicao"];
    $preco = $linhas["preco"];
    ?>
    <div class="l">
        <img src="img/jogadores1.png" class="botao-atacante" onclick="filtrarLaterais();">
        <div class="transparente1"></div>

        <img src="data:image/jpeg;base64, <?php echo $foto; ?>" class="botao-foto" onclick="filtrarLaterais();">
        <div class="transparente1"></div>

    </div>
    <?php
}
?>


<?php
include("conecta.php"); // conectar com banco de dados

$comando = $pdo->prepare("SELECT * FROM escalacao INNER JOIN jogadores1 ON jogadores1.id = escalacao.goleiro WHERE escalacao.id = ?");
$resultado = $comando->execute([$idUsuarioLogado]);

while ($linhas = $comando->fetch()) {
    $id = $linhas["id"];
    $nome = $linhas["nome"];
    $foto = base64_encode($linhas["foto"]);
    $posicao = $linhas["posicao"];
    $preco = $linhas["preco"];
    ?>
    <div class="goleiro">
        <img src="data:image/jpeg;base64, <?php echo $foto; ?>" class="botao-foto" onclick="filtrarGoleiro();">
        <div class="transparente1"></div>
    </div>
    <?php
}
?>

<div class="atacante">
            <img src="img/jogadores1.png" class="botao-atacante" onclick="filtrarAtacantes();"></button>
            <div class="transparente"></div>

            <button class="botao-atacante" onclick="filtrarAtacantes();">
            <span id="atacante" class="sinal-mais">+</span>
            </button>
            <div class="transparente"></div>

            <img src="img/jogadores1.png" class="botao-atacante" onclick="filtrarAtacantes();"></button>
            <div class="transparente"></div>
        </div>

        <div class="meiocampo">
        <img src="img/jogadores1.png" class="botao-atacante" onclick="filtrarAtacantes();"></button>
            <div class="transparente"></div>


            <button class="botao-atacante" onclick="filtrarMeias();">
            <span id="meio" class="sinal-mais">+</span>
            </button>
            <div class="transparente"></div>

            <img src="img/jogadores1.png" class="botao-atacante" onclick="filtrarAtacantes();"></button>
            <div class="transparente"></div>

        </div>

        <div class="zagueiro">
        <img src="img/jogadores1.png" class="botao-atacante" onclick="filtrarAtacantes();"></button>
            <div class="transparente1"></div>


            <button class="botao-atacante" onclick="filtrarZagueiros();">
            <span id="zagueiro" class="sinal-mais">+</span>
            </button>
            <div class="transparente1"></div>

            <img src="img/jogadores1.png" class="botao-atacante" onclick="filtrarAtacantes();"></button>
            <div class="transparente1"></div>

            <button class="botao-atacante" onclick="filtrarZagueiros();">
            <span id="lateral" class="sinal-mais">+</span>
            </button>
            <div class="transparente1"></div>
        </div>

        <div class="goleiro">
            <button class="botao-atacante" onclick="filtrarGoleiro();">
            <span id="goleiro" class="sinal-mais">+</span>
            </button>
            <div class="transparente1"></div>
        </div>



        <?php
include("conecta.php");

// Supondo que você tenha uma variável $idUsuario definida em algum lugar do seu código.
$idUsuario = 1;

$comando = $pdo->prepare("SELECT * FROM `jogadores1`");
$resultado = $comando->execute();

while ($linhas = $comando->fetch()) {
    $id = $linhas["id"];
    $nome = $linhas["nome"];
    $foto = $linhas["foto"];
    $foto = base64_encode($foto);
    $posicao = $linhas["posicao"];
    $preco = $linhas["preco"];

    // Verifica se o jogador está na escalação do usuário
    $comandoVerificaEscala = $pdo->prepare("SELECT COUNT(*) FROM `escalacao` WHERE `id` = ? AND (`atacante` = ? OR `meio` = ? OR `lateral` = ? OR `goleiro` = ? OR `zagueiro` = ?)");
    $comandoVerificaEscala->execute([$idUsuarioLogado, $id, $id, $id, $id, $id]);
    $jogadorNaEscala = $comandoVerificaEscala->fetchColumn() > 0;

    echo("<div style=\"margin-bottom: 10px;\"></div>");

    echo("
        <div class=\"tudo\" data-posicao=\"$posicao\">
            <div class=\"fild\">
                <img src=\"data:image/jpeg;base64,$foto\" class=\"fotomercado\" width='120px' height='120px'>

                <div class=\"jogador\">
                    <div class=\"nome\">$nome</div>

                    <div class=\"posicao\">$posicao</div>
                    <br>

                    <div class=\"info\">
                        <div class=\"precos\">
                            F$<div class=\"preco\">$preco</div>
                        </div>");

    if ($jogadorNaEscala) {
        // Se o jogador estiver na escalação, exibe o botão VENDER
        echo("<button class=\"comprar botao-vender\" data-action=\"vender\" data-id=\"$id\" data-posicao=\"$posicao\"> VENDER </button>");
    } else {
        // Se o jogador não estiver na escalação, exibe o botão COMPRAR
        echo("<button class=\"comprar botao-comprar\" data-action=\"comprar\" data-id=\"$id\" data-posicao=\"$posicao\"> COMPRAR </button>");
    }

    echo("
                    </div>
                </div>
            </div>
        </div>
    ");
}
?>

</div>

    
</html>