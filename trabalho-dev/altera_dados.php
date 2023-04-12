
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
    $diretorio = 'assets/imagem_user/';

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
    altera_aluno( $_POST['nome'], $_POST['data_nasc'], $diretorio.$img['name'], $_POST['idturma']);
    // Redireciona para a página inicial
    header('Location: administrador.php');
    die;
}else {

    $sql = $conex->prepare("SELECT * FROM alunos  WHERE id = :id");
    $sql->bindParam(':id', $id);  
    $sql->execute();
    $sql = $sql->fetch(PDO::FETCH_ASSOC);


    echo $twig->render('administrador/altera_aluno.html', [
          'aluno' => $sql,
          'Altera' => 'Altera',
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
    
    
    $sql = $conex->prepare("SELECT * FROM turma  WHERE id = :id");
    $sql->bindParam(':id', $id);  
    $sql->execute();
    $sql = $sql->fetch(PDO::FETCH_ASSOC);

    echo $twig->render('administrador/altera_aluno.html', [
        'turma' => $sql,
        'Altera' => 'Altera',
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
    
    $sql = $conex->prepare("SELECT * FROM cursos  WHERE id = :id");
    $sql->bindParam(':id', $id);  
    $sql->execute();
    $sql = $sql->fetch(PDO::FETCH_ASSOC);
    
    echo $twig->render('administrador/altera_aluno.html', [
        'curso' => $sql,
        'Altera' => 'Altera',
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
    
    $sql = $conex->prepare("SELECT * FROM nivel_ensino  WHERE id = :id");
    $sql->bindParam(':id', $id);  
    $sql->execute();
    $sql = $sql->fetch(PDO::FETCH_ASSOC);
    
    echo $twig->render('administrador/altera_aluno.html', [
        'nivel' => $sql,
        'Altera' => 'Altera',
        ]);
      die;}
};

