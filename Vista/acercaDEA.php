<?php include('../Modelo/BDconect.php'); ?>
<!DOCTYPE html>
<html lang="Es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CACTUSIVAR</title>
    <!-- Favicon-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap icons-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="../js/scripts.js"></script>
</head>

<body>
    <!-- Responsive navbar-->

    <nav style="background-color:green;" class="navbar navbar-expand-lg navbar-dark ">
        <div class="container px-lg-5">
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <hr>
                <nav class="nav">
                    <div>
                   
                        <div class="nav_list"> <a href="#" class="nav_link active"> 

                            <a href="#abajo" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Contactos</span> </a>

                            <a href="acercaDEA.php" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Acerca de</span> </a>

                            <a href="usuario.php" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Inicio</span> </a>
                        </div>

                    </div>
                    <hr>
                    <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Cerrar Sesi&oacute;n</span> </a>

                </nav>
            </div>
            <span class="navegador" style="font-size:30px;cursor:pointer;color:white;" onclick="openNav()">&#9776;</span>
            <a class="navbar-brand" href="usuario.php">CACTUSIVAR</a>
            <div class="dropdown">
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="admin.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="acercaDEA.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#abajo">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header>
        <div>
            <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                <div class="m-4 m-lg-5">
                    <br><br><br><br><br>
                    <h1 class="display-5 fw-bold">¿Quienes Somos?</h1>
                    <h2 class="display-8 fw">
                        “CACTUSIVAR” es una empresa salvadoreña dedicada a la venta de plantas y suculentas. ofrecemos diferentes variedades de plantas
                        a domicilio. Desde tu ordenador o móvil, a cualquier hora y desde cualquier lugar.
                        Son tres de las ventajas que más nos gustan de enviar Plantas por internet.
                        Hoy por hoy muchas de las gestiones las podemos hacer con un móvil en las manos y enviar Plantas a domicilio es una de ellas.
                    </h2>
                    <br><br><br><br><br>
                </div>
            </div>
        </div>
    </header>
    <!-- Page Content-->

    <!-- Footer-->
    <!-- Footer -->
    <footer style="background-color:green; color: white;" class="text-center text-lg-start">
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h2 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>CACTUSIVAR
                        </h2>
                        <p>
                        “CACTUSIVAR” es una empresa salvadoreña dedicada a la venta de plantas en linea.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Productos
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Cactus</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Suculentas</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Flores</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Hortalizas</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Contact
                        </h6>
                        <p><i class="fas fa-home me-3"></i> San SVLD, NY 10012, ES</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            tiendaCACTUSIVAR@gmail.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 503 2345-67</p>
                        <p><i class="fas fa-print me-3"></i> + 503 2345-67</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2022 Copyright:
            <a name="abajo" class="text-reset fw-bold" href="https://CACTUSIVAR.com/">CACTUSIVAR.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

</body>

</html>