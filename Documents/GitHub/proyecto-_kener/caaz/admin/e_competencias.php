<?php require_once('includes/session.php');
       require_once('includes/conn.php');
       require_once('id_check.php');  
       $sqlE3 =mysqli_query($mysqli,"SELECT * FROM periodos WHERE type='Evaluacion Medio Año' ORDER BY id DESC");              
       $eprow3=mysqli_fetch_array($sqlE3);
       $sql4 =mysqli_query($mysqli,"SELECT * FROM periodos WHERE type='Evaluacion Final' ORDER BY id DESC");              
       $eprow4=mysqli_fetch_array($sql4);
       
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Editar competencias</title>

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
                    <li>
                        <a href="dashboard.php">
                            <i class="fa fa-th"></i>
                           Inicio</a>
                    </li>
                    <?php
                    if($_SESSION['permission']==1 or $_SESSION['permission']==2  or $_SESSION['permission']==2.5 or $_SESSION['permission']==3
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
                    <li  class="active">
                    <a href="e_competencias.php">
                            <i class="fa fa-list"></i>
                         Editar Competencias </a>
                    </li>
                   
                              <?php
                    if($_SESSION['permission']==2or $_SESSION['permission']==3 or $_SESSION['permission']==2.5 or $_SESSION['permission']==4 ){
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
                    if($_SESSION['permission']==3 or $_SESSION['permission']==2.5 or $_SESSION['permission']==4){
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
        if($eprow3['activo']==1)  if($eprow3['type']=='Evaluacion Medio Año'){
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
      $tabla = "competencias";
 
      function Conectarse()
      {
         global $host, $puerto, $usuario, $contrasena, $baseDeDatos, $tabla;
 
         if (!($link = mysqli_connect($host.":".$puerto, $usuario, $contrasena))) 
         { 
            echo "Error conectando a la base de datos.<br>"; 
            exit(); 
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
        $queryUpdate = "UPDATE $tabla INNER JOIN  historico_comp ON $tabla.case_num = historico_comp.case_num 
                        SET $tabla.tipo = '".$_POST['tipo']."',$tabla.p1 = '".$_POST['p1']."',
                        $tabla.estado = '".$_POST['estado']."',  $tabla.comp1 = '".$_POST['comp1']."',
                        historico_comp.tipo = '".$_POST['tipo']."',historico_comp.p1 = '".$_POST['p1']."',
                        historico_comp.estado = '".$_POST['estado']."',historico_comp.comp1 = '".$_POST['comp1']."'
                        WHERE $tabla.id = ".$_POST['idForm'].";";




         $resultUpdate = mysqli_query($link, $queryUpdate); 
         if($resultUpdate)
         {
            ?>
            <div class="alert alert-warning sammac animated shake" id="sams1">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong> ¡Listo! </strong><?php echo"<strong>La acción se ejecutó correctamente.</strong>";?></div>
            <?php
           
         }
         else
         {
            echo "No se pudo actualizar el registro. <br>";
         }
      }
     
      ?>
<?php

      $sqlb = "SELECT competencias.employee_id,users.username,competencias.id, name,surname,username,
      comp1,p1,estado,users.evaluador1,users.evaluador2,tipo,c_evaluador
       FROM competencias INNER JOIN users ON competencias.employee_id=users.username";
      $resultado3 = mysqli_query($mysqli, $sqlb);

?>
<div class="panel panel-default sammacmedia">
            <div class="panel-heading">Objetivos de Reportes</div>
            <div class="panel-body">
 <table class="table table-striped thead-dark table-bordered table-hover" >
    <thead>
         <tr>
            <td>Colaboradores</td>
            <td>Competencia</td>
            <td>Comentario Jefe</td>
            <td>Puntuación</td>
            <td>Editar</td>
         <tr>
    </thead>
    </div>
    
      <?php
      
      if($eprow3['activo']==1) 
      if($eprow3['type']=='Evaluacion Medio Año')
        { 
      while($eprow2 = mysqli_fetch_array($resultado3))
      if( $_SESSION['username']== $eprow2['employee_id']) if($eprow2['estado']=='0') {
        echo "<tr>";
         echo "<td>";
         echo $eprow2["employee_id"];echo "<br>";
         echo $eprow2[ "name"];echo "  ";echo $eprow2[ "surname"];
         echo "<td>";
         echo  $eprow2['tipo'];
         echo "<td>";
         echo $eprow2["c_evaluador"];
         echo "<td>";
         echo $eprow2[ "p1"];echo "<br>";
         echo "<td>";
         echo "<button><b><a href=\"?id=".$eprow2["id"]."\">Editar</a></b></button>";
         echo "</td>";
         echo "</tr>";
      
      } 
    }
    ?>
 
 <?php

      if($_GET)
      {
         
         $querySelectByID = "SELECT id,comp1,p1,employee_id,tipo FROM $tabla WHERE id = ".$_GET['id'].";";
         $resultSelectByID = mysqli_query($link, $querySelectByID); 
         $rowSelectByID = mysqli_fetch_array($resultSelectByID);

         $querySelectByID2 = "SELECT * FROM users WHERE username = ".$rowSelectByID['employee_id'].";";
         $resultSelectByID2 = mysqli_query($link, $querySelectByID2); 
         $rowSelectByID2 = mysqli_fetch_array($resultSelectByID2);
      ?>
 
      <form action="e_competencias.php" method="post">
         <input type="hidden" value="<?=$rowSelectByID['id'];?>" name="idForm">
         <input type="hidden" value="1" name="estado">
         <div class="row form-group">
            <div class="col-lg-12">
             <input type="text" class="form-control"  value="<?php echo 'Métrica de Evaluación: 
 |    1  Insatisfactorio  
             |  2  Parcialmente Logrado 
             |  3  Logrado  
             |  4  Excedido  
             |  5  Sobresaliente'?>" readonly>
            </div> 
            <div class="col-lg-8">
            <br>
            <label>Competencia </label>
            <input type="text" class="form-control" name="tipo" value="<?php echo $rowSelectByID['tipo'];?>" readonly>
            </div>  
            <div class="col-lg-8">
            <textarea class="form-control" name="comp1" placeholder="Justifica aqui tu puntuación" required></textarea>
            </div>
            <div class="col-lg-2">
            <label>Puntuación:</label><br>
            <div >
                <select  class="form-control" name="p1" required>
                <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option>
                </select>
            </div>
            </div>
                <div class="col-lg-2">
                <div class="row form-group">
                  <button type="submit" value="Guardar" name="submit" class="btn btn-warning">Aceptar</button>  
                </div>
                </div>
         
      </form> 
      <?php
      }
      mysqli_close($link);
      ?>
      </table>
      <hr>
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
      $tabla = "competencias";
 
      function Conectarse()
      {
         global $host, $puerto, $usuario, $contrasena, $baseDeDatos, $tabla;
 
         if (!($link = mysqli_connect($host.":".$puerto, $usuario, $contrasena))) 
         { 
            echo "Error conectando a la base de datos.<br>"; 
            exit(); 
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
        $queryUpdate = "UPDATE $tabla INNER JOIN  historico_comp ON $tabla.case_num = historico_comp.case_num 
                        SET $tabla.tipo = '".$_POST['tipo']."',$tabla.p1 = '".$_POST['p1']."',
                        $tabla.estado = '".$_POST['estado']."',  $tabla.comp1 = '".$_POST['comp1']."',
                        historico_comp.tipo = '".$_POST['tipo']."',historico_comp.p1 = '".$_POST['p1']."',
                        historico_comp.estado = '".$_POST['estado']."',historico_comp.comp1 = '".$_POST['comp1']."'
                        WHERE $tabla.id = ".$_POST['idForm'].";";




         $resultUpdate = mysqli_query($link, $queryUpdate); 
         if($resultUpdate)
         {
            ?>
            <div class="alert alert-warning sammac animated shake" id="sams1">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong> ¡Listo! </strong><?php echo"<strong>La acción se ejecutó correctamente.</strong>";?></div>
            <?php
           
         }
         else
         {
            echo "No se pudo actualizar el registro. <br>";
         }
      }
     
      ?>
<?php

      $sqlb = "SELECT competencias.employee_id,users.username,competencias.id, name,surname,username,
      comp1,p1,estado,users.evaluador1,users.evaluador2,tipo,c_evaluador,c_coment
       FROM competencias INNER JOIN users ON competencias.employee_id=users.username";
      $resultado3 = mysqli_query($mysqli, $sqlb);

?>
<div class="panel panel-default sammacmedia">
            <div class="panel-heading">Objetivos de Reportes</div>
            <div class="panel-body">
 <table class="table table-striped thead-dark table-bordered table-hover" >
    <thead>
         <tr>
            <td>Colaboradores</td>
            <td>competencia</td>
            <td>Comentario Jefe</td>
            <td>Comentario 1+1</td>
            <td>puntuacion</td>
            <td>Validar</td>
         <tr>
    </thead>
    </div>
    
      <?php
      
      if($eprow4['activo']==1) 
      if($eprow4['type']=='Evaluacion Final')
        { 
      while($eprow2 = mysqli_fetch_array($resultado3))
      if( $_SESSION['username']== $eprow2['employee_id']) if($eprow2['estado']=='0') {
        echo "<tr>";
         echo "<td>";
         echo $eprow2["employee_id"];echo "<br>";
         echo $eprow2[ "name"];echo "  ";echo $eprow2[ "surname"];
         echo "<td>";
         echo  $eprow2['tipo'];
         echo "<td>";
         echo $eprow2["c_evaluador"];
         echo "<td>";
         echo $eprow2["c_coment"];
         echo "<td>";
         echo $eprow2[ "p1"];echo "<br>";
         echo "<td>";
         echo "<button><b><a href=\"?id=".$eprow2["id"]."\">Validar</a></b></button>";
         echo "</td>";
         echo "</tr>";
      
      } 
    }
    ?>
 
 <?php

      if($_GET)
      {
         
         $querySelectByID = "SELECT id,comp1,p1,employee_id,tipo FROM $tabla WHERE id = ".$_GET['id'].";";
         $resultSelectByID = mysqli_query($link, $querySelectByID); 
         $rowSelectByID = mysqli_fetch_array($resultSelectByID);

         $querySelectByID2 = "SELECT * FROM users WHERE username = ".$rowSelectByID['employee_id'].";";
         $resultSelectByID2 = mysqli_query($link, $querySelectByID2); 
         $rowSelectByID2 = mysqli_fetch_array($resultSelectByID2);
         if($_SESSION['permission']==1){       
            $estado=(3);}
            if($_SESSION['permission']==2  or $_SESSION['permission']==3){       
                $estado=(4);}
      ?>
 
      <form action="e_competencias.php" method="post">
         <input type="hidden" value="<?=$rowSelectByID['id'];?>" name="idForm">
         <input type="hidden" value="<?=$estado?>" name="estado">
         <div class="row form-group">
            <div class="col-lg-12">
             <input type="text" class="form-control"  value="<?php echo 'Métrica de Evaluación: 
 |    1  Insatisfactorio  
             |  2  Parcialmente Logrado 
             |  3  Logrado  
             |  4  Excedido  
             |  5  Sobresaliente'?>" readonly>
            </div> 
            <div class="col-lg-8">
            <br>
            <label>Competencia </label>
            <input type="text" class="form-control" name="tipo" value="<?php echo $rowSelectByID['tipo'];?>" readonly>
            </div>  
            <div class="col-lg-8">
            <textarea class="form-control" name="comp1" placeholder="Justifica aqui tu puntuación" required></textarea>
            </div>
            <div class="col-lg-2">
            <label>Puntuacion:</label><br>
            <div >
                <select  class="form-control" name="p1" required>
                <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option>
                </select>
            </div>
            </div>
                <div class="col-lg-2">
                <div class="row form-group">
                  <button type="submit" value="Guardar" name="submit" class="btn btn-warning">Aceptar</button>  
                </div>
                </div>
         
      </form> 
      <?php
      }
      mysqli_close($link);
      ?>
      </table>
      <hr>
</div>
<?php }?>
                <footer>
            <p class="text-center">
            HGZ hailglez@gmail.com &copy;<?php echo date("Y ");?>Copyright. All Rights Reserved.           </p>
            </footer>
            </div>

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