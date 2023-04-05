<?php
// Vejo se não passei índice, volta para a listagem
if(!isset($_GET['indice'])){
    header("Location: index.php");
}
//Pega o índice
$id =  $_GET['indice'];
$tipo = $_GET['tipo'] ?? false;

function deleteAluno($id)
{
    require('pdo.inc.php');
    $sql = $conex->prepare("DELETE * FROM alunos WHERE id = (:id)");

    $sql->bindParam(':id', $id);

    $sql->execute();

}
function deleteTurma($id)
{
    require('pdo.inc.php');
    $sql = $conex->prepare("DELETE * FROM turmas WHERE id = (:id)");

    $sql->bindParam(':id', $id);

    $sql->execute();

}
function deleteCurso($id)
{
    require('pdo.inc.php');
    $sql = $conex->prepare("DELETE * FROM cursos WHERE id = (:id)");

    $sql->bindParam(':id', $id);

    $sql->execute();

}
function deleteNivel($id)
{
    require('pdo.inc.php');
    $sql = $conex->prepare("DELETE * FROM nivel_ensino WHERE id = (:id)");

    $sql->bindParam(':id', $id);

    $sql->execute();

}

if(!isset($tipo)){
    header("Location: index.php");
}
    





if ($tipo == 'aluno'){
    deleteAluno( $id );
    // Redireciona para a página inicial
    header('Location: index.php');
    die;
}elseif($tipo == 'turma'){
    deleteTurma( $id );
     // Redireciona para a página inicial
    header('Location: index.php');
    die;
}
elseif($tipo == 'curso'){
    deleteCurso( $id );
    // Redireciona para a página inicial
    header('Location: index.php');
    die;
}
elseif($tipo == 'nivel'){
    deleteNivel( $id );
    // Redireciona para a página inicial
    header('Location: index.php');
    die;
};


?>