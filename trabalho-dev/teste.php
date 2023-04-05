<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Data de nascimento</th>
            <th>Foto</th>
        </tr>
                <?php
                    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                    try {
                    $mysqli = new mysqli("localhost", "root", "", "banco");
                    $mysqli->set_charset("utf8");

                    $aluno = $mysqli->query("SELECT * FROM alunos");
                    

                    while ($resultado = $aluno->fetch_array()) {
                    
                    $nome = $resultado["nome_aluno"];
                    $data_nasc = $resultado["data_nasc"];
                    $foto = $resultado["foto"];
                    echo "<tr>
                            <td>{$nome}</td>
                            <td>{$data_nasc}</td>
                            <td>{$foto}</td>
                        </tr>";}

                    $aluno->free();
                    $mysqli->close();
                    } catch (Exception $e) {
                    exit("Erro ao conectar ao banco de dados: " . $e->getMessage());
                    }
                ?>
    </table>
</body>
</html>