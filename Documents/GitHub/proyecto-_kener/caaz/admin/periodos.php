<?php require_once('includes/session.php');
      require_once('includes/conn.php');
$sqlE =mysqli_query($mysqli,"SELECT * FROM users WHERE username='{$_SESSION['username']}'");
$eprow=mysqli_fetch_array($sqlE);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" /><link rel="stylesheet" href="assets/css/stylebtn.css">
        <title>Periodos</title>
                <!-- calendario CSS -->
                <link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" id="cal"/>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/awesome/font-awesome.css">
        <link rel="stylesheet" href="assets/css/animate.css">
         <!-- calendario JS -->
        <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
        <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
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
                    <li  class="active">
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
           
                <?php
                             
                             if(isset($mysqli,$_POST['submit'])){
                                         $fechai = mysqli_real_escape_string($mysqli,$_POST['fechai']);
                                         $fechaf = mysqli_real_escape_string($mysqli,$_POST['fechaf']);
                                         $type = mysqli_real_escape_string($mysqli,$_POST['type']);
                                         $activo = (isset($_POST['activo'])) ? '1' : '0';
                                 
                                 $sqlTaru = "INSERT INTO periodos(fechai,fechaf,type,activo)VALUES('$fechai','$fechaf','$type','$activo')";
                                 $resTaru = mysqli_query($mysqli,$sqlTaru);
                                 if($resTaru==1){
                                     ?> 
                                     <div class="alert alert-warning sammac animated shake" id="sams1">
                                       <a href="#" class="close" data-dismiss="alert">&times;</a>
                                     <strong> Listo </strong><?php echo'Has creado el periodo con exito';?></div>
                                     <?php
                                 }else{
                                 ?>
                             <div class="alert alert-warning samuel animated shake" id="sams1">
                                       <a href="#" class="close" data-dismiss="alert">&times;</a>
                                     <strong> Error </strong><?php echo'OOPS algo salió mal';?></div>
                                     <?php
                                }
                                }
                                ?>
                                <?php
                                
                if(isset($mysqli,$_POST['update'])){
                    $fechai = mysqli_real_escape_string($mysqli,$_POST['fechai']);
                    $fechaf = mysqli_real_escape_string($mysqli,$_POST['fechaf']);
                    $type = mysqli_real_escape_string($mysqli,$_POST['type']);
                    $activo =  (isset($_POST['activo'])) ? '1' : '0';
                    $id=mysqli_real_escape_string($mysqli,$_POST['id']);
                    
                    $sqlTaru = "UPDATE periodos SET fechai ='$fechai', fechaf ='$fechaf', type ='type', activo ='$activo' ";
                    $resTaru = mysqli_query($mysqli,$sqlTaru);
                    if($resTaru==1){
                        ?>
                        <div class="alert alert-warning sammac animated shake" id="sams1">
                          <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> ¡Exito! </strong><?php echo'Has actualizado tu perfil con éxito';?></div>
                        <?php
                    }else{
                    ?>
                <div class="alert alert-warning samuel animated shake" id="sams1">
                          <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> ¡Error!</strong><?php echo'algo salió mal';?></div>
                <?php
                    }
                }
                ?>           
                 <div class="panel panel-default sammacmedia">
                         <div class="panel-heading"><h4>Alta de Periodos</h4></div>
                     <div class="panel-body">
                         <form method="post" action="periodos.php" >
                     <div class="row form-group">
                         <div class="row">
                        <h3>Periodo</h3>
                        <div class="col-lg-3" >
                        <h4><label>Tipo de Periodo</label></h4>
                        <h5><select class="form"  name="type"  required>
                        <option>Establecimiento de Objetivos</option>
                        <option>Evaluacion Medio Año</option> 
                        <option>Evaluacion Final</option> 
                        </select></h5>
                        </div>
                        
                        <div  class="col-lg-2">
                        <h4><label>Activa el Periodo</label></h4>
                            <input type="checkbox" name="activo" value="1" id="pure-toggle-4" hidden />
                            <label class="pure-toggle brick" for="pure-toggle-4"></label>
                        </div>
                        
                        <div class="col-lg-2">
                            <h4><label>Fecha de Inicio</label></h4>
                                <input type="date"  autocomplete="off" name="fechai"  required>
                        </div>
                        <div class="col-lg-2">
                            <h4><label>Fecha de Cierre</label></h4>
                                <input type="date" autocomplete="off" name="fechaf" required>
                        </div>
                             <div class="col-md-2">
                             <label></label><br>
                               <button type="submit" name="submit" class="btn btn-warning"><span class="fa fa-plus"></span> Añadir</button>  
                             </div>
                         </form>
                         </div>
                        </div>
                 </div>
                 </div>
              
                 
                 

		<div class="panel panel-default sammacmedia">
            <div class="panel-heading"><h4>Todos los periodos</h4></div>
        <div class="panel-body">
                        <table class="table table-striped thead-dark table-bordered table-hover" id="myTable">
                <thead>
                <tr>
                   
        
                  <th> Id</th>
                    <th> Fecha de Incio </th>
                    <th> Fecha de finaliazión</th>
                    <th> Tipo de periodo</th>
                    <th> Estado</th>
                    <th> Acción </th>
                    </tr>
                </thead>
                    <?php
                                   $a=1;
                    $query=mysqli_query($mysqli,"select *from `periodos` ");
                     while($row=mysqli_fetch_array($query))
                        {
                          
                          ?>
                          <tr>
                              <td><?php echo $a;?></td> 
                            <td><?php echo $row['fechai'];?></td>
                            <td><?php echo $row['fechaf'];?></td>
                            <td><?php echo $row['type'];?></td>  
                            <td>
                                <?php
                                if($row['activo']=="1"){
                                echo "<p  class='btn btn-success'> Activo</p>";   
                                }elseif($row['activo']=="0"){
                                echo "<p  class='btn btn-warning'>Inactivo</p>";
                                }
                                ?>  
                               
                            </td> 
                            <td>
                            <a href="editar.php?id=<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-warning"><span class="fa fa-pencil"></span> Editar</a> | |
                  <a href="periodos.php?edited=1&idx=<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger"><span class="fa fa-times"></span> Eliminar</a>
                            </td>
                          </tr>
                          <?php
                            $a++;
                      }


                      if (isset($_GET['idx']) && is_numeric($_GET['idx']))
                      {
                          $id = $_GET['idx'];
                          if ($stmt = $mysqli->prepare("DELETE FROM periodos WHERE id = ? LIMIT 1"))
                          {
                              $stmt->bind_param("i",$id);
                              $stmt->execute();
                              $stmt->close();
                               ?>
                    <div class="alert alert-success strover" id="sams1">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong> ¡Exito! </strong><?php echo'Periodo eliminado correctamente, actualice esta página';?></div>
               
                    <?php
                          }
                          else
                          {
                    ?>
                    <div class="alert alert-danger samuel" id="sams1">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong> Danger! </strong><?php echo'OOPS, inténtalo de nuevo, algo salió mal';?></div>
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
            HGZ hailglez@gmail.com &copy;<?php echo date("Y ");?>Copyright. All Rights Reserved.
        
            </p>
            </footer>
            </div>
            
        </div>
                      
                 <script  src="assets/js/script_calendar.js"></script>
             
                     <!-- jQuery CDN -->
                      <script src="assets/js/jquery-1.10.2.js"></script>
                      <!-- Bootstrap Js CDN -->
                      <script src="assets/js/bootstrap.min.js"></script>
                                <script type="text/javascript">
                        if (window.history.replaceState) { // verificamos disponibilidad
                        window.history.replaceState(null, null, window.location.href);
                        }
                    </script>
             
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

                 </body>
             </html>
             