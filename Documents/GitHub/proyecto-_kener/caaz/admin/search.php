<?php require_once('includes/session.php');
      require_once('includes/conn.php');
	
	 
$sqlE =mysqli_query($mysqli,"SELECT * FROM users WHERE username='{$_SESSION['username']}'");
$eprow=mysqli_fetch_array($sqlE);

$sqlb1 = "SELECT * FROM periodos ";
$resultado1 = $mysqli->query($sqlb1);
$trow = $resultado1->fetch_assoc();
$ty=$trow['fechai']." ". $trow['fechaf']." ". $trow['type'];

$sqlb2 = "SELECT * FROM historico_comp WHERE employee_id= '{$_SESSION['username']}' AND periodo1= '$ty'";
$resultado2 = $mysqli->query($sqlb2);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Reportes</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/awesome/font-awesome.css">
        <link rel="stylesheet" href="assets/css/animate.css">
    </head>
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
                    <li class="active">
                        <a href=".php">
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
                        <?php if($_SESSION['permission']==4){ ?>
                            <div class="col-lg-2" id="sams">
                                <button type="button"  onclick="location.href='e_usuarios.php'" id="sidebarCollapse" id="makota" class="btn btn-sam animated tada navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Editar Usuarios</span>
                            </button>
                            </div>
                            <div class="col-lg-1" id="sams">
                                <button type="button" onclick="location.href='search.php'" id="sidebarCollapse" id="makota" class="btn btn-sam animated tada navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Reportes</span>
                            </button>
                            </div>
                            <?php } ?>
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
                            $old_password1 =mysqli_real_escape_string($mysqli,$_POST['old_password']);
                            $password =mysqli_real_escape_string($mysqli,$_POST['password']);
                            $cpassword =mysqli_real_escape_string($mysqli,$_POST['cpassword']);
                                $old_password=md5($old_password1);
                                if($eprow['password']!=$old_password){
                                  ?>
                                <div class="alert alert-danger samuel animated shake" id="sams1">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong> !Error! </strong><?php echo'Lo siento , ingresa la contraseña anterior adecuadamente';?></div>
                                    <?php   
                                }else{
                                    if($password!=$cpassword){
                                     ?>
                                <div class="alert alert-danger samuel animated shake" id="sams1">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong> !Error! </strong><?php echo'Lo siento, la contraseña y la confirmacion no coinciden, ingresalas correctamente';?></div>

                                    <?php      
                                    }else{
                                      $password =md5($cpassword);  
                                $sqliU ="UPDATE users SET password='$password' WHERE username='{$_SESSION['username']}'";
                                $res = mysqli_query($mysqli,$sqliU);
                                if($res==1){
                                    ?>
                                <div class="alert alert-warning sammac animated shake" id="sams1">
                          <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> !Exito! </strong><?php echo'haz cambiado tu contraseña con exito';?></div>

                                    <?php
                                }
                                }
                                }
                  
                            }
                if(isset($mysqli,$_POST['upsdate'])){
					
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
                <div class="line"></div>
<div class="row">
<div class="col-md-12">
    <div class="panel panel-default sammacmedia">
            <div class="panel-heading">Reporte de empleado</div>
        <div class="panel-body">
            <form method="post" action="reportespdf/reportepdf2.php" target="blank" >
        <div class="row form-group">
		<div class="col-lg-8"> <br>
            <label>Tipo de Reporte </label>
			<select  class="form"  name="type">
        <option value="0">Seleccione:</option>
		<option value="1">Objetivos</option>
		<option value="2">Competencias</option>
		<option value="3">Todos</option>
      </select>
	  <br> <br> 
            </div> 
          <div class="col-lg-6">
            <label>Selecciona Periodo</label>
			<select  class="form"  name="periodo">
        <option value="0">Seleccione:</option>
        <?php
          $query = $mysqli -> query ("SELECT * FROM periodos WHERE type='Evaluacion Final'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores['id'].'">'.$valores['type'].' '.$valores['fechai'].'--'.$valores['fechaf'].'</option>';
          }
        ?>
      </select>
	  </div> 
	  <div class="col-lg-6">
            <label>Selecciona Colaborador </label>
			<select  class="form"  name="colaborador">
        <option value="0">Seleccione:</option>
		<option value="*">Todos</option>
        <?php
          $query = $mysqli -> query ("SELECT * FROM users");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores['id'].'">'.$valores['username'].' '.$valores['name'].' '.$valores['surname'].'</option>';
          }
        ?>
      </select>
        </div>
        </div>   
		  <br>
                <div class="row">
                <div class="col-md-12">
                  <button type="submit" name="update" class="btn btn-warning btn-block"><span class="fa fa-pencil"></span> Generar PDF</button>  
                </div>
                   
                </div>
            </form>

            </div>
    </div>
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

        <!-- jQuery CDN -->
         <script src="assets/js/jquery-1.10.2.js"></script>
         <!-- Bootstrap Js CDN         -->
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
