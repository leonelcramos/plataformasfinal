<?php
require 'config.php';
?>

<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>ESTUDIO MULTIMEDIAL</title>
  <script src="https://kit.fontawesome.com/ea292e31ec.js" crossorigin="anonymous"></script>
</head>

<body>

  <?php require 'header.php'; ?>



  <!--<div class="modal fade" id="ventana" tabindex="-1" role="dialog" aria-labelledby="nuevapubli" aria-hidden="true">-->
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content formulario">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-light" id="nuevapubli">Nueva publicación</h5>
       
          
        </button>
      </div>
      <div class="modal-body">
         <!-- <form>
          <div class="form-group">
            <label for="exampleFormControlFile1">Seleccionar imagen a subir:</label>
            <input type="file" class="form-control-file " id="exampleFormControlFile1">
          </div>
        </form>-->
        <form action="subir.php" method="post" enctype="multipart/form-data">

          <p class="p-2">Seleccionar imagen a subir:</p>
          <input type="file" name="publicaciones" id="publicaciones"> 
          <textarea class="form-control" id="descripcion" name="descripcion" rows="3" cols="30"></textarea>
          <div lass="d-flex justify-content-end ">
            <input class="btn btn-primary mt-3 mb-3 " type="submit" value="subir" name="submit">
          </div>
          
        </form>
      </div>
     
    </div>
  </div>
  </div>





  <script src="js/jquery-3.0.0.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>