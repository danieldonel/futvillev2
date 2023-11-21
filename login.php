<?php
session_start();
$_SESSION["logado"] = false;
$email = $_POST["email"];
$senha = $_POST["senha"];
include("conecta.php");

if (!empty($email) && !empty($senha)) {
    $comando = $pdo->prepare("SELECT id, nome FROM cadastro WHERE email=:email AND senha=:senha");
    $comando->bindParam(":email", $email);
    $comando->bindParam(":senha", $senha);
    $resultado = $comando->execute();
    $linhas = $comando->fetchAll(); // Busca todas as linhas correspondentes

    if (count($linhas) > 0) {
        if (isset($linhas[0]["id"])) {
            $id = $linhas[0]["id"];
            $nome = $linhas[0]["nome"];
            $_SESSION["logado"] = true;
            $_SESSION["nome"] = $nome;
            $_SESSION["id"] = $id; // Adiciona o ID à sessão
        
            if ($email == "admin") {
                header("Location: pagina_adm.php");
            } else {
                header("Location: pagina_inicial.php");
            }
            exit;
        } else {
            // A coluna "id" não está definida no resultado da consulta
            echo "A coluna 'id' não está definida no resultado da consulta.";
            exit;
        }
    }
}    