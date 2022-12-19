<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>ESTUDIO MULTIMEDIAL</title>
</head>

<body>

  <?php
  require 'header.php';
  ?>

  <section class="container">
    <div class="row justify-content-evenly m-2 mb-5">
      


        <?php
      require 'login.php';
      require 'registro.php';

      ?>
      
    </div>


  </section>
  <?php

  require 'footer.php';
  ?>





  <script src="js/jquery-3.0.0.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</body>

</html>