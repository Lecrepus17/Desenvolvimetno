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
    $sql = $conex->prepare("DELETE * FROM turmas WHERE idturmas = :id");

    $sql->bindParam(':id', $id);

    $sql->execute();

}
function deleteCurso($id)
{
    require('pdo.inc.php');
    $sql = $conex->prepare("DELETE * FROM cursos WHERE idcursos = :id");

    $sql->bindParam(':id', $id);

    $sql->execute();

}
function deleteNivel($id)
{
    require('pdo.inc.php');
    $sql = $conex->prepare("DELETE * FROM nivel_ensino WHERE idnivel_ensino = :id");

    $sql->bindParam(':id', $id);

    $sql->execute();

}



function altera_nivel($nome_nivel, $id)
{
require('pdo.inc.php');
        $sql = $conex->prepare("UPDATE nivel_ensino SET nome_nivel = :nome  WHERE idnivel_ensino = :id");

        $sql->bindParam(':nome', $nome_nivel);
        $sql->bindParam(':id', $id);  

        $sql->execute();



}

    //----------------------------------------------------------------------------------
//Realiza o altera DOS cursos
function altera_curso($nome_curso, $nivel_ensino, $id)
{
require('pdo.inc.php');
        $sql = $conex->prepare("UPDATE cursos SET nome_curso = :nome, nivel_ensino_idNivel_ensino = :idnivel  WHERE idcursos = :id");

        $sql->bindParam(':nome', $nome_curso);
        $sql->bindParam(':idnivel', $nivel_ensino);
        $sql->bindParam(':id', $id);  

        $sql->execute();



}

    //----------------------------------------------------------------------------------
//Realiza o altera Das turmas
function altera_turma($nome_turma, $idcurso, $id)
{
require('pdo.inc.php');
        $sql = $conex->prepare("UPDATE turmas SET nome_turma = :nome, cursos_idcursos = :idcurso  WHERE idturmas = :id");
        $sql->bindParam(':nome', $nome_turma);
        $sql->bindParam(':idcurso', $idcurso);
        $sql->bindParam(':id', $id);  

        $sql->execute();



}

    //----------------------------------------------------------------------------------
  
//altera aluno
function altera_aluno($nome_aluno, $data_nasc,  $foto, $idturma, $id, $senha)
{
require('pdo.inc.php');
       

        //Realiza o altera DOS ALUNOS
        $sql = $conex->prepare("UPDATE alunos SET nome_aluno = :nome, data_nasc = :nasc, foto = :foto, turmas_idturmas = :idturma, senha = :senha  WHERE idalunos = :id");

        $sql->bindParam(':nome', $nome_aluno);
        $sql->bindParam(':nasc', $data_nasc);
        $sql->bindParam(':foto', $foto);
        $sql->bindParam(':idturma', $idturma);
        $sql->bindParam(':id', $id);      
        $sql->bindParam(':senha', $senha);
        $sql->execute();

        if (!$sql->execute()) {
                print_r($sql->errorInfo());
            }
            
    
}

//Realiza o INSERT DOS niveis de ensino
function Insere_nivel($nome_nivel)
{
require('pdo.inc.php');
        $sql = $conex->prepare("INSERT INTO nivel_ensino (nome_nivel) VALUES
                (:nome)");

        $sql->bindParam(':nome', $nome_nivel);

        $sql->execute();



}

    //----------------------------------------------------------------------------------
//Realiza o INSERT DOS cursos
function Insere_curso($nome_curso, $nivel_ensino)
{
require('pdo.inc.php');
        $sql = $conex->prepare("INSERT INTO cursos (nome_curso, nivel_ensino_idNivel_ensino) VALUES
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
        $sql = $conex->prepare("INSERT INTO turmas (nome_turma, cursos_idcursos) VALUES
                (:nome, :nivel)");

        $sql->bindParam(':nome', $nome_turma);
        $sql->bindParam(':nivel', $idcurso);

        $sql->execute();


            

}

    //----------------------------------------------------------------------------------
  
//insere aluno
function Insere_aluno($nome_aluno, $data_nasc,  $foto, $idturma, $senha)
{
require('pdo.inc.php');
       

        //Realiza o INSERT DOS ALUNOS
        $sql = $conex->prepare("INSERT INTO alunos (nome_aluno, data_nasc, foto, turmas_idturmas, senha) VALUES
                (:nome, :nasc, :foto,  :idturma, :senha)");

        $sql->bindParam(':nome', $nome_aluno);
        $sql->bindParam(':nasc', $data_nasc);
        $sql->bindParam(':foto', $foto);
        $sql->bindParam(':idturma', $idturma);
        $sql->bindParam(':senha', $senha);

        $sql->execute();

        
     

    

}

function Insere_admin($nome, $senha){
        require('pdo.inc.php');
        $sql = $conex->prepare("INSERT INTO admin (nome, senha) VALUES (:nome, :senha)");
        $sql->bindParam(':nome', $nome);
        $sql->bindParam(':senha', $senha);

        $sql->execute();

}

function altera_admin($nome, $senha, $id){
        require('pdo.inc.php');
        $sql = $conex->prepare("UPDATE admin SET nome = :nome, senha = :senha WHERE idadmin = :id");
        $sql->bindParam(':nome', $nome);
        $sql->bindParam(':senha', $senha);
        $sql->bindParam(':id', $id);

}

function deleteAdmin($id)
{
    require('pdo.inc.php');
    $sql = $conex->prepare("DELETE * FROM admin WHERE idadmin = :id");

    $sql->bindParam(':id', $id);

    $sql->execute();
}