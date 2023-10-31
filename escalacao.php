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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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


    <?php

        include("conecta.php"); // conectar com banco de dados
        $comando = $pdo->prepare("SELECT DISTINCT jogadores.id, jogadores.foto, escalacao.atacante1, escalacao.atacante2, escalacao.atacante3, escalacao.meio1, escalacao.meio2, escalacao.meio3, escalacao.zagueiro1, escalacao.zagueiro2, escalacao.lateral1, escalacao.lateral2, escalacao.goleiro FROM escalacao JOIN jogadores ON escalacao.atacante1 = jogadores.id OR escalacao.atacante2 = jogadores.id OR escalacao.atacante3 = jogadores.id OR escalacao.meio1 = jogadores.id OR escalacao.meio2 = jogadores.id OR escalacao.meio3 = jogadores.id OR escalacao.zagueiro1 = jogadores.id OR escalacao.zagueiro2 = jogadores.id OR escalacao.lateral1 = jogadores.id OR escalacao.lateral2 = jogadores.id OR escalacao.goleiro = jogadores.id WHERE jogadores.id IS NOT NULL;");
        $resultado = $comando->execute();

        $posicoes = array('atacante1', 'atacante2', 'atacante3', 'meio1', 'meio2', 'meio3', 'zagueiro1', 'zagueiro2', 'lateral1', 'lateral2', 'goleiro');
        $jogadores = array(); // Array para armazenar os jogadores únicos

        while ($linhas = $comando->fetch()) {
            $id = $linhas["id"];
            if (!in_array($id, $jogadores)) {
                $foto = base64_encode($linhas["foto"]);
                $jogadores[] = $id; // Adiciona o id do jogador ao array para evitar duplicatas
                
                echo("<img src=\"data:image/jpeg;base64,$foto\" class=\"fotopreenchida ");
                
                $posicaoEncontrada = false;
                foreach ($posicoes as $posicao) {
                    if (!empty($linhas[$posicao]) && $linhas[$posicao] == $id) {
                        echo($posicao);
                        $posicaoEncontrada = true;
                        break;
                    }
                }
                
                if (!$posicaoEncontrada) {
                    echo("Posição não encontrada");
                }
                
                echo("\">");
                echo("<div class=\"transparente\"></div>");
                echo("</div>");
            }
        }
    ?>




    <?php
        
        include("conecta.php"); // conectar com banco de dados
        $comando = $pdo->prepare("SELECT * FROM `jogadores`");
        $resultado = $comando->execute();
        while ($linhas = $comando->fetch()) {
            $id = $linhas ["id"];
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
                            
                            <div  class=\"comprar botao-comprar\" data-action=\"comprar\" id=\"$id\"> COMPRAR </div>
                        </div>

                        </div>
                        </div>
                     </div>


                ");
            }
        ?>

</div>

    
</html>