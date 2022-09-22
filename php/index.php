<?php
require 'config.php';

$lista = [];
$sql = $pdo->query("SELECT * FROM usuario");
if ($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<section>
    <h1>Lista de usuários</h1>

    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Editar/Deletar</th>
        </tr>
        <?php foreach ($lista as $usuario) : ?>
            <tr>
                <td><?= $usuario['id'] ?></td>
                <td><?= $usuario['nome'] ?></td>
                <td><?= $usuario['email'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $usuario['id'] ?>">Editar ||</a>
                    <a href="deletar.php?id=<?= $usuario['id'] ?>">Deletar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="cadastrar.php">Cadastrar</a>
</section>