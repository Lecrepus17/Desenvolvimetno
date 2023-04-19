<?php
    require('twig_carregar.php');
    require('pdo.inc.php');

    $nome = $_POST['nome'] ?? false;
    $senha = $_POST['senha'] ?? false;
    
    $sql2 = $conex->prepare('SELECT * FROM `admin` WHERE nome = :nome AND senha = :senha');
    $sql2->bindParam(':nome', $nome);
    $sql2->bindParam(':senha', $senha);
    $sql2->execute();
    $sql2 = $sql2->fetch(PDO::FETCH_ASSOC);


  if($sql2){
  
    header('location:administrador.php');
       
        die;
}else{
  header('location:Login.php');
}

