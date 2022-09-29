<?php

require 'config.php';

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');

if (!preg_match("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ'\s]+$/", $nome)) {
    echo "Por favor, insira um  nome válido.";
    // o `die` pausa a execução do código
    die();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Por favor, insira um  email válido.";
    die();
}
if ($nome && $email) {
    
    $sql = $pdo->prepare('SELECT * FROM usuario WHERE email = :email');
    // Verificação se o email que está sendo inserido já existe no banco de dados.
    $sql->bindValue(':email', $email);
    $sql->execute();

    // Condição
    if ($sql->rowCount() === 0) {

        $sql = $pdo->prepare('INSERT INTO usuario (nome, email) VALUES (:nome, :email)');
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);

        $sql->execute();

        header("location: index.php");
        exit;
    } else {
        echo "Email já cadastrado. Cadastre outro email.";

    }
} else {
    header("location: cadastrar.php");
}
