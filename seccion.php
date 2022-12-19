<?php
//require 'config.php';
if (!isset($_SESSION["idnivel"])) {
    $_SESSION["idnivel"] = '';
}


if (isset($_SESSION["id"])) {
    $usuario = $_SESSION["id"];

    if (isset($_POST["like"])) {
        $publicacion = $_POST["idpublicacion"];

        $likes = mysqli_query($conn, "INSERT INTO likes_publicaciones VALUES ('','$usuario','$publicacion')");
    }

    if (isset($_POST["dislike"])) {
        $like = $_POST["id_like"];

        $likes = mysqli_query($conn, "DELETE FROM likes_publicaciones WHERE id_likearpublicacion = $like");
    }
}
;


?>

<section class="container bg-secondary bg-gradient">
    <div class="row p-2 justify-content-center">

        <?php
        if (!isset($_GET["publicacion"])) {
            //maestro
            $p = "SELECT publicaciones.id_publicacion, publicaciones.publicacion, publicaciones.descripcion_publicacion FROM publicaciones order by id_publicacion desc";
            $pub = mysqli_query($conn, $p);
            while ($publicacion = mysqli_fetch_assoc($pub)) {
                $id_publicacion = $publicacion["id_publicacion"];


        ?>

        <div class="card m-3 pt-3 col-lg-3 col-md-4" id='<?php echo $id_publicacion ?>'>
            <img src="<?php echo $publicacion["publicacion"]; ?>" alt="" class="card-img-top img-thumbnail">
            <form method="post" action="index.php#<?php echo $id_publicacion ?>">
                <?php
                if ($_SESSION['idnivel'] >= 2) {
                    if (isset($_POST['submit5'])) {
                       // $r = "DELETE FROM publicaciones WHERE id_publicacion = '$id_publicacion'";
                        //mysqli_query($conn, $r);
                       // header('Location: index.php');
                    }
                ?>
            <!-- <button class="btn" name='submit5'>Eliminar</button>-->
                <?php
                }
                if (isset($_SESSION["id"])) {
                    $us = $_SESSION["id"];

                    $check = mysqli_query($conn, "SELECT * FROM likes_publicaciones WHERE likes_publicaciones.id_publicacion = '$id_publicacion' AND likes_publicaciones.id_usuario = $us");

                    $lik = mysqli_query($conn, "SELECT * FROM likes_publicaciones WHERE likes_publicaciones.id_publicacion = '$id_publicacion'");

                    
                    $likr = mysqli_fetch_assoc($check);
                    $len = mysqli_num_rows($lik);
                    
                    if (mysqli_num_rows($check) > 0) {
                       
            ?>

                <input class="m-auto" type="hidden" name="id_like" value="<?php echo $likr["id_likearpublicacion"] ?>">

                <input class="btn  btn-primary d-flex justify-content-center" type="submit" name="dislike"
                    value="<?php echo $len ?>" >

                <?php
                    } else {
                ?>
                <input class="likes" type="hidden" name="idpublicacion" value="<?php echo $id_publicacion; ?>">

                <input class="btn btn-outline-primary d-flex justify-content-center " type="submit" name="like"
                    value="<?php echo $len ?>">


                <?php
                    }
                }
                ?>

            </form>
            <div class="card-body mb-5">
                <h5 class="card-text">
                    <?php echo $publicacion["descripcion_publicacion"] ?>
                </h5>
                <a href="index.php?publicacion=<?php echo $id_publicacion ?>" class="btn btn-primary ">Ver más</a>
            </div>

        </div>


        <?php
            }

        } else {
            //detalle
            $id_pub = $_GET["publicacion"];

            $p = "SELECT publicaciones.id_publicacion, publicaciones.publicacion, publicaciones.descripcion_publicacion FROM publicaciones WHERE publicaciones.id_publicacion = $id_pub";

            $c = "SELECT comentarios.id_comentario, comentarios.comentario, usuarios.primer_nombre, usuarios.primer_apellido FROM usuarios INNER JOIN comentarios ON usuarios.id_usuario = comentarios.id_usuario WHERE comentarios.id_publicacion = $id_pub";



            $resultado = mysqli_query($conn, $p);
            $resultado2 = mysqli_query($conn, $c);
            $publicaciones = mysqli_fetch_assoc($resultado);



        ?>
        <div class="card m-auto mb-5 pt-3 " style="width: 30rem;">
            <img src="<?php echo $publicaciones["publicacion"]; ?>" alt="" class="card-img-top">
            <div class="card-body">

                <h5 class="card-text">
                    <?php echo $publicaciones["descripcion_publicacion"] ?>
                </h5>
                <br>
                <?php
            while ($comentarios = mysqli_fetch_assoc($resultado2)) {

                ?>
                <h6>
                    <?php echo $comentarios["primer_nombre"] . ' ' . $comentarios["primer_apellido"] ?>
                </h6>
                <p>
                    <?php echo $comentarios["comentario"] ?>
                </p>


                <?php } ?>

                <?php
            if (isset($_SESSION["id"])) {
                $id = $_SESSION["id"];

                if (isset($_POST["submit"])) {
                    $comentario = $_POST["comentario"];

                    if ($comentario == "") {
                        header("Location:index.php?pelicula=$id&error=emptycomment");
                    }
                    $coment = "INSERT INTO comentarios VALUES('', '$id_pub', '$id', '$comentario')";
                    $q = mysqli_query($conn, $coment);
                    header("Location:index.php?publicacion=$id_pub");
                }

                ?>
                <form action="index.php?publicacion=<?php echo $id_pub ?>#comentario " method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Comenta</label>
                        <textarea class="form-control" id="comentario" name="comentario" rows="3" cols="30"></textarea>
                    </div>
                    <button class="btn btn-primary mb-3 " type="submit" name="submit">Comentar</button>
                </form>

                <?php
            } else {
                echo "<p style='color:red'>Para poder comentar tienes que estar logueado</p>";

            }
                ?>



            </div>





            <?php
        }

            ?>




</section>


</body>

</html>