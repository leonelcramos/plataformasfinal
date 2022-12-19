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

    // function empt($var) {if (empty($var)) {$var = '';} return $var;}
    
    //empt($_POST['clave_desigual']);
    
    if (empty($_POST['clave_desigual'])) {
        $_POST['clave_desigual'] = '';
    }
    if (empty($_POST['clave_modificada'])) {
        $_POST['clave_modificada'] = '';
    }
    if (isset($_SESSION["id"])) {

        if (empty($_SESSION['password1'])) {
            $_SESSION['password1'] = '';
        }
        if (empty($_SESSION['password2'])) {
            $_SESSION['password2'] = '';
        }
        if (empty($_SESSION['password3'])) {
            $_SESSION['password3'] = '';
        }

        $id_user = $_SESSION["id"];

        $td = "SELECT * FROM usuarios WHERE id_usuario = $id_user";
        $res = mysqli_query($conn, $td);
        $body = mysqli_fetch_assoc($res);

        if (isset($_POST["submit3"])) {
            $b = "DELETE FROM usuarios WHERE id_usuario = $id_user";
            mysqli_query($conn, $b);
            require 'logout.php';
            header("Location:index.php");

        }

        if (isset($_POST["submit"])) {


            $array = [];


            if ($_POST['primernombre'] != '') {
                $pnombre = $_POST['primernombre'];
                $primernombre = ucfirst($pnombre);
                $arr2 = "primer_nombre='$primernombre'";
                array_push($array, $arr2);
            }
            ;
            if ($_POST['segundonombre'] != '') {
                $snombre = $_POST['segundonombre'];
                $segundonombre = ucfirst($snombre);
                $arr3 = "segundo_nombre='$segundonombre'";
                array_push($array, $arr3);
            }
            ;
            if ($_POST['primerapellido'] != '') {
                $papellido = $_POST['primerapellido'];
                $primerapellido = ucfirst($papellido);
                $arr4 = "primer_apellido='$primerapellido'";
                array_push($array, $arr4);
            }
            ;
            if ($_POST['segundoapellido'] != '') {
                $sapellido = $_POST['segundoapellido'];
                $segundoapellido = ucfirst($sapellido);
                $arr5 = "segundo_apellido='$segundoapellido'";
                array_push($array, $arr5);
            }
            ;
            if ($_POST['email'] != '') {
                $email = $_POST['email'];
                $arr6 = "email='$email'";
                array_push($array, $arr6);
            }
            ;

            $string = implode(", ", $array);

            $q = "UPDATE usuarios SET $string WHERE  id_usuario = '$id_user'";
            mysqli_query($conn, $q);
            header("Location:miperfil.php");
        }

        //miperfil: Cambiar contrasena
    
        if (isset($_POST["submit4"])) {

            $idusuario = $body['id_usuario'];
            $claveA = $body['clave'];
            $array2 = [];


            if ($_POST['password1'] != '') {
                $pass1 = $_POST['password1'];
                if (password_verify($pass1, $claveA)) {
                    if ($_POST['password2'] != '') {
                        $password2 = $_POST['password2'];
                        $claveB = "clave='$password2'";
                        if ($_POST['password3'] != '') {
                            $password3 = $_POST['password3'];
                            if ($password2 == $password3) {
                                $hashedPassword = password_hash($password2, PASSWORD_DEFAULT);
                                $clav = "clave='$hashedPassword'";
                                $q = "UPDATE usuarios SET $clav WHERE  id_usuario = '$id_user'";
                                mysqli_query($conn, $q);
                                $_POST['clave_modificada'] = '<p class="card-text" style="color:green;">Has modificado tu contraseña con éxito</p>';
                                $_SESSION['password1'] = '';
                                $_SESSION['password2'] = '';
                                $_SESSION['password3'] = '';

                            } else {
                                $_POST['clave_desigual'] = '<p class="card-text" style="color:#d00000;">Las contraseñas no son iguales</p>';
                            }


                        } else {
                            $_POST['clave_desigual'] = '<p class="card-text" style="color:#d00000;">Confirme la nueva contraseña</p>';
                        }
                    } else {
                        $_POST['clave_desigual'] = '<p class="card-text" style="color:#d00000;">Ingrese la nueva contraseñas</p>';
                    }
                } else {
                    $_POST['clave_desigual'] = '<p class="card-text" style="color:#d00000;">La contraseña es incorrecta</p>';
                }
                ;


            }
            ;

        }
        ;




    ?>
    <section class="container-fluid">

        <a href="index.php" class="btn btn-primary m-2">volver</a>
        <div class='row  justify-content-evenly'>
            <div class="card p-3 m-3 formulario  col-sm col-md-4 ">
                <?php
        $mod = $_POST['clave_modificada'];
        echo "$mod";
            ?>

                <form method="post">
                    <div class="mb-3 ">
                        <h3 class="form-label m-auto" for="password1">Mis Datos</h3>
                        <br>

                        <label class="form-label" for="password1">Primer nombre:</label>
                        <input class="form-control " type="text" name="primernombre" id="primernombre"
                            value=" <?php echo $body["primer_nombre"]; ?>">
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
                        <input class="form-control " type="email" name="email" id="email"
                            value="<?php echo $body["email"]; ?>">
                        <br>
                        <button class="btn btn-primary" type="submit" name="submit">modificar</button>
                        <button class="btn btn-primary" type="submit" name="submit3">eliminar</button>


                    </div>

                </form>

            </div>
            <div class="card p-3 m-3 formulario  col-sm col-md-4 ">
                <form method="post">
                    <div class="mb-3 mt-5 ">
                        <h4>Cambiar contraseña</h4>
                        <?php
        $d = $_POST['clave_desigual'];
        echo "$d";
                    ?>

                        <label class="form-label" for="password1">Contraseña actual:</label>
                        <input class="form-control " type="password" name="password1" id="password1"
                            value="<?php echo $_SESSION['password1']; ?>">
                        <br>
                        <label class="form-label" for="password2">Nueva contraseña:</label>
                        <input class="form-control " type="password" name="password2" id="password2"
                            value="<?php echo $_SESSION['password2']; ?>">
                        <br>
                        <label class="form-label" for="password3">Confirmar contraseña:</label>
                        <input class="form-control " type="password" name="password3" id="password3"
                            value="<?php echo $_SESSION['password3']; ?>">
                        <br>

                        <button class="btn btn-primary" type="submit" name="submit4">modificar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php


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