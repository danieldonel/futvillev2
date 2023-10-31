<?php
session_start();

if ($_SESSION["logado"]==false) {
    header("Location:cadastro.php"); // Redirecionar se não estiver logado
    exit();
}


include("conecta.php");


$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $logado = $_SESSION["id"];
    
    // Processar o upload da nova imagem de perfil
    if (isset($_FILES["nova_imagem_perfil"]) && $_FILES["nova_imagem_perfil"]["error"] === UPLOAD_ERR_OK) {
        $nome_temporario = $_FILES["nova_imagem_perfil"]["tmp_name"];
        $nome_arquivo = $_FILES["nova_imagem_perfil"]["name"];
        $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);
        $nome_arquivo_salvar = uniqid() . "." . $extensao;

        $caminho_destino = "caminho/para/pasta/de/imagens/" . $nome_arquivo_salvar;

        if (move_uploaded_file($nome_temporario, $caminho_destino)) {
            $imagem_perfil = $caminho_destino;

            // Atualizar o caminho da imagem no banco de dados para o usuário atual
            $atualizar_imagem = "UPDATE cadastro SET imagem_perfil = ? WHERE id = ?";
            $resultado = $pdo->prepare($atualizar_imagem)->execute([$imagem_perfil, $usuario_id]);

            if ($resultado) {
                $mensagem = "Imagem de perfil atualizada com sucesso!";
            } else {
                $mensagem = "Erro ao atualizar a imagem de perfil.";
            }
        } else {
            $mensagem = "Erro no upload da imagem.";
        }
    }
}

$imagem_perfil = "caminho_padrao_da_imagem"; // Defina um valor padrão ou use o valor do banco de dados

// ...
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Seus cabeçalhos aqui -->
</head>
<body>
    <h1>Editar Perfil</h1>
    <p><?php echo $mensagem; ?></p>

    <div class="imagem_conta">
        <img class="imagem_conta" src="<?php echo $imagem_perfil; ?>" width="100%">
    </div>

    <form action="editar_perfil.php" method="post" enctype="multipart/form-data">
        <input id="nova_imagem_perfil" type="file" name="nova_imagem_perfil" accept="image/*">
        <input type="submit" value="Enviar">
    </form>

    <!-- ... -->

</body>
</html>
