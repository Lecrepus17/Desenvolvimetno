<?php
require('twig_carregar.php');
require('pdo.inc.php');

$nome = $_POST['nome'] ?? false;
$senha = $_POST['senha'] ?? false;

$sql = $conex->prepare('SELECT * FROM alunos WHERE nome_aluno = :nome AND senha = :senha');
$sql->bindParam(':nome', $nome);
$sql->bindParam(':senha', $senha);
$sql->execute();
$sql = $sql->fetch(PDO::FETCH_ASSOC);

    
    
  if($sql){
    echo $twig->render('cartao.html', [
          'user' => $sql,
          ]);
        die;
}else{
  header('location:Login.php');
}
