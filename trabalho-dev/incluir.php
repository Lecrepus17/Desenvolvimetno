<?php
require('twig_carregar.php');
require('pdo.inc.php');
require('func/sanitize_filename.php');
require('func/function.php');

$tipo = $_POST['tipo'] ?? $_GET['tipo'] ?? false;

if(isset($_FILES['imagem'])){
    $arquivo = sanitize_filename($_FILES['imagem']['name']);
    $img = $_FILES['imagem'];
    $diretorio = 'assets/imagem/';
    move_uploaded_file($img['tmp_name'], $diretorio . $arquivo);
}











if ($tipo == 'aluno'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $data = $_POST['data_nasc'];
        $data_obj = new DateTime($data);
        $data_formatada = $data_obj->format('Y-m-d'); // formato dd/mm/aaaa

       
    Insere_aluno( $_POST['nome'], $data_formatada, $diretorio.$img['name'], $_POST['idturma']);
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
    
    
    $sql = $conex->query('SELECT * FROM cursos');
    $sql = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo $twig->render('administrador/crud/turma.html', [
        'Titulo' => 'Incluir',
        'curso' => $sql,
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
    
    $sql = $conex->query('SELECT * FROM nivel_ensino');
    $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    echo $twig->render('administrador/crud/curso.html.html', [
        'Titulo' => 'Incluir',
        'nivel' => $sql,
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
        'titulo' => 'Incluir',
        ]);
      die;}
};

