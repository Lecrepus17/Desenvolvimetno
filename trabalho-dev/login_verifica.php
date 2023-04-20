<?php
    require('twig_carregar.php');
    require('pdo.inc.php');
    // pega informações
    $nome = $_POST['nome'] ?? false;
    $senha = $_POST['senha'] ?? false;
    // confirma adm
    $sql = $conex->prepare('SELECT * FROM `admin` WHERE nome = :nome AND senha = :senha');
    $sql->bindParam(':nome', $nome);
    $sql->bindParam(':senha', $senha);
    $sql->execute();
    $sql = $sql->fetch(PDO::FETCH_ASSOC);

  // verifica se está certo
  if($sql){
    // envia para listagem
    header('location:administrador.php');
    die;
}else{
    // volta para login
    header('location:Login.php');
}

