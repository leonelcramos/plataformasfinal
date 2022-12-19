<?php
require 'config.php';
$GLOBALS['clave_incorrecta'] = '';
if (isset($_SESSION["id"])) {
    header("Location: index.php");
}
if (isset($_POST["submit2"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $checkData = mysqli_query($conn, "SELECT * FROM usuarios WHERE 'email'= '$email'");
    $row = mysqli_fetch_assoc($checkData);
    if (mysqli_num_rows($checkData) > 0) {
        $checkPassword = password_verify($password, $row["clave"]);
        if ($checkPassword == 1) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id_usuario"];
            $_SESSION["idnivel"] = $row["id_nivel"];
           

            header("Location: index.php");

        } else {
            $GLOBALS['clave_incorrecta'] = '<div class="card-body"><p class="card-text font-italic text-center"" style="color:#d00000;">email o contraseña incorrecta</p></div>';
            // echo "<script>alert('Contraseña incorrecta')</script>";
        }
    } else {
        $GLOBALS['clave_incorrecta'] = '<div class="card-body"><p class="card-text font-italic text-center" style="color:#d00000;">email o contraseña incorrecta</p></div>';
    }
}
?>

<div class="card p-3 m-sm-1 mb-3 col-sm col-md-5 col-lg-5 formulario ">
    <h2>Iniciar sesión</h2>
    <form method="post">
        
    <?php
        $c = $GLOBALS['clave_incorrecta'];
        echo "$c";
        ?>
        <label class="form-label" for="email">Ingresar con mail</label>
        <br>
        <input class="form-control " type="text" name="email" id="email" required>
        <br>
        <label class="form-label" for="password">Contraseña:</label>
        <br>
        <input class="form-control " type="password" name="password" id="password" required>
        <br>
        <button type="submit" name="submit2" class="btn btn-primary">Iniciar sesión</button>
    </form>

</div>

