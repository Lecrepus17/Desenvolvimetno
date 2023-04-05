
<?php


require('func/sanitize_filename.php');

// Vejo se não passei índice, volta para a listagem
if(!isset($_GET['indice'])){
    header("Location: index.php");
}

if(isset($_FILES['imagem'])){
    $img = $_FILES['imagem'];
    $diretorio = 'assets/imagem/';

    if($diretorio.$img['name'] != $diretorio){
        $imagem = $diretorio.$img['name'];
      }
          else{ $imagem = $_POST['imagem_t'];}
}


//Pega o índice
$id =  $_GET['indice'] ?? false;
$tipo = $_GET['tipo'] ?? false;


//Realiza o select DOS niveis de ensino
function select_nivel($id)
{
require('pdo.inc.php');
        $sql = $conex->prepare("WHERE id = :id");


        $sql->bindParam(':id', $id);
        $sql->execute();



}

    //----------------------------------------------------------------------------------
//Realiza o select DOS cursos
function select_curso($id)
{
require('pdo.inc.php');
        $sql = $conex->prepare("UPDATE curso SET nome_curso = :nome, nivel_ensino_idNivel_ensino = :idnivel  WHERE id = :id");

        $sql->bindParam(':nome', $nome_curso);
        $sql->bindParam(':idnivel', $nivel_ensino);

        $sql->execute();



}

    //----------------------------------------------------------------------------------
//Realiza o select Das turmas
function select_turma($nome_turma, $idcurso)
{
require('pdo.inc.php');
        $sql = $conex->prepare("UPDATE turma SET nome_turma = :nome, cursos_idcursos = :idcurso  WHERE id = :id");
        $sql->bindParam(':nome', $nome_turma);
        $sql->bindParam(':idcurso', $idcurso);

        $sql->execute();



}

    //----------------------------------------------------------------------------------
  
//select aluno
function select_aluno($nome_aluno, $data_nasc,  $foto, $idturma)
{
require('pdo.inc.php');
       

        //Realiza o select DOS JOGADORES
        $sql = $PDO->prepare("UPDATE alunos SET nome_aluno = :nome, data_nasc = :nasc, foto = :foto, turmas_idturmas = :idturma  WHERE id = :id");

        $sql->bindParam(':nome', $nome_aluno);
        $sql->bindParam(':nasc', $data_nasc);
        $sql->bindParam(':foto', $foto);
        $sql->bindParam(':idturma', $idturma);
      

        $sql->execute();

        header('location:login.php');


    

}


$tipo = $_POST['tipo'] ?? false;


