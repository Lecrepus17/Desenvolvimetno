<?php
require('twig_carregar.php');
require('pdo.inc.php');

$nome = $_POST['nome'] ?? false;
$senha = $_POST['senha'] ?? false;

$sql = $conex->prepare('SELECT * FROM alunos WHERE nome_aluno = :nome AND senha = :senha');
$sql->bindParam(':nome', $nome);
$sql->bindParam(':senha', $senha);
$sql->execute();
$sql = $sql->fetch(PDO::FETCH_ASSOC);


 $turma = $conex->prepare('SELECT * FROM turmas  join alunos on alunos.turmas_idturmas = turmas.idturmas WHERE alunos.senha = :senha');
 $turma->bindParam(':senha', $senha);
 $turma->execute();   
 $turma = $turma->fetch(PDO::FETCH_ASSOC);



$curso = $conex->prepare('SELECT * FROM cursos JOIN turmas on cursos.idcursos = turmas.cursos_idcursos join alunos on alunos.turmas_idturmas = turmas.idturmas WHERE alunos.senha = :senha ');
$curso->bindParam(':senha', $senha);
$curso->execute();   
$curso = $curso->fetch(PDO::FETCH_ASSOC);


$nivel = $conex->prepare('SELECT * FROM nivel_ensino JOIN cursos on nivel_ensino.idNivel_ensino = cursos.nivel_ensino_idNivel_ensino JOIN turmas on cursos.idcursos = turmas.cursos_idcursos join alunos on alunos.turmas_idturmas = turmas.idturmas WHERE alunos.senha = :senha');
$nivel->bindParam(':senha', $senha);
$nivel->execute();  


$nivel = $nivel->fetch(PDO::FETCH_ASSOC);
  if(($sql) && ($turma) && ($nivel) && ($curso)){
    echo $twig->render('cartao.html', [
          'user' => $sql, 
          'turma' => $turma,
          'nivel' => $nivel,
          'curso' => $curso,
          
          ]);
        die;
}else{
  header('location:Login.php');
}
