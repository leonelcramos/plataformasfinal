<?php
$conn = mysqli_connect("localhost", "root", "", "tp1desarrollo5");

mysqli_set_charset($conn, 'utf8');


if (empty($_POST['clave_desigual'])) {
    $_POST['clave_desigual'] = '';
}
if (empty($_POST['primernombre'])) {
    $_POST['primernombre'] = '';
}
if (empty($_POST['segundonombre'])) {
    $_POST['segundonombre'] = '';
}
if (empty($_POST['primerapellido'])) {
    $_POST['primerapellido'] = '';
}
if (empty($_POST['segundoapellido'])) {
    $_POST['segundoapellido'] = '';
}
if (empty($_POST['email'])) {
    $_POST['email'] = '';
}



if (isset($_SESSION["id"])) {
    header("Location: index.php");
}
if (isset($_POST["submit"])) {
    $primernombre = $_POST["primernombre"];
    $segundonombre = $_POST["segundonombre"];
    $primerapellido = $_POST["primerapellido"];
    $segundoapellido = $_POST["segundoapellido"];
    $email = $_POST["email"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];



    $checkData = mysqli_query($conn, "SELECT * FROM usuarios WHERE 'email' = '$email'");
    if (mysqli_num_rows($checkData) > 0) {
        echo "<script>alert('Email ya en uso')</script>";
    } else {
        if ($password1 == $password2) {
            $hashedPassword = password_hash($password1, PASSWORD_DEFAULT);
            $capitalizePNombre = ucfirst($primernombre);
            $capitalizeSNombre = ucfirst($segundonombre);
            $capitalizePApellido = ucfirst($primerapellido);
            $capitalizeSApellido = ucfirst($segundoapellido);
            $q = "INSERT INTO usuarios VALUES('', '1', '$capitalizePNombre', '$capitalizeSNombre', '$capitalizePApellido', '$capitalizeSApellido', '$email', '$hashedPassword')";
            mysqli_query($conn, $q);
            $r = "SELECT usuarios.id_usuario, usuarios.primer_nombre, usuarios.primer_apellido FROM usuarios WHERE 'usuarios.email' = '$email'";
            $logauto = mysqli_query($conn, $r);
            $row = mysqli_fetch_assoc($logauto);
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id_usuario"];
            header("Location: cuenta.php");
        } else {


            $_POST['clave_desigual'] = '<p class="card-text" style="color:#d00000;">Las contraseñas no son iguales</p>';
         

        }
    }
}

?>

<div class="card p-3 m-sm-1 mb-5 col-sm col-md-5 col-lg-5 formulario  ">
    <h2>Registrarse</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label" for="password1">Primer nombre:</label>
            <input class="form-control " type="text" name="primernombre" id="primernombre"
                value="<?php echo $_POST['primernombre']; ?>" required>
            <br>
            <label class="form-label" for="password1">Segundo nombre:</label>
            <input class="form-control " type="text" name="segundonombre" id="segundonombre"
                value="<?php echo $_POST['segundonombre']; ?>">
            <br>
            <label class="form-label" for="password1">Primer apellido:</label>
            <input class="form-control " type="text" name="primerapellido" id="primerapellido"
                value="<?php echo $_POST['primerapellido']; ?>" required>
            <br>
            <label class="form-label" for="password1">Segundo apellido:</label>
            <input class="form-control " t type="text" name="segundoapellido" id="segundoapellido"
                value="<?php echo $_POST['segundoapellido']; ?>">
            <br>
            <label class="form-label" for="password1">email:</label>
            <input class="form-control" type="email" name="email" id="email" value="<?php echo $_POST['email']; ?>"
                required>
            <br>
            <?php
            $d = $_POST['clave_desigual'];
            echo "$d";
            
            ?>
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