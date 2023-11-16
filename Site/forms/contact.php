<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $p1 = $_POST['p1'];
  $p2 = $_POST['p2'];
  $p3 = $_POST['p3'];
  $p4 = $_POST['p4'];
  $p5 = $_POST['p5'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];


  try{
    $db = new PDO("sqlite:../../database.sqlite");
    
    
    $stmt = $db->prepare("INSERT INTO questionario (nome, email, p1, p2, p3, p4, p5) VALUES (:n, :e, :p1, :p2, :p3, :p4, :p5)");

    // Atribui os valores aos parâmetros da consulta
    $stmt->bindParam(':n', $nome);
    $stmt->bindParam(':e', $email);
    $stmt->bindParam(':p1', $p1);
    $stmt->bindParam(':p2', $p2);
    $stmt->bindParam(':p3', $p3);
    $stmt->bindParam(':p4', $p4);
    $stmt->bindParam(':p5', $p5);

    $stmt->execute();
  }catch(PDOException $e){
    echo $e->getMessage();
  }
  //http://10.144.9.205:8888/avaliacao
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Avaliação</title>
  
  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <a href="../index.html"><img id = "img-header" src="../assets/img/gf-logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <!-- <li><a class="nav-link scrollto active" href="../home">Formulário</a></li>
          <li><a class="nav-link scrollto" href="#about">Introdução</a></li>
          <li><a class="nav-link scrollto" href="#livros">Livros</a></li>
          <li><a href="#historia" class="nav-link scrollto">História de Weteros</a></li>
          <li><a class="nav-link scrollto" href="#casas">Casas e Personagens</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Compras</a></li> -->
          <!--<li><a class="nav-link scrollto" href="#pricing">Preço</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contato</a></li>-->
        </ul>
        <i class="bi bi-list mobile-nav-toggle" style="color: white;"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <br>
  <br>
  <br>
  <br>






  <div class="container">
    <div class="row">
    <form action="" method="post">
      <div class="form-group shadow p-3 mb-5 bg-white rounded">
        <label for="email">Nome:</label>
        <input type="text" class="form-control" name="nome" id="name">
      </div>
      <div class="form-group shadow p-3 mb-5 bg-white rounded">
        <label for="email">Email</label>
         <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
      </div>
      <div class="form-group shadow p-3 mb-5 bg-white rounded">
        <h5>Você já conhecia os livros "As crônicas de gelo e fogo"?</h4>
          <input type="radio" id="html" name="p1" value="SIM">
        <label for="sim">Sim</label><br>
          <input type="radio" id="css" name="p1" value="NAO">
        <label for="nao">Não</label><br>
      </div>
      <div class="form-group shadow p-3 mb-5 bg-white rounded">
        <h5>pelas informações oferecidas, o que você entendeu das histórias  ?</h4>
        <textarea class="form-control"  name="p2" id="textarea1" cols="30" rows="3"></textarea>
      </div>
      <div class="form-group shadow p-3 mb-5 bg-white rounded">
        <h5>como foi a sua experiencia utilizando o site ?</h4>
        <textarea class="form-control"  name="p3" id="textarea1" cols="30" rows="3"></textarea>
      </div>
      <div class="form-group align-center shadow p-3 mb-5 bg-white rounded">
        <h5>com base no site você se interessa em comprar os livros/série(HBO) ?</h4>
          <input type="radio" id="html" name="p4" value="SIM">
        <label for="sim">Sim</label><br>
          <input type="radio" id="css" name="p4" value="NAO">
        <label for="nao">Não</label><br>
      </div>
      <div class="form-group shadow p-3 mb-5 bg-white rounded">
        <h5>na sua opinião, o que você melhoraria no projeto ?</h4>
        <textarea class="form-control"  name="p5" id="textarea1" cols="30" rows="3"></textarea>
      </div>
      <button type="submit" class="btn-enviar">Enviar</button>
      
</form>
    </div>
  </div>




<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>