<?php
    require('twig_carregar.php');
    require('pdo.inc.php');
    // Vejo se não passei índice, volta para a listagem
    if(!isset($_GET['tipo'])){
        header("Location: index.php");
    }
    
    
    //Pega o índice
    $tipo = $_POST['tipo'] ?? $_GET['tipo'] ?? false;
    
    
    
    // seleciono o altera turma
    if ($tipo == 'turma'){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        // pega resultado
        $resultado = $_POST['resultado'];
        // envia para alterar
        header("Location:altera_dados.php?tipo=turma&indice=$resultado.php");
        die;
   
    }else {
        // pega todas as turmas
        $sql = $conex->query('SELECT * FROM turmas');
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        // renderiza a tela
        echo $twig->render('administrador/crud/formulario.html', [
              'sql' => $sql,
              'titulo' => 'Alterar turma',
        ]);
        die;
        }
    }// seleciono o altera curso
    elseif($tipo == 'curso'){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        // pega resultado
        $resultado = $_POST['resultado'];
        // envia para alterar
        header("Location:altera_dados.php?tipo=curso&indice=$resultado.php");
        die;
    }else {
        // pego todos os cursos
        $sql = $conex->query('SELECT * FROM cursos');
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        // renderiza a tela
        echo $twig->render('administrador/crud/formulario.html', [
              'sql' => $sql,
              'titulo' => 'Alterar curso',
        ]);
        die;
        }
    }// seleciono o altera nivel
    elseif($tipo == 'nivel'){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        // pega resultado
        $resultado = $_POST['resultado'];
        // envia para alterar
        header("Location:altera_dados.php?tipo=nivel&indice=$resultado.php");
        die; 
    }else {
        // pego todos os niveis 
        $sql = $conex->query('SELECT * FROM nivel_ensino');
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        // renderiza a tela
        echo $twig->render('administrador/crud/formulario.html', [
                'sql' => $sql,
                'titulo' => 'Alterar nivel',
        ]);
        die;
        }
    }// seleciono 
    elseif($tipo == 'admin'){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        // pega resultado
        $resultado = $_POST['resultado'];
        // envia para alterar
        header("Location:altera_dados.php?tipo=admin&indice=$resultado.php");
        die;
    }else {
        // pego todos os adms
        $sql = $conex->query('SELECT * FROM admin');
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        // renderiza a tela
        echo $twig->render('administrador/crud/formulario.html', [
              'sql' => $sql,
              'titulo' => 'Alterar admin',
        ]);
        die;
        }
    }// seleciono o exclui turma
    elseif($tipo == 'turmaexclui'){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        // pega resultado
        $resultado = $_POST['resultado'];
        // envia para excluir
        header("Location:excluir.php?tipo=turma&indice=$resultado.php");
        die;

    }else {
        // pego todas as turmas
        $sql = $conex->query('SELECT * FROM turmas');
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        // renderiza a tela
        echo $twig->render('administrador/crud/formulario.html', [
            'sql' => $sql,
            'titulo' => 'Exclui turma',
        ]);
        die;}
    }// seleciono o exclui curso
    elseif($tipo == 'cursoexclui'){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        // pega resultado
        $resultado = $_POST['resultado'];
        // envia para excluir
        header("Location:excluir.php?tipo=curso&indice=$resultado.php");
        die;
    }else {
        // pego todos os cursos
        $sql = $conex->query('SELECT * FROM cursos');
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        // renderiza a tela
        echo $twig->render('administrador/crud/formulario.html', [
              'sql' => $sql,
              'titulo' => 'Exclui curso',
        ]);
        die;
        }
    }// seleciono o exclui nivel
    elseif($tipo == 'nivelexclui'){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        // pega resultado
        $resultado = $_POST['resultado'];
        // envia para excluir
        header("Location:excluir.php?tipo=nivel&indice=$resultado.php");
        die;
    }else {
        // pega todos os niveis  
        $sql = $conex->query('SELECT * FROM nivel_ensino');
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        // renderiza a tela
        echo $twig->render('administrador/crud/formulario.html', [
                'sql' => $sql,
                'titulo' => 'Exclui nivel',
        ]);
        die;}
    }// seleciono o exclui adm
    elseif($tipo == 'adminexclui'){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        // pega resultado
        $resultado = $_POST['resultado'];
        // envia para excluir 
        header("Location:excluir.php?tipo=admin&indice=$resultado.php");
        die;
    }else {
        // pego todos os adms     
        $sql = $conex->query('SELECT * FROM admin');
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);    
        // renderiza a tela
        echo $twig->render('administrador/crud/formulario.html', [
                'sql' => $sql,
                'titulo' => 'Exclui admin',
        ]);
        die;}}