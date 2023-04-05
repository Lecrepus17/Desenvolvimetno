<?php
require('pdo.inc.php');

$sql = $conex->query('SELECT * FROM alunos');
$sql = $sql->fetch(PDO::FETCH_ASSOC);

var_dump($sql);