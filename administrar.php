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
</head>

<body>

    <?php

    require 'header.php';

    if (isset($_SESSION["id"]) && $_SESSION["idnivel"] == 2 ) {
       $id_us = $_SESSION["id"];





        if (!isset($_GET["usuario"])) {
    ?>
    <a href="agregar.php" class="btn btn-primary m-2 botonadm">agregar nuevo usuario</a>
    <a href="miperfil.php" class="btn btn-primary m-2 botonadm">mi perfil</a>

    <div class='table-responsive'>
        <table class="table ">
            <form action="" method="post">
                <tr class="">
                    <?php
            $th = "SELECT COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'usuarios'AND TABLE_SCHEMA ='tp1desarrollo5'";

            $res = mysqli_query($conn, $th);

            echo "<th scope='col'></th>";
            for ($i = 0; $i < 7; $i++) {
                $encabezado = mysqli_fetch_assoc($res);
                echo "<th scope='col'>" . $encabezado['COLUMN_NAME'] . "</th>";
            }


                    ?>
                </tr>


                <?php


            $td = "SELECT * FROM usuarios WHERE id_usuario != $id_us ORDER BY id_usuario DESC";
            $res2 = mysqli_query($conn, $td);

            while ($body = mysqli_fetch_assoc($res2)) {
                $id_usuario = $body['id_usuario'];
                ?>
                <tr>
                    <td>
                        <a href="administrar.php?usuario=<?php echo $id_usuario ?>"
                            class="btn btn-primary">modificar</a>
                    </td>


                    <td>
                        <?php echo $id_usuario ?>
                    </td>
                    <td>
                        <?php echo $body["id_nivel"]; ?>
                    </td>
                    <td>
                        <?php echo $body["primer_nombre"]; ?>
                    </td>
                    <td>
                        <?php echo $body["segundo_nombre"]; ?>
                    </td>
                    <td>
                        <?php echo $body["primer_apellido"]; ?>
                    </td>
                    <td>
                        <?php echo $body["segundo_apellido"]; ?>
                    </td>
                    <td>
                        <?php echo $body["email"]; ?>
                    </td>


                </tr>
                <?php
            }
                ?>

              


            </form>
        </table>

    </div>
    <?php
        } else {
            $id_user = $_GET['usuario'];

            $td = "SELECT * FROM usuarios WHERE id_usuario = $id_user";
            $res = mysqli_query($conn, $td);
            $body = mysqli_fetch_assoc($res);
            if (isset($_POST["submit3"])) {
                $b = "DELETE FROM usuarios WHERE id_usuario = $id_user";
                mysqli_query($conn, $b);
                header("Location:administrar.php");
            }

            if (isset($_POST["submit"])) {
                if (empty($_POST['clave_desigual'])) {
                    $_POST['clave_desigual'] = '';
                }

                $idusuario = $body['id_usuario'];
                $array = [];

                if ($_POST['idnivel'] != $body['id_nivel']) {
                    $idnivel = $_POST['idnivel'];
                    $arr1 = "id_nivel='$idnivel'";
                    array_push($array, $arr1);
                }
                ;
                if ($_POST['primernombre'] != $body['primer_nombre']) {
                    $pnombre = $_POST['primernombre'];
                    $primernombre = ucfirst($pnombre);
                    $arr2 = "primer_nombre='$primernombre'";
                    array_push($array, $arr2);
                }
                ;
                if ($_POST['segundonombre'] != $body['segundo_nombre']) {
                    $snombre = $_POST['segundonombre'];
                    $segundonombre = ucfirst($snombre);
                    $arr3 = "segundo_nombre='$segundonombre'";
                    array_push($array, $arr3);
                }
                ;
                if ($_POST['primerapellido'] != $body['primer_apellido']) {
                    $papellido = $_POST['primerapellido'];
                    $primerapellido = ucfirst($papellido);
                    $arr4 = "primer_apellido='$primerapellido'";
                    array_push($array, $arr4);
                }
                ;
                if ($_POST['segundoapellido'] != $body['segundo_apellido']) {
                    $sapellido = $_POST['segundoapellido'];
                    $segundoapellido = ucfirst($sapellido);
                    $arr5 = "segundo_apellido='$segundoapellido'";
                    array_push($array, $arr5);
                }
                ;
                if ($_POST['email'] != $body['email']) {
                    $email = $_POST['email'];
                    $arr6 = "email='$email'";
                    array_push($array, $arr6);
                }
                ;
                if ($_POST['password1'] != '' ) {
                    //if($_POST['password1'] == $_POST['password2']){
                     $password1 = $_POST['password1'];
                    $hashedPassword = password_hash($password1, PASSWORD_DEFAULT);
                    $arr7 = "clave='$hashedPassword'";
                    array_push($array, $arr7);   
                   // } else {
                    //    $_POST['clave_desigual'] = '<p class="card-text" style="color:#d00000;">Las contraseñas no son iguales</p>';
                   // }
                    
                }
                ;
                $string = implode(", ", $array);

                $q = "UPDATE usuarios SET $string WHERE  id_usuario = '$idusuario'";
                mysqli_query($conn, $q);
                header("Location:administrar.php?usuario=$idusuario");
            }

    ?>
    <a href="administrar.php" class="btn btn-primary m-2">volver</a>
    <div class="card p-3 m-auto mb-5 formulario   " style="width: 30rem;">

        <form method="post">
            <div class="mb-3">
                <h3 class="form-label" for="password1">ID usuario
                    <?php echo $body["id_usuario"]; ?>
                </h3>
                <br>
                <label class="form-label" for="password1">ID nivel</label>
                <input class="form-control " type="text" name="idnivel" id="idnivel"
                    value="<?php echo $body["id_nivel"]; ?>">

                <br>
                <label class="form-label" for="password1">Primer nombre:</label>
                <input class="form-control " type="text" name="primernombre" id="primernombre"
                    value="<?php echo $body["primer_nombre"]; ?>">
                <br>
                <label class="form-label" for="password1">Segundo nombre:</label>
                <input class="form-control " type="text" name="segundonombre" id="segundonombre"
                    value="<?php echo $body["segundo_nombre"]; ?>">
                <br>
                <label class="form-label" for="password1">Primer apellido:</label>
                <input class="form-control " type="text" name="primerapellido" id="primerapellido"
                    value="<?php echo $body["primer_apellido"]; ?>">
                <br>
                <label class="form-label" for="password1">Segundo apellido:</label>
                <input class="form-control " t type="text" name="segundoapellido" id="segundoapellido"
                    value="<?php echo $body["segundo_apellido"]; ?>">
                <br>
                <label class="form-label" for="password1">email:</label>
                <input class="form-control " type="email" name="email" id="email" value="<?php echo $body["email"]; ?>"
                    placeholder="<?php echo $body["email"]; ?>">
                <br>
                <label class="form-label" for="password1">Contraseña:</label>
                <input class="form-control " type="password" name="password1" id="password1">
                <br>
                <label class="form-label" for="password2">Repetir contraseña:</label>
                <input class="form-control " type="password" name="password2" id="password2">
                <br>
                <button class="btn btn-primary" type="submit" name="submit">modificar</button>
                <button class="btn btn-primary" type="submit" name="submit3">eliminar</button>


            </div>

        </form>

    </div>

    <?php

        }
    } else {
        echo "<p class='m-auto mt-5'>No tienes acceso a esta página</p><br>
        <a href='index.php' class='btn btn-primary'>volver</a>";
    }


    require 'footer.php';

    ?>
    <script src="jquery-3.0.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>