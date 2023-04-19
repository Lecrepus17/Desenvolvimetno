<?php
require('twig_carregar.php');
require('pdo.inc.php');
require('func/sanitize_filename.php');
require('func/function.php');

$tipo = $_POST['tipo'] ?? $_GET['tipo'] ?? false;

if(isset($_FILES['imagem'])){
    $arquivo = sanitize_filename($_FILES['imagem']['name']);
    $img = $_FILES['imagem'];
    $diretorio = 'assets/imagem_user/';
    move_uploaded_file($img['tmp_name'], $diretorio . $arquivo);
}











if ($tipo == 'aluno'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $date = DateTime::createFromFormat('d/m/Y', $_POST['data_nasc']);
        $data = date('Y-m-d', $date->getTimestamp());
        if (isset($_POST['idturmas'])) {
            $idturmas = $_POST['idturmas'];
        } else {
            header('location: incluir.php?tipo=aluno');
        }


       Insere_aluno( $_POST['nome'], $data, $diretorio.$img['name'], $_POST['idturmas'], $_POST['senha']);
    // Redireciona para a página inicial
    
    header('Location: administrador.php');
    die;
}else {

    $sql = $conex->query('SELECT * FROM turmas');
    $sql = $sql->fetchAll(PDO::FETCH_ASSOC);


    echo $twig->render('administrador/crud/aluno.html', [
          'titulo' => 'Incluir',
          'turma' => $sql,
          ]);
        die;
        }

}
if($tipo == 'turma'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    Insere_turma($_POST['nome_turma'], $_POST['idcursos']);
     // Redireciona para a página inicial
    header('Location: administrador.php');
    die;
}else {
    
    
    $sql = $conex->query('SELECT * FROM cursos');
    $sql = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo $twig->render('administrador/crud/turma.html', [
        'titulo' => 'Incluir',
        'curso' => $sql,
        ]);
      die;}
}
if($tipo == 'curso'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
    Insere_curso( $_POST['nome_curso'], $_POST['idnivels']);
    // Redireciona para a página inicial
    header('Location: administrador.php');
    die;
    
}else {
    
    $sql = $conex->query('SELECT * FROM nivel_ensino');
    $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    echo $twig->render('administrador/crud/curso.html', [
        'titulo' => 'Incluir',
        'nivel' => $sql,
        ]);
      die;}
}
if($tipo == 'nivel'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
     
    Insere_nivel( $_POST['nome_nivel']);
    // Redireciona para a página inicial
    header('Location: administrador.php');
    die;
}else {
    

    echo $twig->render('administrador/crud/nivel_ensino.html', [
        'titulo' => 'Incluir',
        ]);
      die;}
};

if($tipo == 'admin'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
     
    Insere_admin( $_POST['nome'], $_POST['senha']);
    // Redireciona para a página inicial
    header('Location: administrador.php');
    die;
}else {
    

    echo $twig->render('administrador/crud/adm.html', [
        'titulo' => 'Incluir',
        ]);
      die;}
};

