<?php require_once('includes/session.php');
      require_once('includes/conn.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Ver Objetivos</title>

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
                    <h3>FÓRMULA KENER</h3>
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
                            Establecer de Objetivos </a>
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
                     <li  class="active">
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
                $sqlb = "SELECT users.name, cases.employee_id, cases.id case_num, surname,  notes, severity, calificaciona, justificacion,
                calificacionm, justificacionm,justificacionf,calificacionf FROM users INNER JOIN cases ON users.username=cases.employee_id ";
                $resultado = mysqli_query($mysqli, $sqlb);
                ?>
             

                <div class="panel panel-default sammacmedia">
                 <div class="panel-heading"> Todos los Objetivos </div>
                 <div class="panel-body">
                 <table class="table table-striped thead-dark table-bordered table-hover" id="myTable">
                <thead>
                <tr>
                    <th>No</th>
                     <th> Id </th>
                    <th> Colaborador</th>
                    <th> Objetivo </th>
                    <th> AutoEvaluacion </th>
                    <th> Comentarios </th>
                    <th> Evaluacion Medio Año </th>
                    <th> Comentarios </th>
                    <th> Evaluacion Final </th>
                    <th> Comentarios </th>
                    <th> Estatus </th>
                    <th> Acción </th>
                    </tr>
                </thead>
                <?php $n=0; while($row = mysqli_fetch_array($resultado)){ $n++;?>
                          <tr>
                    
                            <td ><?php echo $n; ?></td>
                     
                            <td ><?php echo $row["case_num"]; ?></td>
                            <td ><?php echo $row["name"]; 
                            echo'<br>'; echo $row["surname"];echo'<br>'; echo $row["employee_id"]; ?> || <a href="#samstrover<?php echo $row['employee_id']; ?>" data-toggle="modal" class="btn btn-warning"><span class="fa fa-pencil"></span> Ver</a> </td>
                            <td ><?php echo $row["notes"]; ?></td>
                            <td ><?php echo $row["calificaciona"]; ?></td>
                            <td ><?php echo $row["justificacion"]; ?></td>
                            <td ><?php echo $row["calificacionm"]; ?></td>
                            <td ><?php echo $row["justificacionm"]; ?></td>
                            <td ><?php echo $row["calificacionf"]; ?></td>
                            <td ><?php echo $row["justificacionf"]; ?></td>
                          <td>
                                <?php
                            if($row['severity']=="1 Evaluacion"){
                            echo "<p  class='btn btn-success'> en evaluacion</p>";   
                            }elseif($row['severity']=="En Proceso"){
                            echo "<p  class='btn btn-warning'>En Proceso</p>";
                            } else{
                            echo "<p  class='btn  btn-danger'En Proceso</p>";
                            }     
                            ?>  
                              </td>
                            <td>
                  <a href="objetivos.php?edited=1&idx=<?php echo $row['case_num']; ?>" data-toggle="modal" class="btn btn-danger"><span class="fa fa-times"></span> Eliminar</a>  
                              </td>
                          </tr>
                          <?php
                         require('userInfos.php');
                          }
                      if (isset($_GET['idx']) && is_numeric($_GET['idx']))
                      {
                          $id = $_GET['idx'];
                          if ($stmt = $mysqli->prepare("DELETE FROM cases WHERE id = ? LIMIT 1"))
                          {
                              $stmt->bind_param("i",$id);
                              $stmt->execute();
                              $stmt->close();
                               ?>
                               <script type="text/javascript">
                                alert("Elemento eliminado correctamente");
                                window.location.href="objetivos.php";
                                </script>'; 
                    <?php
                          }
                          else {
                    ?>
                    <div class="alert alert-danger samuel" id="sams1">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong> Danger! </strong><?php echo'OOPS, inténtalo de nuevo, algo salió mal';?></div>
                    <?php
                          }
                          $mysqli->close();
                      }
                      ?>
                </table>
            </div>
            
            
                </div>
                <div class="line"></div>
                <footer>
            <p class="text-center">
            Hail Alejandro Gonzalez &copy;<?php echo date("Y ");?>Copyright. All Rights Reserved. 
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
