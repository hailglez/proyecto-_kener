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

        <title>settings</title>

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
                    <li class="active">
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
                        <strong> !Listo! </strong><?php echo'haz cambiado tu contraseña con exito';?></div>

                                    <?php
                                }
                                }
                                }
                  
                            }
                if(isset($mysqli,$_POST['update'])){
                    $name = mysqli_real_escape_string($mysqli,$_POST['name']);
                    $surname = mysqli_real_escape_string($mysqli,$_POST['surname']);
                    $phone = mysqli_real_escape_string($mysqli,$_POST['phone']);
                    $email = mysqli_real_escape_string($mysqli,$_POST['email']);
                    
                    $sqlTaru = "UPDATE users SET name ='$name', surname ='$surname', phone ='$phone', email ='$email' WHERE username= '{$_SESSION['username']}'";
                    $resTaru = mysqli_query($mysqli,$sqlTaru);
                    if($resTaru==1){
                        ?>
                        <div class="alert alert-warning sammac animated shake" id="sams1">
                          <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> !Listo! </strong><?php echo'haz actualizado tu perfil con éxito';?></div>
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
<div class="col-md-8">
    <div class="panel panel-default sammacmedia">
            <div class="panel-heading">Información de Empleado</div>
        <div class="panel-body">
            <form method="post" action="settings.php" >
        <div class="row form-group">
          <div class="col-lg-6">
            <label>Nombre</label>
              <input type="text" class="form-control" name="name" pattern="[A-Za-zàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð, ]{3,}" value="<?php echo $eprow['name'];?>" required>
            </div>  
             <div class="col-lg-6">
            <label>Apellido</label>
              <input type="text" class="form-control" name="surname" pattern="[A-Za-zàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð, ]{3,}" value="<?php echo $eprow['surname'];?>" required>
            </div>  
        </div>
            <div class="row form-group">
          <div class="col-lg-6">
            <label>Correo</label>
              <input type="email" class="form-control" name="email" value="<?php echo $eprow['email'];?>" required>
            </div>  
             <div class="col-lg-6">
            <label>Telefono</label>
              <input type="text" class="form-control" name="phone" pattern= "[0-9][ -]*){13,}" value="<?php echo $eprow['phone'];?>">
            </div>  
        </div>   
         <div class="row form-group" >
         
        </div>

                <div class="row">
                <div class="col-md-12">
                  <button type="submit" name="update" class="btn btn-warning btn-block"><span class="fa fa-pencil"></span>Actualizar</button>  
                </div>
                   
                </div>
            </form>

            </div>
    </div>
    </div>
    <div class="col-md-4">
    <div class="panel panel-default sammacmedia">
            <div class="panel-heading">Cambio de Contraseña</div>
        <div class="panel-body">
            <form method="post" action="settings.php">
        <div class="row form-group">
          <div class="col-lg-12">
            <label>Contraseña anterior</label>
              <input type="password" class="form-control" name="old_password" required>
            </div>   
        </div>
           
                <div class="row form-group">
          <div class="col-lg-12">
            <label>Nueva Contraseña</label>
              <input type="password" class="form-control" name="password" required>
            </div>   
        </div>
                        <div class="row form-group">
          <div class="col-lg-12">
            <label>Confirmar Contraseña</label>
              <input type="password" class="form-control" name="cpassword" required>
            </div>   
        </div>

                <div class="row">
                <div class="col-md-12">
                  <button type="submit" name="submit" class="btn btn-danger btn-block"><span class="fa fa-lock"></span> Cambiar</button>  
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
