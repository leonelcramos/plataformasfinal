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

  <?php
  //ve si la session esta abierta
  if (isset($_SESSION["id"])) {
    $idusuario = $_SESSION["id"];
    $e = "SELECT id_nivel FROM usuarios WHERE id_usuario = $idusuario";
    $w = mysqli_query($conn, $e);
    $l = mysqli_fetch_assoc($w);
    $idcategoria = $l['id_nivel'];
    $_SESSION['idnivel'] = $l['id_nivel'];

    //ve si el id_nivel del usuario es igual o mayor que 2
    if ($_SESSION['idnivel'] >= 2) {
      $target_dir = "img/";
      $target_file = $target_dir . basename($_FILES["publicaciones"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


      if (isset($_POST["submit"])) {
        $descripcion = $_POST['descripcion'];
        $check = getimagesize($_FILES["publicaciones"]["tmp_name"]);
        if ($check !== false) {
          echo "El archivo es una imagen - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "<br>El archivo no es una imagen";
          $uploadOk = 0;
        }
      }


      if (file_exists($target_file)) {
        echo "El archivo ya fue subido.";
        $uploadOk = 0;
      }


      if ($_FILES["publicaciones"]["size"] > 50000000) {
        echo "<br>Es un archivo muy pesado";
        $uploadOk = 0;
      }


      if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
      ) {
        echo "<br>Solo se permiten archivos de imagen (JPG,JPEG,PNG Y GIF)";
        $uploadOk = 0;
      }


      if ($uploadOk == 0) {
        echo " y no fue subido";

      } else {
        if (move_uploaded_file($_FILES["publicaciones"]["tmp_name"], $target_file)) {
//combiá el img de acá abajo por el nombre de tu carpeta
          $i = htmlspecialchars(basename($_FILES["publicaciones"]["name"]));
          $img = "img/" . $i;
          $q = "INSERT INTO publicaciones VALUES('','$idusuario', '$idcategoria', '$img', '$descripcion', NOW());";
          mysqli_query($conn, $q);
          echo "El archivo" . htmlspecialchars(basename($_FILES["publicaciones"]["name"])) . " se ha subido con exito..";
      header('Location: index.php');
        } else {
          echo "Se produjo un error al subirse el archivo";
        }
      }
    }
 }
  ?>
  <script src="jquery-3.0.0.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>