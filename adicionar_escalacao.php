<?php
include("conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idJogador = $_POST["id_jogador"];
    $posicao = $_POST["posicao"];

    // Saída de depuração
    echo "ID do Jogador: $idJogador<br>";
    echo "Posição: $posicao<br>";

    // Verifique a posição e ajuste a coluna correspondente
    if ($posicao == "atacante") {
        // Lógica para a posição "atacante"
        $comando = $pdo->prepare("INSERT INTO escalacao (atacante) VALUES (?)");
        $comando->execute([$idJogador]);

        // Retornar uma resposta ao cliente, se necessário
        echo "Jogador adicionado à escalação como atacante com sucesso!";
    } elseif ($posicao == "meio") {
        // Lógica para a posição "meio"
        $comando = $pdo->prepare("INSERT INTO escalacao (meio) VALUES (?)");
        $comando->execute([$idJogador]);

        // Retornar uma resposta ao cliente, se necessário
        echo "Jogador adicionado à escalação como meio com sucesso!";
    } elseif ($posicao == "zagueiro") {
        // Lógica para a posição "zagueiro"
        $comando = $pdo->prepare("INSERT INTO escalacao (zagueiro) VALUES (?)");
        $comando->execute([$idJogador]);

        // Retornar uma resposta ao cliente, se necessário
        echo "Jogador adicionado à escalação como zagueiro com sucesso!";
    } elseif ($posicao == "lateral") {
        // Lógica para a posição "lateral"
        $comando = $pdo->prepare("INSERT INTO escalacao (lateral) VALUES (?)");
        $comando->execute([$idJogador]);

        // Retornar uma resposta ao cliente, se necessário
        echo "Jogador adicionado à escalação como lateral com sucesso!";
    } elseif ($posicao == "goleiro") {
        // Lógica para a posição "goleiro"
        $comando = $pdo->prepare("INSERT INTO escalacao (goleiro) VALUES (?)");
        $comando->execute([$idJogador]);

        // Retornar uma resposta ao cliente, se necessário
        echo "Jogador adicionado à escalação como goleiro com sucesso!";
    } else {
        // Saída de depuração
        echo "Posição não reconhecida";
    }
}
?>
