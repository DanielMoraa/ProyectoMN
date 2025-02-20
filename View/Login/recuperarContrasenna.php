<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/Controller/LoginController.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto/View/layoutExterno.php";
?>

<!DOCTYPE html>
<html lang="en">

<?php PrintCss(); ?>

<body class="bg-gradient-primary">

    <div class="container MargenSuperior">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Recuperar Contraseña</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                        placeholder="Correo" id="txtCorreo" name="txtCorreo">
                                        </div>
                                        <input type="submit" class="btn btn-danger btn-user btn-block" value="Procesar"
                                        id="btnRecuperarCuenta" name="btnRecuperarCuenta" >
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="registrarCuenta.php">Crear una Cuenta</a>
                                    </div>
                                    <div class="text-center">
                                    <a class="small" href="login.php">Iniciar Sesión</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php PrintScript(); ?>

</body>

</html>