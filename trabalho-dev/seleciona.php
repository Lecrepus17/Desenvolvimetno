<?php
    require('twig_carregar.php');
    require('pdo.inc.php');
    // Vejo se não passei índice, volta para a listagem
    if(!isset($_GET['tipo'])){
        header("Location: index.php");
    }
    
    
    //Pega o índice
    $tipo = $_POST['tipo'] ?? $_GET['tipo'] ?? false;
    
    
    
    
    if ($tipo == 'turma'){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
         $resultado = $_POST['resultado'];

        header("Location:altera_dados.php?tipo=turma&indice=$resultado.php");
        die;
   
    }else {
    

        $sql = $conex->query('SELECT * FROM turmas');
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    
        echo $twig->render('administrador/crud/formulario.html', [
              'sql' => $sql,
              'titulo' => 'Alterar turma',
              ]);
            die;
            }
    
    }elseif($tipo == 'curso'){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $resultado = $_POST['resultado'];
     
            header("Location:altera_dados.php?tipo=curso&indice=$resultado.php");
            die;
       
    }else {
        
        $sql = $conex->query('SELECT * FROM cursos');
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    
        echo $twig->render('administrador/crud/formulario.html', [
              'sql' => $sql,
              'titulo' => 'Alterar curso',
              ]);
            die;
           
            }
        }elseif($tipo == 'nivel'){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
            $resultado = $_POST['resultado'];
           
                header("Location:altera_dados.php?tipo=nivel&indice=$resultado.php");
                die;
           
        }else {
            
            $sql = $conex->query('SELECT * FROM nivel_ensino');
            $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        
            echo $twig->render('administrador/crud/formulario.html', [
                  'sql' => $sql,
                  'titulo' => 'Alterar nivel',
                  ]);
                die;
                }
    }elseif($tipo == 'admin'){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $resultado = $_POST['resultado'];
      
            header("Location:altera_dados.php?tipo=admin&indice=$resultado.php");
            die;
        
    }else {
        
        $sql = $conex->query('SELECT * FROM admin');
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    
        echo $twig->render('administrador/crud/formulario.html', [
              'sql' => $sql,
              'titulo' => 'Alterar admin',
              ]);
            die;
      
    }
    
}elseif($tipo == 'turmaexclui'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $resultado = $_POST['resultado'];
   
        header("Location:excluir.php?tipo=turma&indice=$resultado.php");
        die;

}else {
    
    $sql = $conex->query('SELECT * FROM turmas');
    $sql = $sql->fetchAll(PDO::FETCH_ASSOC);


    echo $twig->render('administrador/crud/formulario.html', [
          'sql' => $sql,
          'titulo' => 'Exclui turma',
          ]);
        die;
       
        }
    }elseif($tipo == 'cursoexclui'){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $resultado = $_POST['resultado'];
       
            header("Location:excluir.php?tipo=curso&indice=$resultado.php");
            die;
    
    }else {
        
        $sql = $conex->query('SELECT * FROM cursos');
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    
        echo $twig->render('administrador/crud/formulario.html', [
              'sql' => $sql,
              'titulo' => 'Exclui curso',
              ]);
            die;
           
            }
        }elseif($tipo == 'nivelexclui'){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
            $resultado = $_POST['resultado'];
           
                header("Location:excluir.php?tipo=nivel&indice=$resultado.php");
                die;
        
        }else {
            
            $sql = $conex->query('SELECT * FROM nivel_ensino');
            $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        
            echo $twig->render('administrador/crud/formulario.html', [
                  'sql' => $sql,
                  'titulo' => 'Exclui nivel',
                  ]);
                die;
               
                }
            }elseif($tipo == 'adminexclui'){
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                $resultado = $_POST['resultado'];
               
                    header("Location:excluir.php?tipo=admin&indice=$resultado.php");
                    die;
            
            }else {
                
                $sql = $conex->query('SELECT * FROM admin');
                $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
            
            
                echo $twig->render('administrador/crud/formulario.html', [
                      'sql' => $sql,
                      'titulo' => 'Exclui admin',
                      ]);
                    die;
                   
                    }
                }