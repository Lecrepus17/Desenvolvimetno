<?php
require('twig_carregar.php');
require('pdo.inc.php');
require('func/sanitize_filename.php');
require('func/function.php');
require('verifica_session.php');

// Vejo se não passei índice, volta para a listagem
if(!isset($_GET['indice'])){
    header("Location:administrador.php");
}

if($_SESSION['nome']){
    //Pega o índice e o tipo de função
$id =  $_GET['indice'] ?? false;
$tipo = $_GET['tipo'] ?? false;

    



// exclui aluno
if ($tipo == 'aluno'){
    deleteAluno( $id );
    // Redireciona para a listagem
    header('Location:administrador.php');
    die;
}// exclui turma
elseif($tipo == 'turma'){
    deleteTurma( $id );
     // Redireciona para a listagem
    header('Location:administrador.php');
    die;
}// exclui curso
elseif($tipo == 'curso'){
    deleteCurso( $id );
    // Redireciona para a listagem
    header('Location:administrador.php');
    die;
}// exclui nivel
elseif($tipo == 'nivel'){
    deleteNivel( $id );
    // Redireciona para a listagem
    header('Location:administrador.php');
    die;
}// exclui admin
elseif($tipo == 'admin'){
    deleteAdmin($id);
    header('Location:administrador.php');
    die;
}
}



?>