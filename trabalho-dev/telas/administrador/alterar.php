<?php
// Vejo se não passei índice, volta para a listagem
    if(!isset($_GET['indice'])){
        header("Location: index.php");
    }
//Pega o índice
    $id =  $_GET['indice'];        


    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try {
        $mysqli = new mysqli("localhost", "id19323740_root", "89B}7MqH0K$=NVfy", "id19323740_ferias");
        $mysqli->set_charset("utf8");
//------------------------------------------------------------------------------

        //Faz a consulta SQL
        $time = $mysqli->query("SELECT * FROM locais WHERE id = $id");
        //Percorre os times
           while ($resultado = $time->fetch_array()) {
               //Busca os valores de cada registro
               $id = $resultado["id"];
               $descricao = $resultado["descricao"];
               $nome = $resultado["nome"];
               $preco = $resultado["preco"];
               $imagem = $resultado["imagem"];
               $data_inicio = $resultado["data_inicio"];
               $data_fim = $resultado["data_fim"];
           


                          }
    
                       $time->free();
                               $mysqli->close();
                           } catch (Exception $e) {
                               exit("Erro ao conectar ao banco de dados: " . $e->getMessage());
                           }
                       ?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>E_Ferias</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!--p>Preçomized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="#!">E_Férias</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>

                    </ul>
                </div>
            </div>
        </nav>
      
     


    <!-- Contact Start -->
    <div class="container-fluid bg-light overflow-hidden px-lg-0" style="margin: 6rem 0;">
        <div class="container contact px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 contact-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 ps-lg-0">
                        <h1 class="mb-4">Altere o lugar</h1>
 
                        <form action="alterar2.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control"name='nome' id="nome" value="<?=$nome?>" require >
                                        <label for="nome">Nome do lugar</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number"  class="form-control" name='preco' value="<?=$preco?>" id="preco" require >
                                        <label for="preco">Peço</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="date"  class="form-control" id="data_inicio" name='data_inicio' value="<?=$data_inicio?>" require>
                                        <label for="data_inicio">Data início</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="date"  class="form-control" id="data_fim" name='data_fim' value="<?=$data_fim?>" require>
                                        <label for="data_fim">Data fim</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control"   name='descricao'  id="Descricao" style="height: 100px" require><?=$descricao?></textarea>
                                        <label for="Descricao">Descrição</label>
                                    </div>
                                </div>
                              
                                <div class="form-group">
                                        <label for="exampleFormControlFile1">Adicione a imagem</label>
                                        <input type="file" accept="image/*" name='imagem'  class="form-control-file" require id="exampleFormControlFile1"><?=$imagem?></input>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Alterar</button>
                                </div>
                                <div>
                                    <input type="hidden" name="id"  value="<?=$id?>" require>
                                </div>
                                <div>
                                    <input type="hidden" name="imagem_t"  value="<?=$imagem?>" require>
                                </div>
                               
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                    <img class='img-fluid' src='<?=$imagem?>' alt=''>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    
        <!-- Footer-->
        <footer class="py-5 bg-dark">
          <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; E_Férias 2022</p></div>
      </footer>
  <!-- Footer End -->


  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
</body>

</html>
