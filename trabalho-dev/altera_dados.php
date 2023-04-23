
<?php
require('twig_carregar.php');
require('pdo.inc.php');
require('func/sanitize_filename.php');
require('func/function.php');
require('verifica_session.php');


/*if(!isset($_GET['indice'])){
    header("Location: index.php");
}*/

if(isset($_FILES['imagem'])){
    $img = $_FILES['imagem'];
    $arquivo = sanitize_filename($_FILES['imagem']['name']);
    $diretorio = 'assets/imagem_user/';
    move_uploaded_file($img['tmp_name'], $diretorio . $arquivo);

    if($diretorio.$img['name'] != $diretorio){
        $imagem = $diretorio.$img['name'];
      }
          else{ $imagem = $_POST['imagem_t'];}
}

if(isset($_SESSION['nome'])){
    
// se tiver imagem, altero e processo




//Pega o índice e o tipo de função
$id = $_POST['indice'] ?? $_GET['indice'] ?? false;
$tipo = $_POST['tipo'] ?? $_GET['tipo'] ?? false;



// altera aluno
if ($tipo == 'aluno'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // formata data
        $data_formatada = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data_nasc'])));
        $turma = $_POST['idturmas'];
        $senha = $_POST['senha'];    
        // se não tiver alguma variavel, guarda o que tinha
        
        if (!isset($_POST['idturmas'])){
            $turma = $_POST['idturma'];
        }
        if (empty($_POST['senha'])){
            $senha = $_POST['senha_t'];
        }
        
    // altera aluno
    altera_aluno( $_POST['nome'], $data_formatada, $imagem, $turma, $id, $senha);
    // Redireciona para listagem
    header('Location: administrador.php');
    die;
}else {
    // pega todas as informações do aluno desejado
    $sql = $conex->prepare("SELECT * FROM alunos  WHERE idalunos = :id");
    $sql->bindParam(':id', $id);  
    $sql->execute();
    $sql = $sql->fetch(PDO::FETCH_ASSOC);
    
    $sql2 = $conex->query('SELECT * FROM turmas');
    $sql2 = $sql2->fetchAll(PDO::FETCH_ASSOC);

    $sql3 = $conex->prepare('SELECT nome_turma FROM turmas WHERE idturmas = :id');
    $sql3->bindParam(':id', $sql['idturma']);  
    $sql3 = $sql3->fetch(PDO::FETCH_ASSOC);
    // renderiza tela
    echo $twig->render('administrador/crud/aluno.html', [
          'aluno' => $sql,
          'turma' => $sql2,
          'nturma' => $sql3,
          'titulo' => 'Alterar',
          ]);
        die;
        }

}// altera turma
elseif($tipo == 'turma'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    // altera a turma
    altera_turma($_POST['nome_turma'], $_POST['idcurso'], $_POST['id']);
     // Redireciona para listagem
    header('Location: administrador.php');
    die;
}else {
    
    // pega todas as informações da turma desejada
    $sql = $conex->prepare("SELECT * FROM turmas  WHERE idturmas = :id");
    $sql->bindParam(':id', $id);  
    $sql->execute();
    $sql = $sql->fetch(PDO::FETCH_ASSOC);

    $sql2 = $conex->query('SELECT * FROM cursos');
    $sql2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
    // renderiza tela
    echo $twig->render('administrador/crud/turma.html', [
        'turma' => $sql,
        'curso' => $sql2,
        'titulo' => 'Alterar',
        ]);
      die;}
}// altera curso
elseif($tipo == 'curso'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    // altera curso
    altera_curso( $_POST['nome_curso'], $_POST['idnivel'], $_POST['id']);
    // Redireciona para listagem
    header('Location: administrador.php');
    die;
    
}else {
    // pega todas as informações do aluno desejado
    $sql = $conex->prepare("SELECT * FROM cursos  WHERE idcursos = :id");
    $sql->bindParam(':id', $id);  
    $sql->execute();
    $sql = $sql->fetch(PDO::FETCH_ASSOC);

    $sql2 = $conex->query('SELECT * FROM nivel_ensino');
    $sql2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
    // renderiza tela
    echo $twig->render('administrador/crud/curso.html', [
        'curso' => $sql,
        'nivel' => $sql2,
        'titulo' => 'Alterar',
        ]);
      die;}
}// altera nivel
elseif($tipo == 'nivel'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    altera_nivel( $_POST['nome_nivel'], $_POST['id']);
    // Redireciona para listagem
    header('Location: administrador.php');
    die;
}else {
    // pega todas as informações do nivel desejado    
    $sql = $conex->prepare("SELECT * FROM nivel_ensino  WHERE idnivel_ensino = :id");
    $sql->bindParam(':id', $id);  
    $sql->execute();
    $sql = $sql->fetch(PDO::FETCH_ASSOC);
    // renderiza tela
    echo $twig->render('administrador/crud/nivel_ensino.html', [
        'nivel' => $sql,
        'titulo' => 'Alterar',
        ]);
      die;}
}// altera adm
elseif($tipo == 'admin'){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    // altera adm
    altera_admin( $_POST['nome'], $_POST['senha'], $_POST['id']);
    // Redireciona para listagem
    header('Location: administrador.php');
    die;
}else {
    // pega todas as informações do adm desejado    
    $sql = $conex->prepare("SELECT * FROM admin WHERE idadmin = :id");
    $sql->bindParam(':id', $id);  
    $sql->execute();
    $sql = $sql->fetch(PDO::FETCH_ASSOC);
    // renderiza tela
    echo $twig->render('administrador/crud/adm.html', [
        'admin' => $sql,
        'titulo' => 'Alterar',
        ]);
      die;}

      die;
};
}else{
    header('location:login.php');
    die;
}
// Vejo se não passei índice, volta para a listagem


