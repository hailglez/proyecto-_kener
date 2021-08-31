<?php require_once('includes/session.php');
      require_once('includes/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Ver Empleados</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/awesome/font-awesome.css">
        <link rel="stylesheet" href="assets/css/animate.css">
         <link rel="stylesheet" href="vendors/datatables/datatables.min.css">
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
                    <li>
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
                            Establecer Objetivos </a>
                    </li>
                    <?php }?>
                    <li >
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
                     <li class="active">
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
                                           
		<div class="panel panel-default sammacmedia">
            <div class="panel-heading"> Todos los empleados
            </div>
        <div class="panel-body">
                 <table class="table table-striped thead-dark table-bordered table-hover" id="myTable">
                <thead>
                <tr>
                    <th>No</th>
               
                    <th> Nombre </th>
                    <th> Apellido </th>
                    <th> Email </th>
                    <th> teléfono </th>
                    <th> Género </th>
                    <th> No. de Nomina </th>
                    <th> Acción </th>
                   
                    
                    
                    </tr>
                </thead>
                    <?php
                                   $a=1;
                    $query=mysqli_query($mysqli,"select *from `employees` ");
                     while($row=mysqli_fetch_array($query))
                        {
                          
                          ?>
                          <tr>
                              <td><?php echo $a;?></td> 
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['surname'];?></td>  
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['phone'];?></td>
                            <td><?php echo $row['gender'];?></td>  
                            <td><?php echo $row['employee_id'];?></td> 
                            <td>
                            <a href="#samstrover<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-warning"><span class="fa fa-pencil"></span> Ver</a>  <!-- <a href="all_employees.php?edited=1&idx=<//*?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger"><span class="fa fa-times"></span> Eliminar</a>-->
                              </td>
                          </tr>
                          <?php
                        require('userInfo.php');
                            $a++;
                      }
                       

          
                      if (isset($_GET['idx']) && is_numeric($_GET['idx']))
                      {
                          $id = $_GET['idx'];
                          if ($stmt = $mysqli->prepare("DELETE FROM employees WHERE id = ? LIMIT 1"))
                          {
                              $stmt->bind_param("i",$id);
                              $stmt->execute();
                              $stmt->close();
                               ?>
                    <div class="alert alert-success strover" id="sams1">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong> Successfully! </strong><?php echo'Record Successfully deleted please refresh this page';?></div>
               
                    <?php
                          }
                          else
                          {
                    ?>
                    <div class="alert alert-danger samuel" id="sams1">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong> Danger! </strong><?php echo'OOPS please try again something went wrong';?></div>
                    <?php
                          }
                          $mysqli->close();

                      }
                else

                {

                }
                      ?>
              
               
                </table>
            </div>
                </div>
                <div class="line"></div>
                <footer>
            <p class="text-center">
            Hail Alejandro Gonzalez &copy;<?php echo date("Y ");?>Copyright. All Rights Reserved, codigo fuente
            </p>
            </footer>
            </div>
            
        </div>

         <script src="assets/js/jquery-1.10.2.js"></script>
         <script src="assets/js/bootstrap.min.js"></script>
         <script src="vendors/datatables/datatables.min.js"></script>
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
         <script type="text/javascript">

        $(document).ready(function () {
 
            window.setTimeout(function() {
        $("#sams1").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
        });
            }, 5000);
 
        });
    </script>
         <script type="text/javascript">
             
             $(document).ready( function () {
                 $('#myTable').DataTable();
             } );
         </script>
    </body>
</html>
