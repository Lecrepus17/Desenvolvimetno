<?php
function deleteAluno($id)
{
    require('pdo.inc.php');
    $sql = $conex->prepare("DELETE FROM alunos WHERE idalunos = :id");

    $sql->bindParam(':id', $id);

    $sql->execute();

}
function deleteTurma($id)
{
    require('pdo.inc.php');
    $sql = $conex->prepare("DELETE * FROM turmas WHERE id = :id");

    $sql->bindParam(':id', $id);

    $sql->execute();

}
function deleteCurso($id)
{
    require('pdo.inc.php');
    $sql = $conex->prepare("DELETE * FROM cursos WHERE id = :id");

    $sql->bindParam(':id', $id);

    $sql->execute();

}
function deleteNivel($id)
{
    require('pdo.inc.php');
    $sql = $conex->prepare("DELETE * FROM nivel_ensino WHERE id = :id");

    $sql->bindParam(':id', $id);

    $sql->execute();

}



function altera_nivel($nome_nivel)
{
require('pdo.inc.php');
        $sql = $conex->prepare("UPDATE nivel_ensino SET nome_nivel = :nome  WHERE id = :id");

        $sql->bindParam(':nome', $nome_nivel);
        $sql->bindParam(':id', $id);  

        $sql->execute();



}

    //----------------------------------------------------------------------------------
//Realiza o altera DOS cursos
function altera_curso($nome_curso, $nivel_ensino)
{
require('pdo.inc.php');
        $sql = $conex->prepare("UPDATE curso SET nome_curso = :nome, nivel_ensino_idNivel_ensino = :idnivel  WHERE id = :id");

        $sql->bindParam(':nome', $nome_curso);
        $sql->bindParam(':idnivel', $nivel_ensino);
        $sql->bindParam(':id', $id);  

        $sql->execute();



}

    //----------------------------------------------------------------------------------
//Realiza o altera Das turmas
function altera_turma($nome_turma, $idcurso)
{
require('pdo.inc.php');
        $sql = $conex->prepare("UPDATE turma SET nome_turma = :nome, cursos_idcursos = :idcurso  WHERE id = :id");
        $sql->bindParam(':nome', $nome_turma);
        $sql->bindParam(':idcurso', $idcurso);
        $sql->bindParam(':id', $id);  

        $sql->execute();



}

    //----------------------------------------------------------------------------------
  
//altera aluno
function altera_aluno($nome_aluno, $data_nasc,  $foto, $idturma)
{
require('pdo.inc.php');
       

        //Realiza o altera DOS JOGADORES
        $sql = $conex->prepare("UPDATE alunos SET nome_aluno = :nome, data_nasc = :nasc, foto = :foto, turmas_idturmas = :idturma  WHERE id = :id");

        $sql->bindParam(':nome', $nome_aluno);
        $sql->bindParam(':nasc', $data_nasc);
        $sql->bindParam(':foto', $foto);
        $sql->bindParam(':idturma', $idturma);
        $sql->bindParam(':id', $id);      

        $sql->execute();

        header('location:login.php');


    

}

//Realiza o INSERT DOS niveis de ensino
function Insere_nivel($nome_nivel)
{
require('pdo.inc.php');
        $sql = $conex->prepare("INSERT INTO nivel_ensino (nome) VALUES
                (:nome)");

        $sql->bindParam(':nome', $nome_nivel);

        $sql->execute();



}

    //----------------------------------------------------------------------------------
//Realiza o INSERT DOS cursos
function Insere_curso($nome_curso, $nivel_ensino)
{
require('pdo.inc.php');
        $sql = $conex->prepare("INSERT INTO cursos (nome, nivel_ensino_idNivel_ensino) VALUES
                (:nome, :nivel)");

        $sql->bindParam(':nome', $nome_curso);
        $sql->bindParam(':nivel', $nivel_ensino);

        $sql->execute();



}

    //----------------------------------------------------------------------------------
//Realiza o INSERT Das turmas
function Insere_turma($nome_turma, $idcurso)
{
require('pdo.inc.php');
        $sql = $conex->prepare("INSERT INTO turmas (nome, cursos_idcursos) VALUES
                (:nome, :nivel)");

        $sql->bindParam(':nome', $nome_turma);
        $sql->bindParam(':nivel', $idcurso);

        $sql->execute();



}

    //----------------------------------------------------------------------------------
  
//insere aluno
function Insere_aluno($nome_aluno, $data_nasc,  $foto, $idturma)
{
require('pdo.inc.php');
       

        //Realiza o INSERT DOS JOGADORES
        $sql = $conex->prepare("INSERT INTO alunos (nome_aluno, data_nasc, foto, turmas_idturmas) VALUES
                (:nome, :nasc, :foto,  :idturma)");

        $sql->bindParam(':nome', $nome_aluno);
        $sql->bindParam(':nasc', $data_nasc);
        $sql->bindParam(':foto', $foto);
        $sql->bindParam(':idturma', $idturma);
      

        $sql->execute();

        header('location:login.php');


    

}