<?php
require('twig_carregar.php');
require('pdo.inc.php');
require('func/sanitize_filename.php');
require('func/altera_inclui.php');

$tipo = $_POST['tipo'] ?? $_GET['tipo'] ?? false;

if(isset($_FILES['imagem'])){

    $arquivo = sanitize_filename($_FILES['arquivo']['name']);
    $img = $_FILES['imagem'];
    $diretorio = 'assets/imagem/';
    move_uploaded_file($img['tmp_name'], $diretorio . $arquivo);
}











if ($tipo == 'aluno'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    Insere_aluno( $_POST['nome'], $_POST['data_nasc'], $diretorio.$img['name'], $_POST['idturma']);
    // Redireciona para a página inicial
    header('Location: administrador.php');
    die;
}else {




    echo $twig->render('administrador/altera_aluno.html', [
          'Incluir' => 'Incluir',
          ]);
        die;
        }

}elseif($tipo == 'turma'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    Insere_turma($_POST['nome_turma'], $_POST['idcurso']);
     // Redireciona para a página inicial
    header('Location: administrador.php');
    die;
}else {
    
    


    echo $twig->render('administrador/altera_aluno.html', [
        'Incluir' => 'Incluir',
        ]);
      die;}
}
elseif($tipo == 'curso'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    Insere_curso( $_POST['nome_curso'], $_POST['nivel_ensino']);
    // Redireciona para a página inicial
    header('Location: administrador.php');
    die;
    
}else {
    

    
    echo $twig->render('administrador/altera_aluno.html', [
        'Incluir' => 'Incluir',
        ]);
      die;}
}
elseif($tipo == 'nivel'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    Insere_nivel( $_POST['nome_nivel']);
    // Redireciona para a página inicial
    header('Location: administrador.php');
    die;
}else {
    

    
    echo $twig->render('administrador/altera_aluno.html', [
        'Incluir' => 'Incluir',
        ]);
      die;}
};

