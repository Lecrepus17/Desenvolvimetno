<?php
    require('twig_carregar.php');

    $erro = $_GET['erro'] ?? $_POST['erro'] ?? false;

    // renderiza tela
    echo $twig->render('login.html', [
        'erro' => $erro,
    ]);