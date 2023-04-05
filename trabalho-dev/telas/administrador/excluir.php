<?php
// Vejo se não passei índice, volta para a listagem
if(!isset($_GET['indice'])){
    header("Location: index.php");
}
//Pega o índice
$id =  $_GET['indice'];

function deleteJogador($id)
{
    try {
        $mysqli = new mysqli("localhost", "id19323740_root", "89B}7MqH0K$=NVfy", "id19323740_ferias");
        $mysqli->set_charset("utf8");

        $sql = "DELETE FROM locais WHERE id = $id";

        $resultado = $mysqli->query($sql);

       
        $mysqli->close();
    } catch (Exception $e) {
        exit("Erro no banco de dados: " . $e->getMessage());
    }
}

deleteJogador($id);
header("Location: index.php");


?>