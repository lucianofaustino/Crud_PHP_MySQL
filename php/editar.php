<?php
require 'config.php';

$usuario = [];
$id = filter_input(INPUT_GET, 'id');
if ($id) {
    $sql = $pdo->prepare("SELECT * FROM usuario WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
}

?>

<section>
    <h1>Editar usuário</h1>
    <form method="POST" action="editar_dados.php">

        <input type="hidden" name="id" value=" <?= $id; ?>">
        

        <label for="nome">Nome</label>
        <input id="nome" name="nome" type="text" value=" <?= $usuario['nome']; ?>">
        <label for="email">E-mail</label>

        <input id="email" name="email" type="email" value=" <?= $usuario['email']; ?>"">
        <button id="salvar" name="salvar" type="submit" class="btn">Salvar</button>
    </form>
</section>