<!DOCTYPE html>
<html lang="Es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Heroic Features - Start Bootstrap Template</title>
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
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                <a class="navbar-brand" href="#!">TextilExport</a>
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
                        <h1 class="display-5 fw-bold">Bienvenido Eres Administrador!</h1>
                        <p class="fs-4">“TextilExport” es una empresa salvadoreña dedicada a la venta al mayoreo de productos textiles 
                            y artículos promocionales.
                            </p>
                        <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-lg" ><span class="glyphicon glyphicon-floppy-disk"></span> Agregar Nuevos Productos</a>   
                    </div>
                </div>
            </div>
        </header>
        <!-- Page Content-->
        <section class="pt-4">
            <div class="container">
        <table class="table table-bordered table-striped" >
                <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Imagenes</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th>Existencias</th>
                </thead>
                <tbody>
                   
                <?php
                $productos=simplexml_load_file('productos.xml');
                $numerador=0;
                $denominador=0;
                foreach($productos->producto as $row){
                    
                ?>

                <tr>
                    <td style="width: 120px; padding:  10px 0px 5px 20px;" class="table-active"><?=$row->codigo?>
                    <a href="#editarmodal<?php echo $row->codigo; ?>" data-toggle="modal" class="btn btn-success">comprar/buy</a><br>
                    <a class="btn btn-danger" href="#delete_<?=$row->codigo?>" data-toggle="modal"><span class="glyphicon glyphicon-floppy-disk"></span> Eliminar..</a>
                    <td style="width: 250px;text-align:center" class="table-default"><?=$row->nombre?></td>
                    <td style="text-align:center" class="table-primary"><?=$row->descripcion?></td>
                    <td style="text-align:center" class="table-secondary"><img border="2px" style="height: 150px; width: 150px; border-radius:150px; padding:  5px 5px 5px 5px;" src="img/<?=$row->img?>"></img></td>
                    <td style="text-align:center" class="table-success"><?=$row->categoria?></td>
                    <td style="text-align:center" class="table-danger"><a>$ </a><?=$row->precio?></td>
                    <td style="text-align:center" class="table-warning"><?=$row->existencias?></td>
                   
                </tr>
         
                <?php include('ver_modal.php'); ?>
                <?php include('nueva_modal.php'); ?>
                <?php include('borrar_modal.php'); ?>

                <?php
}
               
                ?>

                </tbody>
            </table>
            </div>


            </div>
           
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021 Santos Ronaldo, Lemus Torres LT191211</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>



<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

    </body>
</html>
