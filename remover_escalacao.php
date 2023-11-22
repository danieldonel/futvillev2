<?php
include("conecta.php");

session_start();
if ($_SESSION["logado"]) {
    $idUsuarioLogado = $_SESSION["id"];
    // Faça o que for necessário com o ID do usuário logado
} else {
    // O usuário não está logado
    // Redirecione ou tome outra ação apropriada
}

echo "ID do Usuário: $idUsuarioLogado<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idJogador = $_POST["id_jogador"];
    $posicao = $_POST["posicao"];

    // Saída de depuração
    echo "ID do Jogador: $idJogador<br>";
    echo "Posição: $posicao<br>";

    // Verifique a posição e ajuste a coluna correspondente
    if ($posicao == "atacante") {
        // Lógica para a posição "atacante"
        $comando = $pdo->prepare("UPDATE escalacao SET atacante = 0 WHERE id = ?");
        $comando->execute([$idUsuarioLogado]);
    
        // Retornar uma resposta ao cliente, se necessário
        echo "Jogador removido da escalação como atacante com sucesso!";
    } elseif ($posicao == "meio") {
        // Lógica para a posição "meio"
        $comando = $pdo->prepare("UPDATE escalacao SET meio = 0 WHERE id = ?");
        $comando->execute([$idUsuarioLogado]);
    
        // Retornar uma resposta ao cliente, se necessário
        echo "Jogador removido da escalação como meio com sucesso!";
    } elseif ($posicao == "zagueiro") {
        // Lógica para a posição "zagueiro"
        $comando = $pdo->prepare("UPDATE escalacao SET zagueiro = 0 WHERE id = ?");
        $comando->execute([$idUsuarioLogado]);
    
        // Retornar uma resposta ao cliente, se necessário
        echo "Jogador removido da escalação como zagueiro com sucesso!";
    } elseif ($posicao == "lateral") {
        // Lógica para a posição "lateral"
        $comando = $pdo->prepare("UPDATE escalacao SET lateral = 0 WHERE id = ?");
        $comando->execute([$idUsuarioLogado]);
    
        // Retornar uma resposta ao cliente, se necessário
        echo "Jogador removido da escalação como lateral com sucesso!";
    } elseif ($posicao == "goleiro") {
        // Lógica para a posição "goleiro"
        $comando = $pdo->prepare("UPDATE escalacao SET goleiro = 0 WHERE id = ?");
        $comando->execute([$idUsuarioLogado]);
    
        // Retornar uma resposta ao cliente, se necessário
        echo "Jogador removido da escalação como goleiro com sucesso!";
    } else {
        // Saída de depuração
        echo "Posição não reconhecida";
    }
}
?>
