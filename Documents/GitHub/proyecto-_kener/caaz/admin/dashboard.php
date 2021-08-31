<?php require_once('includes/session.php');
       require_once('includes/conn.php');
       require_once('id_check.php');  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Inicio</title>

    </head>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/awesome/font-awesome.css">
        <link rel="stylesheet" href="assets/css/animate.css">
    </head>
    <body>
    <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar" class="sammacmedia">
                <div class="sidebar-header">
                <img src="assets/image/lg1.png" class="img-thumbnail">
            
                    <strong> </strong>
                </div>
                <ul class="list-unstyled components">
                    <li  class="active">
                        <a href="dashboard.php">
                            <i class="fa fa-th"></i>
                           Inicio</a>
                    </li>
                    <?php
                    if($_SESSION['permission']==1 or $_SESSION['permission']==2  or $_SESSION['permission']==3
                    or $_SESSION['permission']==4){ 
                    ?>
                    <li>
                    <a href="a_objetivos.php">
                            <i class="fa fa-plus"></i>
                            Establecer de Objetivos </a>
                    </li>
                    <?php }?>
                    <li>
                    <a href="competencias.php">
                            <i class="fa fa-link"></i>
                            Competencias </a>
                    </li>
                    <li>
                        <a href="a_evaluacion.php">
                                <i class="fa fa-link"></i>
                                Autoevaluación</a>
                        </li>
                    <li>
                    <a href="c_objetivos.php">
                            <i class="fa fa-list"></i>
                         Editar Objetivos  </a>
                    </li>
                    <li>
                    <a href="e_competencias.php">
                            <i class="fa fa-list"></i>
                         Editar Competencias </a>
                    </li>
                   
                              <?php
                    if($_SESSION['permission']==2or $_SESSION['permission']==3 or $_SESSION['permission']==4 ){
                        ?>
                        <li>  
                        <a href="validacion.php">
                                <i class="fa fa-check"></i>
                             Validar Objetivos</a>
                        </li>
                        <li>
                            <a href="evaluacion.php">
                                    <i class="fa fa-check"></i>
                                    Evaluar Objetivos </a>
                            </li>
                            <li>
                            <a href="vcompetencias.php">
                                    <i class="fa fa-check"></i>
                                    Evaluar Competencias
                                </a>
                            </li>
                        <?php }?>
                             <?php
                    if($_SESSION['permission']==3 or $_SESSION['permission']==4){
                    ?>
                     <li>
                            <a href="validacion1+1.php">
                                    <i class="fa fa-link"></i>
                                    Validar Objetivos 1+1 </a>
                            </li>
                            <li>
                            <a href="vcompetencias1+1.php">
                                    <i class="fa fa-link"></i>
                                    Validar Competencias 1+1 </a>
                            </li>
                            <?php }?>
                            <?php
                    if($_SESSION['permission']==4){
                    ?>
                    <li>
                        <a href="periodos.php">
                            <i class="fa fa-table"></i>
                           Ver Periodos</a>
                    </li>
                     <li>
                        <a href="Objetivos.php">
                            <i class="fa fa-link"></i>
                            Ver Objetivos</a>
                    </li>
                     <li>
                        <a href="all_employees.php">
                            <i class="fa fa-table"></i>
                          Todos los Empleados </a>
                    </li>
                    <li>
                        <a href="a_users.php">
                            <i class="fa fa-user"></i>
                            Añadir Usuarios</a>
                    </li>
                    <li>
                        <a href="v_users.php">
                            <i class="fa fa-table"></i>
                            Ver Usuarios</a>
                    </li>
                    <?php } ?>
                    <li>
                    <a href="check.php">
                            <i class="fa fa-list"></i>
                         Reportes</a>
                    </li>
                    <li>
                        <a href="settings.php">
                            <i class="fa fa-cog"></i>
                            Ajustes </a>
                    </li>
                </ul>
            </nav>
 
            <!-- Page Content Holder -->
            <div id="content">
             
                <div clas="col-md-12">
                    <img src="assets/image/ssm3.png" class="img-thumbnail">
                    </div>

                <nav class="navbar navbar-default sammacmedia">
                    <div class="container-fluid">

                        <div class="navbar-header" id="sams">
                            <button type="button" id="sidebarCollapse" id="makota" class="btn btn-sam animated tada navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Menú</span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <button class="nav navbar-nav navbar-right  makotasamuel">
                                <li><a href="#"><?php require_once('includes/name.php');?></a></li>
                                <li ><a href="logout.php"><i class="fa fa-power-off"> Cerrar sesión</i></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
              
                <div class="line"></div>
                <div class="row">
                <?php
             if($_SESSION['permission']==1or $_SESSION['permission']==2 or $_SESSION['permission']==3 ){
                    ?>
                <div class="col-lg-3 col-md-4 ">
                    <a href="check.php"><div class="panel panel strover sammacmedia">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo " <h3> $total</h3>";?></div>
                                    <div><h5>OBJETIVOS TOTALES</h5></div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                   <a href="c_objetivos.php"> <div class="panel panel sammac sammacmedia">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php  echo " <h3> $ap</h3>";?></div>
                    <div><h5> PENDIENTES </5></div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <a href="check.php">  <div class="col-lg-3 col-md-4 ">
                    <div class="panel panel sammac1 sammacmedia">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-clock-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php  echo " <h3> $pv</h3>";?></div>
                                    <div><h5> EN VALIDACIÓN   <br></h5></div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="a_evaluacion.php">  <div class="col-lg-3 col-md-4 ">
                    <div class="panel panel sammac3 sammacmedia">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-clock-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php  echo " <h3> $pe</h3>";?></div>
                                    <div><h5> EN EVALUACIÓN</h5></div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="e_competencias.php">  <div class="col-lg-3 col-md-4 ">
                    <div class="panel panel strover sammacmedia">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-clock-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php  echo " <h3>$hcp</h3>";?></div>
                                    <div><h5> COMPETENCIAS TOTALES</h5></div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                   <a href="c_objetivos.php"> <div class="panel panel sammac sammacmedia">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php  echo " <h3> $ap</h3>";?></div>
                    <div><h5> COMPETENCIAS PENDIENTES </5></div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                
                <?php }?>
                             <?php
                    if(  $_SESSION['permission']==2 ){
                    ?>
                   <a href="validacion.php">  <div class="col-lg-3 col-md-4 ">
                    <div class="panel panel sammac2 sammacmedia">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-clock-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php  echo " <h3> $ppv</h3>";?></div>
                                    <div><h5> PENDIENTES DE VALIDAR</h5></div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <a href="evaluacion.php"> <div class="col-lg-3 col-md-4">
                    <div class="panel panel strover sammacmedia">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list-alt fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php   echo " <h3> $ppe</h3>";?></div>
                                    <div><h5> PENDIENTES DE EVALUAR </h5></div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }
                    if( $_SESSION['permission']==2 ){
                    ?>
                <a href="vcompetencias.php">  <div class="col-lg-3 col-md-4 ">
                    <div class="panel panel sammac sammacmedia">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-clock-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php  echo " <h3>$hcp1</h3>";?></div>
                                    <div><h5> COMPETENCIAS PENDIENTES DE VALIDAR</h5></div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
                    <?php
                    if($_SESSION['permission']==3 ){
                    ?>
                    <a href="validacion1+1.php">  <div class="col-lg-3 col-md-4 ">
                    <div class="panel panel sammac2 sammacmedia">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-clock-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php  echo " <h3> $ppv1</h3>";?></div>
                                    <div><h5> PENDIENTES DE VALIDAR</h5></div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="vcompetencias1+1.php">  <div class="col-lg-3 col-md-4 ">
                    <div class="panel panel sammac1 sammacmedia">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-clock-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php  echo " <h3>$hcp2</h3>";?></div>
                                    <div><h5> COMPETENCIAS PENDIENTES DE VALIDAR</h5></div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php }?>
                    <?php
                    if($_SESSION['permission']==4 ){
                    ?>
                   <a href="objetivos.php">  <div class="col-lg-6 col-md-4 ">
                    <div class="panel panel strover sammacmedia">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-clock-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php  echo " <h3> $full</h3>";?></div>
                                    <div><h4> OBJETIVOS TOTALES </h4></div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <a href="objetivos.php"> <div class="col-lg-6 col-md-4">
                    <div class="panel panel sammac2 sammacmedia">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-list-alt fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php   echo " <h3> $fulln</h3>";?></div>
                                    <div><h5>  OBJETIVOS NO COMPLETADOS</h5></div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php }?>
        </div>
                <div class="line"></div>
                <footer>
            <p class="text-center">
            HGZ hailglez@gmail.com &copy;<?php echo date("Y ");?>Copyright. All Rights Reserved.           </p>
            </footer>
            </div>
            
        </div>





        <!-- jQuery CDN -->
         <script src="assets/js/jquery-1.10.2.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="assets/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
             $('sams').on('click', function(){
                 $('makota').addClass('animated tada');
             });
         </script>
    </body>
</html>
