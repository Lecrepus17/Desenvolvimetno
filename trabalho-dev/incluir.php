<?php
require('twig_carregar.php');
require('pdo.inc.php');
require('func/sanitize_filename.php');
require('func/function.php');
require('verifica_session.php');



if(isset($_SESSION['nome'])){
    
// seta o tipo de função
$tipo = $_POST['tipo'] ?? $_GET['tipo'] ?? false;


// se tiver imagem, processa ela
if(isset($_FILES['imagem'])){
    $arquivo = sanitize_filename($_FILES['imagem']['name']);
    $img = $_FILES['imagem'];
    $diretorio = 'assets/imagem_user/';
    move_uploaded_file($img['tmp_name'], $diretorio . $arquivo);
}





// inclui aluno
if ($tipo == 'aluno'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // formata a data
        $date = DateTime::createFromFormat('d/m/Y', $_POST['data_nasc']);
        $data = date('Y-m-d', $date->getTimestamp());
        if (isset($_POST['idturmas'])) {
            $idturmas = $_POST['idturmas'];
        } else {
            header('location: incluir.php?tipo=aluno');
        }

        // insere o aluno
       Insere_aluno( $_POST['nome'], $data, $diretorio.sanitize_filename($img['name']), $_POST['idturmas'], $_POST['senha']);
    
    // volta para a listagem
    header('Location: administrador.php');
    die;
}else {
    // pega todas as turmas
    $sql = $conex->query('SELECT * FROM turmas');
    $sql = $sql->fetchAll(PDO::FETCH_ASSOC);

    // renderiza a tela
    echo $twig->render('administrador/crud/aluno.html', [
          'titulo' => 'Incluir',
          'turma' => $sql,
          ]);
        die;
        }

}
// inclui turma
if($tipo == 'turma'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
   // insete turma
    Insere_turma($_POST['nome_turma'], $_POST['idcursos']);
     // volta para a listagem
    header('Location: administrador.php');
    die;
}else {
    
    // pega todos os cursos
    $sql = $conex->query('SELECT * FROM cursos');
    $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
    // renderiza a tela
    echo $twig->render('administrador/crud/turma.html', [
        'titulo' => 'Incluir',
        'curso' => $sql,
        ]);
      die;}
}
// inclui curso
if($tipo == 'curso'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    // insere curso
    Insere_curso( $_POST['nome_curso'], $_POST['idnivels']);
    // volta para a listagem
    header('Location: administrador.php');
    die;
    
}else {
    // pega totos os niveis de ensino
    $sql = $conex->query('SELECT * FROM nivel_ensino');
    $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
    // renderiza a tela
    echo $twig->render('administrador/crud/curso.html', [
        'titulo' => 'Incluir',
        'nivel' => $sql,
        ]);
      die;}
}
// inclui nivel
if($tipo == 'nivel'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
     // insere nivel
    Insere_nivel( $_POST['nome_nivel']);
    // volta para a listagem
    header('Location: administrador.php');
    die;
}else {
    
    // renderiza a tela
    echo $twig->render('administrador/crud/nivel_ensino.html', [
        'titulo' => 'Incluir',
        ]);
      die;}
};
// inclui admin
if($tipo == 'admin'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
     // insere admin
    Insere_admin( $_POST['nome'], $_POST['senha']);
    // volta para a listagem
    header('Location: administrador.php');
    die;
}else {
    
    // renderiza a tela
    echo $twig->render('administrador/crud/adm.html', [
        'titulo' => 'Incluir',
        ]);
      die;}

      
};
die;
}