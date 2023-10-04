<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="escalacao.css">
    <link rel="stylesheet" href="rodape.css">
    <script src="rodape.js"></script>
    <script src="escalacao.js"></script>
</head>
<body>
    <div class="cabecalho">
        <div class="logo" onclick="Aparecer();"> 
            <div class="menu"></div>
            <div class="menu"></div>
            <div class="menu"></div>
        </div>
        <div class="logo"><a href="pagina_inicial.php"><img src="img/LOGO FUT VILLE.png" width="280px"></div></a>
        <div class="logo"><img src="img/noti.png" width="20px"></div>
    </div>


        <div class="lateral" id="lateral">
            <div onclick="Fechar();" class="fechar"><img src=img/x.png width="20px"></div>
            <div class="menu_conta"></div>    
            <div class="rodape2">Cadastro</div><br>
            <div class="rodape2">Escalação</div><br>
            <div class="rodape2">Competições</div><br>
            <div class="rodape2">Ranking</div><br>
            <div class="rodape2">Notícias</div><br>
            <div class="rodape2">Dashboard</div><br>
        </div>
    
    <div class="escalacao">
        <div class="SUAESCALAÇÃO"><b>SUA ESCALAÇÃO</b></div>
    </div>
    <hr>

    <div class="campo">
        <img class="campinho" src="img/campinho.png" width="350px">
    </div>

    <?php
    
    include("conecta.php"); // conectar com banco de dados
    $comando = $pdo->prepare("SELECT * FROM `cadastro`");
    $resultado = $comando->execute();

    while ($linhas = $comando->fetch()) 
        $saldo = $linhas["saldo"];

        echo("<div class=\"carteira\">
        <div class=\"carteira_valor\">
            PREÇO DO TIME <br>
            F$ <b>$saldo</b>
        </div>
        <div class=\"divisao\"></div>
        <div class=\"carteira_saldo\">
            VOCÊ AINDA TEM <br>
            F$ <b>0.00</b>
        </div>
    </div>
    
    ")
    ?>
    <hr>

    <div class="atacante">
            <button class="botao-atacante" id="atacante1" onclick="filtrarAtacantes();"></button>
            <div class="transparente"></div>

            <button class="botao-atacante" onclick="filtrarAtacantes();">
            <span id="atacante2" class="sinal-mais">+</span>
            </button>
            <div class="transparente"></div>

            <button class="botao-atacante" onclick="filtrarAtacantes();">
            <span id="atacante3" class="sinal-mais">+</span>
            </button>
            <div class="transparente"></div>
        </div>

        <div class="meiocampo">
        <button class="botao-atacante" onclick="filtrarMeias();">
            <span id="meio1" class="sinal-mais">+</span>
            </button>
            <div class="transparente"></div>

            <button class="botao-atacante" onclick="filtrarMeias();">
            <span id="meio2" class="sinal-mais">+</span>
            </button>
            <div class="transparente"></div>

            <button class="botao-atacante" onclick="filtrarMeias();">
            <span id="meio3" class="sinal-mais">+</span>
            </button>
            <div class="transparente"></div>
        </div>

        <div class="zagueiro">
            <button class="botao-atacante" onclick="filtrarLaterais();">
            <span id="lateral1" class="sinal-mais">+</span>
            </button>
            <div class="transparente1"></div>

            <button class="botao-atacante" onclick="filtrarZagueiros();">
            <span id="zagueiro1" class="sinal-mais">+</span>
            </button>
            <div class="transparente1"></div>

            <button class="botao-atacante" onclick="filtrarZagueiros();">
            <span id="zagueiro2" class="sinal-mais">+</span>
            </button>
            <div class="transparente1"></div>

            <button class="botao-atacante" id="lateral2" onclick="filtrarLaterais();"></button>
            <div class="transparente1"></div>
        </div>

        <div class="goleiro">
            <button class="botao-atacante" id="goleiro" onclick="filtrarGoleiro();"></button>
        </div>

    <div class="SUAESCALAÇÃO"><b>MERCADO</b></div>
    <br>
    <div class="jogadoresmercado">
    <?php
        
        include("conecta.php"); // conectar com banco de dados
        $comando = $pdo->prepare("SELECT * FROM `jogadores`");
        $resultado = $comando->execute();
        $n = 0;
        while ($linhas = $comando->fetch()) {
            $n = $n+1;
            $nome = $linhas["nome"];
            $foto = $linhas["foto"];
            $foto = base64_encode($foto);
            $posicao = $linhas["posicao"];
            $preco = $linhas["preco"];
        
            
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
                            </div>
                            
                            <div  class=\"comprar botao-comprar\" onclick=\"trocaimagem('$posicao','$foto', 'myButton$n');\" data-action=\"comprar\" id=\"myButton$n\"> COMPRAR </div>
                        </div>

                        </div>
                        </div>
                     </div>


                ");
            }
        ?>

    </div>

    
</html>