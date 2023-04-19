
<?php
require('twig_carregar.php');
require('pdo.inc.php');
require('func/sanitize_filename.php');
require('func/function.php');
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
$id = $_POST['indice'] ?? $_GET['indice'] ?? false;
$tipo = $_POST['tipo'] ?? $_GET['tipo'] ?? false;




if ($tipo == 'aluno'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        

print_r($_POST);

        $data_formatada = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data_nasc'])));
        $turma = $_POST['idturmas'];
        $senha = $_POST['senha'];
        if (!isset($_POST['idturmas'])){
            $turma = $_POST['idturma'];
        }
        if (!isset($_FILES['imagem'])){
            $imagem = $_POST['imagem_t'];
        }
        if (!isset($_POST['senha'])){
            $senha = $_POST['senha_t'];
        }
    altera_aluno( $_POST['nome'], $data_formatada, $imagem, $turma, $id, $senha);
    // Redireciona para a página inicial
    header('Location: administrador.php');
    die;
}else {

    $sql = $conex->prepare("SELECT * FROM alunos  WHERE idalunos = :id");
    $sql->bindParam(':id', $id);  
    $sql->execute();
    $sql = $sql->fetch(PDO::FETCH_ASSOC);


    $sql2 = $conex->query('SELECT * FROM turmas');
    $sql2 = $sql2->fetchAll(PDO::FETCH_ASSOC);


    echo $twig->render('administrador/crud/aluno.html', [
          'aluno' => $sql,
          'turma' => $sql2,
          'titulo' => 'Alterar',
          ]);
        die;
        }

}elseif($tipo == 'turma'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    altera_turma($_POST['nome_turma'], $_POST['idcurso']);
     // Redireciona para a página inicial
    header('Location: administrador.php');
    die;
}else {
    
    
    $sql = $conex->prepare("SELECT * FROM turmas  WHERE idturmas = :id");
    $sql->bindParam(':id', $id);  
    $sql->execute();
    $sql = $sql->fetch(PDO::FETCH_ASSOC);

    $sql2 = $conex->query('SELECT * FROM cursos');
    $sql2 = $sql2->fetchAll(PDO::FETCH_ASSOC);



    echo $twig->render('administrador/crud/turma.html', [
        'turma' => $sql,
        'curso' => $sql2,
        'titulo' => 'Alterar',
        ]);
      die;}
}
elseif($tipo == 'curso'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    altera_curso( $_POST['nome_curso'], $_POST['nivel_ensino']);
    // Redireciona para a página inicial
    header('Location: administrador.php');
    die;
    
}else {
    
    $sql = $conex->prepare("SELECT * FROM cursos  WHERE idcursos = :id");
    $sql->bindParam(':id', $id);  
    $sql->execute();
    $sql = $sql->fetch(PDO::FETCH_ASSOC);

    $sql2 = $conex->query('SELECT * FROM nivel_ensino');
    $sql2 = $sql2->fetchAll(PDO::FETCH_ASSOC);

    echo $twig->render('administrador/crud/curso.html', [
        'curso' => $sql,
        'nivel' => $sql2,
        'titulo' => 'Alterar',
        ]);
      die;}
}
elseif($tipo == 'nivel'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    altera_nivel( $_POST['nome_nivel']);
    // Redireciona para a página inicial
    header('Location: administrador.php');
    die;
}else {
    
    $sql = $conex->prepare("SELECT * FROM nivel_ensino  WHERE idnivel_ensino = :id");
    $sql->bindParam(':id', $id);  
    $sql->execute();
    $sql = $sql->fetch(PDO::FETCH_ASSOC);
    
    echo $twig->render('administrador/crud/nivel_ensino.html', [
        'nivel' => $sql,
        'titulo' => 'Alterar',
        ]);
      die;}
};

