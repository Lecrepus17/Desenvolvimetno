<?php

$img = $_FILES['imagem'];
    $extensao = strtolower(substr($img['name'], -4));
    $diretorio = 'assets/imagem/';
    
    move_uploaded_file($img['tmp_name'], $diretorio . $img['name']);




    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    function alteraano_inicio($nome, $ano_inicio,  $ano_fim, $preco, $descricao, $imagem, $id){
        try {
            $mysqli = new mysqli("localhost", "id19323740_root", "89B}7MqH0K$=NVfy", "id19323740_ferias");
            $mysqli->set_charset("utf8");

                $sql = "UPDATE locais SET 
                nome = '$nome', 
                data_inicio = '$ano_inicio', 
                data_fim = '$ano_fim', 
                preco = $preco, 
                descricao = '$descricao', 
                imagem = '$imagem' 
                WHERE id = $id";



                    $resultado = $mysqli->query($sql);
                    if ($resultado === true) {
                      
                    }
                    $mysqli->close();
                } catch (Exception $e) {
                    exit("Erro no banco de dados: " . $e->getMessage());
                }
            }
 
            if($diretorio.$img['name'] != $diretorio){
              $imagem = $diretorio.$img['name'];
            }
                else{ $imagem = $_POST['imagem_t'];}
                
        alteraano_inicio( $_POST['nome'], $_POST['data_inicio'], $_POST['data_fim'], $_POST['preco'], $_POST['descricao'], $imagem, $_POST['id']);
            // Redireciona para a página inicial
            header('Location: index.php');
?>


