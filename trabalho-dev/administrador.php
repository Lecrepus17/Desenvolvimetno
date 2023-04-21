<?php
    require('twig_carregar.php');
    require('pdo.inc.php');

 
    $sql = $conex->query('SELECT alunos.nome_aluno, alunos.data_nasc, turmas.nome_turma, alunos.foto, nivel_ensino.nome_nivel, cursos.nome_curso, alunos.idalunos FROM alunos 
        join turmas on alunos.turmas_idturmas = turmas.idturmas
       JOIN cursos ON cursos_idcursos = cursos.idcursos
       JOIN nivel_ensino ON nivel_ensino.idNivel_ensino = cursos.nivel_ensino_idNivel_ensino;');
    $sql = $sql->fetchAll(PDO::FETCH_ASSOC);


      echo $twig->render('administrador/index.html', [
          'user' => $sql,
     
        ]);
        die;