<?php
include("conecta.php"); // conectar com banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["jogadorId"])) {
    $jogadorId = $_POST["jogadorId"];

    // Verificar as próximas posições vazias na tabela escalacao
    $posicoes = array('atacante1', 'atacante2', 'atacante3', 'meio1', 'meio2', 'meio3', 'zagueiro1', 'zagueiro2', 'lateral1', 'lateral2', 'goleiro');
    $posicaoVazia = null;

    foreach ($posicoes as $posicao) {
        $comando = $pdo->prepare("SELECT COUNT(*) AS total FROM escalacao WHERE $posicao IS NULL");
        $comando->execute();
        $resultado = $comando->fetch(PDO::FETCH_ASSOC);

        if ($resultado["total"] > 0) {
            $posicaoVazia = $posicao;
            break;
        }
    }

    // Se encontrou uma posição vazia, adicione o jogador
    if ($posicaoVazia) {
        $comando = $pdo->prepare("UPDATE escalacao SET $posicaoVazia = :jogadorId WHERE $posicaoVazia IS NULL LIMIT 1");
        $comando->bindParam(':jogadorId', $jogadorId);
        $comando->execute();
        echo "Jogador adicionado com sucesso na posição $posicaoVazia.";
    } else {
        echo "Todas as posições estão preenchidas. Não é possível adicionar mais jogadores.";
    }
} else {
    echo "Erro: Requisição inválida.";
}
?>