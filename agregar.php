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
    <title>Segundo Parcial</title>
</head>

<body>

    <?php

    require 'header.php';
    if (isset($_SESSION["id"]) && $_SESSION["idnivel"] == 2) {

        $conn = mysqli_connect("localhost", "root", "", "tp1desarrollo5");

        mysqli_set_charset($conn, 'utf8');
        if (isset($_POST["submit"])) {
            $nivel = $_POST["nivel"];
            $primernombre = $_POST["primernombre"];
            $segundonombre = $_POST["segundonombre"];
            $primerapellido = $_POST["primerapellido"];
            $segundoapellido = $_POST["segundoapellido"];
            $email = $_POST["email"];
            $password1 = $_POST["password1"];
            $password2 = $_POST["password2"];

            $checkData = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '$email'");
            if (mysqli_num_rows($checkData) > 0) {
                echo "<script>alert('Email ya en uso')</script>";
            } else {
                if ($password1 == $password2) {
                    $hashedPassword = password_hash($password1, PASSWORD_DEFAULT);
                    $capitalizePNombre = ucfirst($primernombre);
                    $capitalizeSNombre = ucfirst($segundonombre);
                    $capitalizePApellido = ucfirst($primerapellido);
                    $capitalizeSApellido = ucfirst($segundoapellido);
                    $q = "INSERT INTO usuarios VALUES('', '$nivel', '$capitalizePNombre', '$capitalizeSNombre', '$capitalizePApellido', '$capitalizeSApellido', '$email', '$hashedPassword')";
                    mysqli_query($conn, $q);
                   
                    header("Location: administrar.php");
                } else {
                    echo "<script>alert('Las contraseñas no son iguales')</script>";
                }
            }
        }

    ?>
    <a href="administrar.php" class="btn btn-primary m-2">volver</a>
    <div class="card p-3 m-auto mb-5  formulario   " style="width: 30rem;">
        <h2>Agregar nuevo usuario</h2>
        <form method="post">
            <div class="mb-3">
            <label class="form-label" for="password1">ID nivel(del 0 al 5)</label>
                <input class="form-control " type="number"  min="0" max="5" name="nivel" id="nivel" required>
                <br>
                <label class="form-label" for="password1">Primer nombre:</label>
                <input class="form-control " type="text" name="primernombre" id="primernombre" required>
                <br>
                <label class="form-label" for="password1">Segundo nombre:</label>
                <input class="form-control " type="text" name="segundonombre" id="segundonombre">
                <br>
                <label class="form-label" for="password1">Primer apellido:</label>
                <input class="form-control " type="text" name="primerapellido" id="primerapellido" required>
                <br>
                <label class="form-label" for="password1">Segundo apellido:</label>
                <input class="form-control " t type="text" name="segundoapellido" id="segundoapellido">
                <br>
                <label class="form-label" for="password1">email:</label>
                <input class="form-control " type="email" name="email" id="email" required>
                <br>
                <label class="form-label" for="password1">Contraseña:</label>
                <input class="form-control " type="password" name="password1" id="password1" required>
                <br>
                <label class="form-label" for="password2">Repetir contraseña:</label>
                <input class="form-control " type="password" name="password2" id="password2" required>
                <br>
                <button class="btn btn-primary" type="submit" name="submit">Registrar</button>

            </div>

        </form>

    </div>

    <?php
    } else {
        echo "<p class='m-auto mt-5'>No tienes acceso a esta página</p><br>
    <a href='index.php' class='btn btn-primary'>volver</a>";
    }
    require 'footer.php';
    ?>





    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>