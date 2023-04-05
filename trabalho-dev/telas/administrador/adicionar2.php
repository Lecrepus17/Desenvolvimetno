<?php

$img = $_FILES['imagem'];
    $extensao = strtolower(substr($img['name'], -4));
    $diretorio = 'assets/imagem/';
    
    move_uploaded_file($img['tmp_name'], $diretorio . $img['name']);



function InsereJogador($nome, $ano_inicio,  $ano_fim, $preco, $descricao, $imagem)
{
    try {
        $mysqli = new mysqli("localhost", "id19323740_root", "89B}7MqH0K$=NVfy", "id19323740_ferias");
        $mysqli->set_charset("utf8");
        //Realiza o INSERT DOS JOGADORES
                $sql = "INSERT INTO `locais` (`nome`, `imagem`, `data_inicio`, `data_fim`, `descricao`, `preco`) VALUES
                ('$nome', '$imagem', '$ano_inicio',  '$ano_fim', '$descricao', $preco)";

$resultado = $mysqli->query($sql);
if ($resultado === true) {
}

        $mysqli->close();
    } catch (Exception $e) {
        exit("Erro no banco de dados: " . $e->getMessage());
    }
}

InsereJogador( $_POST['nome'], $_POST['data_inicio'], $_POST['data_fim'], $_POST['preco'], $_POST['descricao'], $diretorio.$img['name']);
    // Redireciona para a página inicial
    header('Location: index.php');


    ?>

