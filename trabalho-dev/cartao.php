<?php
require('twig_carregar.php');
require('pdo.inc.php');
require ('func/qrcode.php');


$nome = $_POST['nome'] ?? false;
$senha = $_POST['senha'] ?? false;

$sql = $conex->prepare('SELECT idalunos FROM alunos WHERE nome_aluno = :nome AND senha = :senha');
$sql->bindParam(':nome', $nome);
$sql->bindParam(':senha', $senha);
$sql->execute();
$sql = $sql->fetch(PDO::FETCH_ASSOC);

$id = $_GET['indice'] ?? $sql['idalunos'] ?? false;


$nivel = $conex->prepare('SELECT * FROM nivel_ensino JOIN cursos on nivel_ensino.idNivel_ensino = cursos.nivel_ensino_idNivel_ensino JOIN turmas on cursos.idcursos = turmas.cursos_idcursos join alunos on alunos.turmas_idturmas = turmas.idturmas WHERE alunos.idalunos = :id');
$nivel->bindParam(':id', $id);

$nivel->execute();  
$nivel = $nivel->fetch(PDO::FETCH_ASSOC);



$id = $sql['idalunos'];
// Informação a ser codificada no QR Code
$qr = qrcode($id);


  if(($nivel)){

    echo $twig->render('cartao.html', [
          'user' => $nivel,
          ]);
        die;
}else{
  header('location:Login.php');
}
