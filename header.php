<header class="sticky-top ">


<nav class="navbar navbar-expand-md navbar-dark  bg-dark ">
    <div class="container-fluid  ">
        <a class="navbar-brand" href="#">ESTUDIO MULTIMEDIAL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">


          <?php
        $inicio = '<li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>';
        $administrar = '<li class="nav-item"><a class="nav-link" href="administrar.php">Administrar</a></li>';
        $cerrarS = '<li class="nav-item"> <a class="nav-link" href="logout.php">Cerrar sesion</a></li>';
        $publicar = '<li class="nav-item"> <a class="nav-link" href="subir2.php">Publicar</a></li>';

        if (isset($_SESSION["id"])) {
          $id = $_SESSION["id"];
          $r = "SELECT primer_nombre, primer_apellido, id_nivel FROM usuarios WHERE usuarios.id_usuario = '$id'";
          $s = mysqli_query($conn, $r);
          $arra = mysqli_fetch_assoc($s);
          if ($arra['id_nivel'] >= 2) {
            if ($arra['id_nivel'] == 2) {
              echo $inicio, $publicar, $administrar;

        ?>

          <li class="nav-item">
            <a href="miperfil.php" class="nav-link text-light">
              <?php echo $arra["primer_nombre"] . " " . $arra["primer_apellido"] ?>
            </a>
          </li>

          <?php
              echo $cerrarS;
            } else {
              echo $inicio, $publicar;

        ?>

          <li class="nav-item">
            <a href="miperfil.php" class="nav-link text-light">
              <?php echo $arra["primer_nombre"] . " " . $arra["primer_apellido"] ?>
            </a>
          </li>

          <?php
              echo $cerrarS;
            }

          } else {
            echo $inicio;
        ?>

          <li class="nav-item">
            <a href="miperfil.php" class="nav-link text-light" href="#">
              <?php echo $arra["primer_nombre"] . " " . $arra["primer_apellido"] ?>
            </a>
          </li>

          <?php
            echo $cerrarS;
          }

        } else {
          echo $inicio;
        ?>

          <li class="nav-item"><a class="nav-link" href="cuenta.php">Iniciar sesion</a></li>

          <?php
        }
        ?>

        </ul>
      </div>
    </div>
  </nav>
</header>