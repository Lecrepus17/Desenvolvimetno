<?php
    require('twig_carregar.php');
    require('pdo.inc.php');

    $sql = $conex->query('SELECT * FROM alunos');
    $sql = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo $twig->render('administrador/index.html', [
          'user' => $sql,
     
          ]);
	
  

