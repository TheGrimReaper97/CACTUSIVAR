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
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/scripts.js"></script>
    </head>
    <body >
        <!-- Responsive navbar-->
        
        <nav style="background-color:green;" class="navbar navbar-expand-lg navbar-dark ">
            <div class="container px-lg-5">
                <div id="mySidenav" class="sidenav">
                    <a  href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <hr>
                    <nav class="nav">
                        <div>  
                            <a href="index.php" class="nav_logo"><i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Menu</span> </a>
                            
                            <div class="nav_list"> <a href="#" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                                
                                 <a href="#" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a> 
                                 
                                 <a href="#" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Messages</span> </a> 
                                 
                                 <a href="#" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span> </a> 
                                 
                                 <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span> </a> 
                                 
                                 <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a> </div>
                                 
                        </div>
                        <hr> 
                        <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Cerrar Sesi&oacute;n</span> </a>
                        
                    </nav>
                  </div>
                  <span class="navegador" style="font-size:30px;cursor:pointer;color:white;" onclick="openNav()">&#9776;</span>
                <a class="navbar-brand" href="#!">CACTUSIVAR</a>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                     Opciones
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </div>
                  
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header  >
            
            <div  >
                <div  class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div  class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold">Bienvenido!</h1>
                        <p class="fs-4">“CACTUSIVAR” es una empresa salvadoreña dedicada a la venta de plantas y suculentas.
                        <a class="btn btn-primary btn-lg" href="#!">Acerca de Nosotros</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- Page Content-->
        <section class="pt-4">
        <?php
                $productos=simplexml_load_file('productos.xml');
               

                    
                ?>



        <div class="container">
      <?php  foreach($productos->producto as $row){

    

      ?>
            <div  class="col-md-4 mb-2" style=" border-color: #818181; border-left-width: thin;">
                <hr>
                <h4 style="text-align:center; " class="h4 mb-2"><?=$row->nombre ?></h4>
                <hr>
                <img  class="img-responsive" border="2px" style="height: 300px; width: 300px; border-radius:150px; padding:  5px 5px 5px 5px;text-align:center" src="img/<?=$row->img?>"></img>
                <p style="text-align:center; padding:  15px 15px 15px 15px;"><?=$row->descripcion?></p>
                <a style="text-align:center" href="#editarmodal<?php echo $row->codigo; ?>" data-toggle="modal" class="btn btn-success">Comprar</a>  <a disabled="true" class="btn btn-primary" href="#!">Precio $<?=$row->precio?></a> <a disabled="true" class="btn btn-primary" href="#!">Existencias <?=$row->existencias?></a>
            </div>
            <?php include('ver_modal.php'); ?>
            <?php } ?>
        </div>
        
            </div>


            </div>
           
        </section>
        <!-- Footer-->
        <footer style="background-color:green;" class="py-5 ">
            <div class="container"><p class="m-0 text-center text-white">CACTUSIVAR 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

<?php include('nueva_modal.php'); ?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

    </body>
</html>
