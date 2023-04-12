<?php
require('twig_carregar.php');
require('pdo.inc.php');
require('func/sanitize_filename.php');
require('func/function.php');

$tipo = $_POST['tipo'] ?? $_GET['tipo'] ?? false;

if(isset($_FILES['imagem'])){

    $arquivo = sanitize_filename($_FILES['arquivo']['name']);
    $img = $_FILES['imagem'];
    $diretorio = 'assets/imagem_user/';
    move_uploaded_file($img['tmp_name'], $diretorio . $arquivo);
}











if ($tipo == 'aluno'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $data = $_POST['data_nasc'];

        var_dump($_POST['data_nasc']);
    Insere_aluno( $_POST['nome'], $_POST['data_nasc'], $diretorio.$img['name'], $_POST['idturma']);
    // Redireciona para a página inicial
    //header('Location: administrador.php');
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

}elseif($tipo == 'turma'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    Insere_turma($_POST['nome_turma'], $_POST['idcurso']);
     // Redireciona para a página inicial
    header('Location: administrador.php');
    die;
}else {
    
    


    echo $twig->render('administrador/crud/turma.html', [
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
    

    
    echo $twig->render('administrador/crud/curso.html.html', [
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
    

    
    echo $twig->render('administrador/crud/nivel_ensino.html', [
        'Incluir' => 'Incluir',
        ]);
      die;}
};

