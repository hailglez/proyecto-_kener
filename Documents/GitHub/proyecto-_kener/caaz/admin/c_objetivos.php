<?php require_once('includes/session.php');
       require_once('includes/conn.php');
       require_once('id_check.php');    
       $sqlE3 =mysqli_query($mysqli,"SELECT * FROM periodos WHERE type='Establecimiento de Objetivos' ORDER BY id DESC");              
       $eprow3=mysqli_fetch_array($sqlE3);
       $sql4 =mysqli_query($mysqli,"SELECT * FROM periodos WHERE type='Evaluacion Final' ORDER BY id DESC ");              
       $eprow4=mysqli_fetch_array($sql4);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>editar objetivos</title>

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
                    <li class="active">
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

         <?php   
        if($eprow3['activo']==1)  if($eprow3['type']=='Establecimiento de Objetivos'){
        ?>   
      <?php
      // Dirección o IP del servidor MySQL
      $host = "localhost";
      // Puerto del servidor MySQL
      $puerto = "3306";
      // Nombre de usuario del servidor MySQL
      $usuario = "root";
      // Contraseña del usuario
      $contrasena = "Soporte01";
      // Nombre de la base de datos
      $baseDeDatos ="caaz";
      // Nombre de la tabla a trabajar
      $tabla = "cases";
 
      function Conectarse()
      {
         global $host, $puerto, $usuario, $contrasena, $baseDeDatos, $tabla;
 
         if (!($link = mysqli_connect($host.":".$puerto, $usuario, $contrasena))) 
         { 
            echo "Error conectando a la base de datos.<br>"; 
            exit(); 
            }
         else
         {
            echo "<br>";
         }
         if (!mysqli_select_db($link, $baseDeDatos)) 
         { 
            echo "Error seleccionando la base de datos.<br>"; 
            exit(); 
         } 
      return $link; 
      } 
      $link = Conectarse();
      if($_POST)
      {
         $queryUpdate = "UPDATE $tabla SET 
                        notes = '".$_POST['notes']."', estado = '".$_POST['estado']."',
                        severity = '".$_POST['severity']."', justificacion = '".$_POST['justificacion']."',
                        medida1 = '".$_POST['medida1']."', medida2 = '".$_POST['medida2']."',
                        medida3 = '".$_POST['medida3']."', medida4 = '".$_POST['medida4']."',
                        medida5 = '".$_POST['medida5']."', porcentaje = '".$_POST['porcentaje']."'
                        WHERE id = ".$_POST['idForm'].";";
 
         $resultUpdate = mysqli_query($link, $queryUpdate); 
 
         if($resultUpdate)
         {
            ?>
            <div class="alert alert-warning sammac animated shake"  id="sams1">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong> ¡Listo! </strong><?php echo"<strong>La acción se ejecutó correctamente.";?></div>
            <?php
           
         }
         else
         {
            echo "No se pudo actualizar el registro. <br>";
         }
      }
      $query = "SELECT id, notes, case_num, employee_id, severity,estado FROM $tabla;";
      $result = mysqli_query($link, $query); 
      
      ?>
      <div class="panel panel-default sammacmedia">
            <div class="panel-heading">Todos los objetivos *</div>
            <div class="panel-body">
 <table class="table table-striped thead-dark table-bordered table-hover" >
    <thead>
         <tr>
            <td>Objetivo</td>
            <td>Estatus</td>
            <td>Editar</td>
         <tr>
    </thead>
    </div>
      <?php
 
      while($row = mysqli_fetch_array($result))
    
      if($row['employee_id']== $_SESSION['username']) if($row['estado']=='0'){
          
      
        echo "<tr>";
         echo "<td>";
         echo $row["notes"];
         echo "<td>";
         echo $row["severity"];
         echo "<td>";
         echo "<button class='btn btn-warning'><a href=\"?id=".$row["id"]."\">Editar</a></button>";
         echo "</td>";
         echo "</tr>";
         
      } 
 
      mysqli_free_result($result); 
 
      ?>
 
      </table>
      <hr>
 
      <?php
      if($_GET)
      {
         $querySelectByID = "SELECT id, notes, employee_id, severity, justificacionm, porcentaje,
         medida1, medida2, medida3, medida4, medida5 FROM $tabla WHERE id = ".$_GET['id'].";";
 
         $resultSelectByID = mysqli_query($link, $querySelectByID); 
 
         $rowSelectByID = mysqli_fetch_array($resultSelectByID);
      ?>
 
      <form action="c_objetivos.php" method="post">
         <input type="hidden" value="<?=$rowSelectByID['id'];?>" name="idForm">
         <input type="hidden" value="1" name="estado">
         <div class="col-lg-4">
            <label>Objetivo:</label>
              <input type="text" class="form-control" name="notes" value="<?php echo $rowSelectByID['notes'];?>">
            </div>
            <div class="col-lg-2">
            <label>Porcentaje</label>
              <input type="text" class="form-control" name="porcentaje" value="<?php echo $rowSelectByID['porcentaje'];?>"readonly>
            </div>
          <div class="col-lg-4">
            <label>Comentario del Jefe:</label>
              <input type="text" class="form-control" name="justificacionm" value="<?php echo $rowSelectByID['justificacionm'];?>" readonly>
            </div>
          <div class="col-lg-2">
            <label>Estatus:</label>
              <input type="text" class="form-control" name="severity" value="<?php echo $rowSelectByID['severity'];?>" readonly>
            </div>
            <div class="col-lg-2">
            <br>
            <label>Métrica 1</label>
            <input type="text" class="form-control" name="medida1"  value="<?php echo $rowSelectByID['medida1'];?>" required>
            </div>
            <div class="col-lg-2">
            <br>
            <label>Métrica  2</label>
            <input type="text" class="form-control" name="medida2"  value="<?php echo $rowSelectByID['medida2'];?>" required>
            </div>
            <div class="col-lg-2">
            <br>
            <label>Métrica  3</label>
            <input type="text" class="form-control" name="medida3" value="<?php echo $rowSelectByID['medida3'];?>" required>
            </div>
            <div class="col-lg-2">
            <br>
            <label>Métrica 4</label>
            <input type="text" class="form-control" name="medida4" value="<?php echo $rowSelectByID['medida4'];?>" required>
            </div>
            <div class="col-lg-2">
            <br>
            <label>Métrica 5</label>
            <input type="text" class="form-control" name="medida5"  value="<?php echo $rowSelectByID['medida5'];?>" required>
            </div>
            <div class="col-lg-12">
            <br>
            <label>Justificación:</label>
            <textarea class="form-control"name="justificacion" placeholder="Describe aquí tu justificación" required></textarea>
            </div>
                <div class="col-lg-2">
                <br>
                <label></label>
                  <button type="submit" value="Guardar" name="submit" class="btn btn-warning">Aceptar</button>  
                </div>
                </div>
         
      </form> 
      <?php
      }
      mysqli_close($link);
      ?>

</div>
</div>


<?php }?>
<?php 
if($eprow4['activo']==1) 
if($eprow4['type']=='Evaluacion Final'){
?>
      <?php
      // Dirección o IP del servidor MySQL
      $host = "localhost";
      // Puerto del servidor MySQL
      $puerto = "3306";
      // Nombre de usuario del servidor MySQL
      $usuario = "root";
      // Contraseña del usuario
      $contrasena = "Soporte01";
      // Nombre de la base de datos
      $baseDeDatos ="caaz";
      // Nombre de la tabla a trabajar
      $tabla = "cases";
 
      function Conectarse()
      {
         global $host, $puerto, $usuario, $contrasena, $baseDeDatos, $tabla;
 
         if (!($link = mysqli_connect($host.":".$puerto, $usuario, $contrasena))) 
         { 
            echo "Error conectando a la base de datos.<br>"; 
            exit(); 
            }
         else
         {
            echo "<br>";
         }
         if (!mysqli_select_db($link, $baseDeDatos)) 
         { 
            echo "Error seleccionando la base de datos.<br>"; 
            exit(); 
         } 
      return $link; 
      } 
      $link = Conectarse();
      if($_POST)
      {
         $queryUpdate = "UPDATE $tabla SET 
                        notes = '".$_POST['notes']."', estado = '".$_POST['estado']."',
                        severity = '".$_POST['severity']."', justificacion = '".$_POST['justificacion']."',
                        medida1 = '".$_POST['medida1']."', medida2 = '".$_POST['medida2']."',
                        medida3 = '".$_POST['medida3']."', medida4 = '".$_POST['medida4']."',
                        medida5 = '".$_POST['medida5']."', porcentaje = '".$_POST['porcentaje']."'
                        WHERE id = ".$_POST['idForm'].";";
 
         $resultUpdate = mysqli_query($link, $queryUpdate); 
 
         if($resultUpdate)
         {
            ?>
            <div class="alert alert-warning sammac animated shake"  id="sams2">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong> Listo </strong><?php echo"<strong>La acción se ejecutó correctamente.</strong>.";?></div>
            <?php
           
         }
         else
         {
            echo "No se pudo actualizar el registro. <br>";
         }
      }
      $query = "SELECT id, notes, case_num, employee_id, severity,estado FROM $tabla;";
      $result = mysqli_query($link, $query); 
      
      ?>
      <div class="panel panel-default sammacmedia">
            <div class="panel-heading">Todos los objetivos | Editar Objetivos</div>
            <div class="panel-body">
 <table class="table table-striped thead-dark table-bordered table-hover" >
    <thead>
         <tr>
            <td>Objetivo</td>
            <td>Estatus</td>
            <td>Editar</td>
         <tr>
    </thead>
    </div>
      <?php
 
      while($row = mysqli_fetch_array($result))
    
      if($row['employee_id']== $_SESSION['username']) if($row['estado']=='5'){
          
      
        echo "<tr>";
         echo "<td>";
         echo $row["notes"];
         echo "<td>";
         echo $row["severity"];
         echo "<td>";
         echo "<button class='btn btn-warning'><a href=\"?id=".$row["id"]."\">Editar</a></button>";
         echo "</td>";
         echo "</tr>";
         
      } 
 
      mysqli_free_result($result); 
 
      ?>
 
      </table>
      <hr>
 
      <?php
      if($_GET)
      {
         $querySelectByID = "SELECT id, notes, employee_id, severity, justificacionm, porcentaje,
         medida1, medida2, medida3, medida4, medida5 FROM $tabla WHERE id = ".$_GET['id'].";";
 
         $resultSelectByID = mysqli_query($link, $querySelectByID); 
 
         $rowSelectByID = mysqli_fetch_array($resultSelectByID);
      ?>
 
      <form action="c_objetivos.php" method="post">
         <input type="hidden" value="<?=$rowSelectByID['id'];?>" name="idForm">
         <input type="hidden" value="6" name="estado">
         <div class="col-lg-4">
            <label>Objetivo:</label>
              <input type="text" class="form-control" name="notes" value="<?php echo $rowSelectByID['notes'];?>">
            </div>
            <div class="col-lg-2">
            <label>Porcentaje</label>
              <input type="text" class="form-control" name="porcentaje" value="<?php echo $rowSelectByID['porcentaje'];?>"readonly>
            </div>
          <div class="col-lg-4">
            <label>Comentario del Jefe:</label>
              <input type="text" class="form-control" name="justificacionm" value="<?php echo $rowSelectByID['justificacionm'];?>" readonly>
            </div>
          <div class="col-lg-2">
            <label>Estatus:</label>
              <input type="text" class="form-control" name="severity" value="<?php echo $rowSelectByID['severity'];?>" readonly>
            </div>
            <div class="col-lg-2">
            <br>
            <label>Métrica 1</label>
            <input type="text" class="form-control" name="medida1"  value="<?php echo $rowSelectByID['medida1'];?>" required>
            </div>
            <div class="col-lg-2">
            <br>
            <label>Métrica  2</label>
            <input type="text" class="form-control" name="medida2"  value="<?php echo $rowSelectByID['medida2'];?>" required>
            </div>
            <div class="col-lg-2">
            <br>
            <label>Métrica  3</label>
            <input type="text" class="form-control" name="medida3" value="<?php echo $rowSelectByID['medida3'];?>" required>
            </div>
            <div class="col-lg-2">
            <br>
            <label>Métrica 4</label>
            <input type="text" class="form-control" name="medida4" value="<?php echo $rowSelectByID['medida4'];?>" required>
            </div>
            <div class="col-lg-2">
            <br>
            <label>Métrica 5</label>
            <input type="text" class="form-control" name="medida5"  value="<?php echo $rowSelectByID['medida5'];?>" required>
            </div>
            <div class="col-lg-12">
            <br>
            <label>Justificación:</label>
            <textarea class="form-control"name="justificacion" placeholder="Describe aqui tu justificación" required></textarea>
            </div>
                <div class="col-lg-2">
                <br>
                <label></label>
                  <button type="submit" value="Guardar" name="submit" class="btn btn-warning">Aceptar</button>  
                </div>
                </div>
         
      </form> 
      <?php
      }
      mysqli_close($link);
      ?>
<?php }?>
                <footer>
            <p class="text-center">
            HGZ hailglez@gmail.com &copy;<?php echo date("Y ");?>Copyright. All Rights Reserved.           </p>
            </footer>
            </div>
            
        </div>  
        </div>
  <!-- jQuery CDN -->
  <script src="assets/js/jquery-1.10.2.js"></script>
         <!-- Bootstrap Js CDN -->
         <script type="text/javascript">
          if (window.history.replaceState) { // verificamos disponibilidad
          window.history.replaceState(null, null, window.location.href);
          }
        </script>
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

$(document).ready(function () {

    window.setTimeout(function() {
$("#sams2").fadeTo(1000, 0).slideUp(1000, function(){
$(this).remove(); 
});
    }, 5000);

});
</script>
      </body> 
      </html>