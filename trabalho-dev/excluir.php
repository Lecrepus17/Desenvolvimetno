<?php
require('twig_carregar.php');
require('pdo.inc.php');
require('func/sanitize_filename.php');
require('func/function.php');

// Vejo se não passei índice, volta para a listagem
if(!isset($_GET['indice'])){
    header("Location:administradoradministrador.php");
}
//Pega o índice
$id =  $_GET['indice'] ?? false;
$tipo = $_GET['tipo'] ?? false;

    




if ($tipo == 'aluno'){
    deleteAluno( $id );
    // Redireciona para a página inicial
    header('Location:administrador.php');
    die;
}elseif($tipo == 'turma'){
    deleteTurma( $id );
     // Redireciona para a página inicial
    header('Location:administrador.php');
    die;
}
elseif($tipo == 'curso'){
    deleteCurso( $id );
    // Redireciona para a página inicial
    header('Location:administrador.php');
    die;
}
elseif($tipo == 'nivel'){
    deleteNivel( $id );
    // Redireciona para a página inicial
    header('Location:administrador.php');
    die;
};


?>