<?php require_once('includes/session.php');
       require_once('includes/conn.php');
       require_once('id_check.php');  
       $sqlE3 =mysqli_query($mysqli,"SELECT * FROM periodos WHERE type='Establecimiento de Objetivos' ORDER BY id DESC");              
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

        <title>Validacion 1+1</title>

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
                    if($_SESSION['permission']==1 or $_SESSION['permission']==2 or $_SESSION['permission']==2.5 or $_SESSION['permission']==3
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
                                Autoevaluaci??n</a>
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
                    if($_SESSION['permission']==2 or $_SESSION['permission']==2.5 or $_SESSION['permission']==3 or $_SESSION['permission']==4 ){
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
                    if($_SESSION['permission']==3or $_SESSION['permission']==2.5 or $_SESSION['permission']==4){
                    ?>
                     <li class="active">
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
                            A??adir Usuarios</a>
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
                                <span>Men??</span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <button class="nav navbar-nav navbar-right  makotasamuel">
                                <li><a href="#"><?php require_once('includes/name.php');?></a></li>
                                <li ><a href="logout.php"><i class="fa fa-power-off"> Cerrar sesi??n</i></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <?php   
        if($eprow3['activo']==1)  if($eprow3['type']=='Establecimiento de Objetivos')
        if($_SESSION['permission']==1  or $_SESSION['permission']==2){
        ?>   
      <?php
      // Direcci??n o IP del servidor MySQL
      $host = "localhost";
      // Puerto del servidor MySQL
      $puerto = "3306";
      // Nombre de usuario del servidor MySQL
      $usuario = "root";
      // Contrase??a del usuario
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
         $queryUpdate = "UPDATE $tabla SET notes = '".$_POST['notes']."',
                        estado = '".$_POST['estado']."', severity = '".$_POST['severity']."',
                        justificacionm = '".$_POST['justificacionm']."'
                        WHERE id = ".$_POST['idForm'].";";
         $resultUpdate = mysqli_query($link, $queryUpdate); 
         if($resultUpdate)
         {
            ?>
            <div class="alert alert-warning sammac animated shake" id="sams1">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong> ??Listo! </strong><?php echo"<strong>La evaluaci??n se envi?? correctamente.</strong>";?></div>
            <?php
           
         }
         else
         {
            echo "No se pudo actualizar el registro. <br>";
         }
      }
     
      ?>
<?php

      $sqlb = "SELECT users.name, cases.employee_id, cases.id id,case_num, surname,puesto,notes,severity, calificaciona, justificacion,
      porcentaje,medida1,medida2,medida3,medida4,medida5,eva1,eva2,estado,justificacionm 
      FROM users INNER JOIN $tabla ON users.username=cases.employee_id ";
      $resultado3 = mysqli_query($mysqli, $sqlb);

?>
<div class="panel panel-default sammacmedia">
            <div class="panel-heading">Objetivos de Reportes Establecimiento</div>
            <div class="panel-body">
 <table class="table table-striped thead-dark table-bordered table-hover" >
    <thead>
         <tr>
            <td>Colaboradores</td>
            <td>Objetivo</td>
            <td>%</td>
            <td>M??trica</td>
            <td>Comentario del jefe</td>
            <td>Validar</td>
         <tr>
    </thead>
    </div>
      <?php
      
      while($eprow2 = mysqli_fetch_array($resultado3))
      if( $_SESSION['username']== $eprow2['eva1'] or $eprow2['eva2']) if($eprow2['estado']=='2') {
    
        echo "<tr>";
         echo "<td>";
         echo $eprow2["employee_id"];echo "<br>";
         echo $eprow2[ "name"];echo "  ";echo $eprow2[ "surname"];echo "<br>";echo $eprow2["puesto"];
         echo "<td>";
         echo $eprow2["notes"];
         echo "<td>";
         echo $eprow2["porcentaje"];
         echo "<td>";
         echo "1.- ";
         echo $eprow2[ "medida1"];echo "<br>";
         echo "2.- ";
         echo $eprow2["medida2"];echo "<br>"; 
         echo "3.- ";
         echo $eprow2["medida3"];echo "<br>";
         echo "4.- ";
         echo $eprow2["medida4"];echo "<br>";
         echo "5.- ";
         echo $eprow2["medida5"];
         echo "<td>";
         echo $eprow2["justificacionm"];
         echo "<td>";
         echo "<button><b><a href=\"?id=".$eprow2["id"]."\">Validar</a></b></button>";
         echo "</td>";
         echo "</tr>";
      } 
    ?>
 <?php
      if($_GET) 
      if($eprow3['activo']==1) 
      if($eprow3['type']=='Establecimiento de Objetivos')
      {
         $querySelectByID = "SELECT id, case_num, notes, employee_id, severity FROM $tabla WHERE id = ".$_GET['id'].";";
         $resultSelectByID = mysqli_query($link, $querySelectByID); 
         $rowSelectByID = mysqli_fetch_array($resultSelectByID);

         $querySelectByID2 = "SELECT * FROM users WHERE username = ".$rowSelectByID['employee_id'].";";
         $resultSelectByID2 = mysqli_query($link, $querySelectByID2); 
         $rowSelectByID2 = mysqli_fetch_array($resultSelectByID2);
      ?>
 
      <form action="validacion1+1.php" method="post">
         <input type="hidden" value="<?=$rowSelectByID['id'];?>" name="idForm">
         <input type="hidden" value="En Proceso" name="severity">
         <div class="row form-group">
         <div class="col-lg-2">
            <label>Colaborador</label>
              <input type="text" class="form-control"  value="<?php echo $rowSelectByID2['name'];?>" readonly>
            </div>
          <div class="col-lg-2">
            <label>Objetivo</label>
              <input type="text" class="form-control" name="notes" value="<?php echo $rowSelectByID['notes'];?>" readonly>
            </div>
            <div class="col-lg-2">
            <label>Enviar objetivo a:</label><br>
                <label><input type="radio" name="estado" value="4">Evaluaci??n</label><br>
                <label><input type="radio" name="estado" value="0">Revisi??n</label><br>
            </div>
            <div class="col-lg-4">
            <label>Justificaci??n</label>
            <textarea class="form-control"name="justificacionm" placeholder=" Describe tu justificaci??n" required></textarea>
            </div>
                <div class="col-lg-2">
                <label>Enviar</label>
                <div class="row form-group">
                <div class="col-lg-3">
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
        if($eprow3['activo']==1)  if($eprow3['type']=='Establecimiento de Objetivos')
        if($_SESSION['permission']==3 or $_SESSION['permission']==2.5){
        ?>   
      <?php
      // Direcci??n o IP del servidor MySQL
      $host = "localhost";
      // Puerto del servidor MySQL
      $puerto = "3306";
      // Nombre de usuario del servidor MySQL
      $usuario = "root";
      // Contrase??a del usuario
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
         $queryUpdate = "UPDATE $tabla SET notes = '".$_POST['notes']."',
                        estado = '".$_POST['estado']."', severity = '".$_POST['severity']."',
                        justificacionm = '".$_POST['justificacionm']."'
                        WHERE id = ".$_POST['idForm'].";";
         $resultUpdate = mysqli_query($link, $queryUpdate); 
         if($resultUpdate)
         {
            ?>
            <div class="alert alert-warning sammac animated shake" id="sams1">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong> ??Listo! </strong><?php echo"<strong>La evaluaci??n se envi?? correctamente.</strong>";?></div>
            <?php
           
         }
         else
         {
            echo "No se pudo actualizar el registro. <br>";
         }
      }
     
      ?>
<?php

      $sqlb = "SELECT users.name, cases.employee_id, cases.id id,case_num, surname,puesto,notes,severity, calificaciona, justificacion,
      porcentaje,medida1,medida2,medida3,medida4,medida5,eva1,eva2,estado,justificacionm 
      FROM users INNER JOIN $tabla ON users.username=cases.employee_id ";
      $resultado3 = mysqli_query($mysqli, $sqlb);

?>
<div class="panel panel-default sammacmedia">
            <div class="panel-heading">Objetivos de Reportes Establecimiento</div>
            <div class="panel-body">
 <table class="table table-striped thead-dark table-bordered table-hover" >
    <thead>
         <tr>
            <td>Colaboradores</td>
            <td>Objetivo</td>
            <td>%</td>
            <td>M??trica</td>
            <td>Comentario del jefe</td>
            <td>Validar</td>
         <tr>
    </thead>
    </div>
      <?php
      while($eprow2 = mysqli_fetch_array($resultado3))
      if(  $_SESSION['username']== $eprow2['eva2']) 
      if($eprow2['estado']=='3') {
    
        echo "<tr>";
         echo "<td>";
         echo $eprow2["employee_id"];echo "<br>";
         echo $eprow2[ "name"];echo "  ";echo $eprow2[ "surname"];echo "<br>";echo $eprow2["puesto"];
         echo "<td>";
         echo $eprow2["notes"];
         echo "<td>";
         echo $eprow2["porcentaje"];
         echo "<td>";
         echo "1.- ";
         echo $eprow2[ "medida1"];echo "<br>";
         echo "2.- ";
         echo $eprow2["medida2"];echo "<br>"; 
         echo "3.- ";
         echo $eprow2["medida3"];echo "<br>";
         echo "4.- ";
         echo $eprow2["medida4"];echo "<br>";
         echo "5.- ";
         echo $eprow2["medida5"];
         echo "<td>";
         echo $eprow2["justificacionm"];
         echo "<td>";
         echo "<button><b><a href=\"?id=".$eprow2["id"]."\">Validar</a></b></button>";
         echo "</td>";
         echo "</tr>";
      } 
    ?>
 <?php
      if($_GET) 
      if($eprow3['activo']==1) 
      if($eprow3['type']=='Establecimiento de Objetivos')
      {
         $querySelectByID = "SELECT id, case_num, notes, employee_id, severity FROM $tabla WHERE id = ".$_GET['id'].";";
         $resultSelectByID = mysqli_query($link, $querySelectByID); 
         $rowSelectByID = mysqli_fetch_array($resultSelectByID);

         $querySelectByID2 = "SELECT * FROM users WHERE username = ".$rowSelectByID['employee_id'].";";
         $resultSelectByID2 = mysqli_query($link, $querySelectByID2); 
         $rowSelectByID2 = mysqli_fetch_array($resultSelectByID2);
      ?>
 
      <form action="validacion1+1.php" method="post">
         <input type="hidden" value="<?=$rowSelectByID['id'];?>" name="idForm">
         <input type="hidden" value="En Proceso" name="severity">
         <div class="row form-group">
         <div class="col-lg-2">
            <label>Colaborador</label>
              <input type="text" class="form-control"  value="<?php echo $rowSelectByID2['name'];?>" readonly>
            </div>
          <div class="col-lg-2">
            <label>Objetivo</label>
              <input type="text" class="form-control" name="notes" value="<?php echo $rowSelectByID['notes'];?>" readonly>
            </div>
            <div class="col-lg-2">
            <label>Enviar objetivo a:</label><br>
                <label><input type="radio" name="estado" value="4">Evaluaci??n</label><br>
                <label><input type="radio" name="estado" value="0">Revisi??n</label><br>
            </div>
            <div class="col-lg-4">
            <label>Justificaci??n</label>
            <textarea class="form-control"name="justificacionm" placeholder=" Describe tu justificaci??n" required></textarea>
            </div>
                <div class="col-lg-2">
                <label>Enviar</label>
                <div class="row form-group">
                <div class="col-lg-3">
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
if($eprow4['type']=='Evaluacion Final')
{
?> 
      <?php
      // Direcci??n o IP del servidor MySQL
      $host = "localhost";
      // Puerto del servidor MySQL
      $puerto = "3306";
      // Nombre de usuario del servidor MySQL
      $usuario = "root";
      // Contrase??a del usuario
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
        $queryUpdate = "UPDATE $tabla INNER JOIN  historico ON $tabla.case_num = historico.case_num 
        SET $tabla.notes = '".$_POST['notes']."',
        $tabla.estado = '".$_POST['estado']."',  $tabla.severity = '".$_POST['severity']."',
        $tabla.justificacionf = '".$_POST['justificacionf']."',$tabla.periodo3 = '".$_POST['periodo3']."',
        historico.notes = '".$_POST['notes']."',historico.calificacionf = '".$_POST['calificacionf']."',
        historico.estado = '".$_POST['estado']."',  historico.severity = '".$_POST['severity']."',
        historico.justificacionf = '".$_POST['justificacionf']."',historico.periodo3 = '".$_POST['periodo3']."'
        WHERE $tabla.id = ".$_POST['idForm'].";";
        $resultUpdate = mysqli_query($link,$queryUpdate); 
       
         if($_POST['estado']==11){
            $query2="DELETE FROM $tabla WHERE id = '".$_POST['idForm']."' LIMIT 1";
            $resultUpda = mysqli_query($link,$query2);
         }

         if($resultUpdate==1 or $resultUpda==1)
         {
            ?>
            <div class="alert alert-warning sammac animated shake" id="sams1">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong> ??Listo! </strong><?php echo"<strong>La evaluaci??n se envi?? correctamente.</strong>";?></div>
            <?php
           
         }
         else
         {
            echo "No se pudo actualizar el registro. <br>";
         }
      }
     
      ?>
<?php

      $sqlb = "SELECT users.name, cases.employee_id, cases.id id,case_num, surname,puesto,notes,severity, calificaciona, justificacion,
      porcentaje,medida1,medida2,medida3,medida4,medida5,eva1,eva2,estado,justificacionm 
      FROM users INNER JOIN $tabla ON users.username=cases.employee_id ";
      $resultado3 = mysqli_query($mysqli, $sqlb);

?>
<div class="panel panel-default sammacmedia">
            <div class="panel-heading">Objetivos de Reportes Establecimiento |</div>
            <div class="panel-body">
 <table class="table table-striped thead-dark table-bordered table-hover" >
    <thead>
         <tr>
            <td>Colaboradores</td>
            <td>Objetivo</td>
            <td>%</td>
            <td>M??trica</td>
            <td>Comentario del jefe</td>
            <td>Validar</td>
         <tr>
    </thead>
    </div>
      <?php
      while($eprow2 = mysqli_fetch_array($resultado3))
      if( $_SESSION['username']== $eprow2['eva2']) if($eprow2['estado']== 7 or $eprow2['estado']==10) {
    
        echo "<tr>";
         echo "<td>";
         echo $eprow2["employee_id"];echo "<br>";
         echo $eprow2[ "name"];echo "  ";echo $eprow2[ "surname"];echo "<br>";echo $eprow2["puesto"];
         echo "<td>";
         echo $eprow2["notes"];
         echo "<td>";
         echo $eprow2["porcentaje"];
         echo "<td>";
         echo "1.- ";
         echo $eprow2[ "medida1"];echo "<br>";
         echo "2.- ";
         echo $eprow2["medida2"];echo "<br>"; 
         echo "3.- ";
         echo $eprow2["medida3"];echo "<br>";
         echo "4.- ";
         echo $eprow2["medida4"];echo "<br>";
         echo "5.- ";
         echo $eprow2["medida5"];
         echo "<td>";
         echo $eprow2["justificacionm"];
         echo "<td>";
         echo "<button><b><a href=\"?id=".$eprow2["id"]."\">Validar</a></b></button>";
         echo "</td>";
         echo "</tr>";
      } 
    
    ?>
 <?php
      if($_GET) 
      if($eprow4['activo']==1) 
      if($eprow4['type']=='Evaluacion Final' )
      {
         $querySelectByID = "SELECT id, case_num, notes, employee_id, severity,estado,calificacionm,justificacionm FROM $tabla WHERE id = ".$_GET['id'].";";
         $resultSelectByID = mysqli_query($link, $querySelectByID); 
         $rowSelectByID = mysqli_fetch_array($resultSelectByID);

         $querySelectByID2 = "SELECT * FROM users WHERE username = ".$rowSelectByID['employee_id'].";";
         $resultSelectByID2 = mysqli_query($link, $querySelectByID2); 
         $rowSelectByID2 = mysqli_fetch_array($resultSelectByID2);
      ?>
 
      <form action="validacion1+1.php" method="post">
         <input type="hidden" value="<?=$rowSelectByID['id'];?>" name="idForm">
         <input type="hidden" value="<?=$rowSelectByID['calificacionm'];?>" name="calificacionf">
        <input type="hidden" value="<?=$eprow4['fechai']," ", $eprow4['fechaf']," ", $eprow4['type'];?>" name="periodo3">
         <input type="hidden" value="Finalizado" name="severity">

         <div class="row form-group">
         <div class="col-lg-2">
            <label>Colaborador</label>
              <input type="text" class="form-control"  value="<?php echo $rowSelectByID2['name'];?>" readonly>
            </div>
          <div class="col-lg-2">
            <label>Objetivo</label>
              <input type="text" class="form-control" name="notes" value="<?php echo $rowSelectByID['notes'];?>" readonly>
            </div>
            <?php
            if ($rowSelectByID['estado']=='7'){ 
            ?>
            <div class="col-lg-2">
            <label>Enviar objetivo a:</label><br>
            <input type="hidden" value="n/a" name="justificacionf">
            <label><input type="radio" name="estado" value="8" required>Evaluaci??n</label><br>
                <label><input type="radio" name="estado" value="5" required>Revisi??n</label><br>
            </div>
            <div class="col-lg-4">
            <label>Justificaci??n</label>
            <textarea class="form-control"name="justificacionm" placeholder=" Describe tu justificaci??n" required></textarea>
            </div>
            <?php } ?>
            <?php
            if ($rowSelectByID['estado']=='10'){ 
            ?>
            <div class="col-lg-2">
            <label>Enviar objetivo a:</label>
            <input type="hidden"  name="justificacionm" value="<?php echo $rowSelectByID['justificacionm'];?>">
                <label><input type="radio" name="estado" value="8" required> Revisi??n</label><br>
                <label><input type="radio" name="estado" value="11" required> Conclusi??n</label><br>
            </div>
            <div class="col-lg-4">
            <label>Justificaci??n</label>
            <textarea class="form-control"name="justificacionf" placeholder=" Describe tu justificaci??n" required></textarea>
            </div>
            <?php } ?>
                <div class="col-lg-2">
                <label>Enviar</label>
                <div class="row form-group">
                <div class="col-lg-3">
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