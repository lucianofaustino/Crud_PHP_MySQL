<?php

$pdo = new PDO("mysql:dbname=crud;hostlocalhost:3306", "root", "");

$sql = $pdo->query("SELECT * FROM usuario");

$dados = $sql->fetchAll();

echo '<pre>';
print_r($dados);
