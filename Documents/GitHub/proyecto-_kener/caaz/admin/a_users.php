<?php require_once('includes/session.php');
      require_once('includes/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title> Añadir Usuarios</title>

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
                    <li class="active">
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
                            <?php
                            if(isset($mysqli,$_POST['submit'])){
                            $name = mysqli_real_escape_string($mysqli,$_POST['name']);
                            $surname = mysqli_real_escape_string($mysqli,$_POST['surname']);
                            $email = mysqli_real_escape_string($mysqli,$_POST['email']);
                            $phon = mysqli_real_escape_string($mysqli,$_POST['phone']); 
                            $username = mysqli_real_escape_string($mysqli,$_POST['username']); 
                            $password = mysqli_real_escape_string($mysqli,$_POST['password']);
                            $cpassword = mysqli_real_escape_string($mysqli,$_POST['cpassword']);     
                            $permission = mysqli_real_escape_string($mysqli,$_POST['permission']); 
                            $gender = mysqli_real_escape_string($mysqli,$_POST['gender']); 
                            $evaluador1 = mysqli_real_escape_string($mysqli,$_POST['evaluador1']); 
                            $evaluador2 = mysqli_real_escape_string($mysqli,$_POST['evaluador2']); 
                            $area = mysqli_real_escape_string($mysqli,$_POST['area']); 
                            $puesto = mysqli_real_escape_string($mysqli,$_POST['puesto']);     
                            $joined = date(" d M Y ");

                            $phone = ''.$phon;    
                           if($password != $cpassword)
                           {
                               echo 'error';
                           }
                            
                              else{ 
                            $password=md5($cpassword);
                            $sql_n = "SELECT * FROM users WHERE surname ='$surname'";
                            $res_n = mysqli_query($mysqli, $sql_n);    
                            $sql_e = "SELECT * FROM employees WHERE employee_id ='$username'";
                            $res_e = mysqli_query($mysqli, $sql_e);
                            if(mysqli_num_rows($res_e) > 0){
                            ?>
                             <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Danger! </strong><?php echo'lo siento, el usuario ya está asignado a alguien';?></div>
                        <?php    
                       }elseif(mysqli_num_rows($res_n) > 0){
                        ?>
                        <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Danger! </strong><?php echo'lo siento, el teléfono ya está asignado a alguien';?></div>
                        <?php    
                        }
                    else{      
                  
                $sql = "INSERT INTO users(name,surname,username,email,joined,type,permission,gender,phone,password,evaluador1,evaluador2,area,puesto)
                VALUES('$name','$surname','$username','$email','$joined','user','$permission','$gender','$phone','$password','$evaluador1','$evaluador2','$area','$puesto')";
                $results = mysqli_query($mysqli,$sql);
                        

                $sql2 = "INSERT INTO employees(employee_id,name,surname,phone,email,gender,joined,tmp)VALUES('$username','$name','$surname','$phone','$email','$gender','$joined','$username')";
                $results = mysqli_query($mysqli,$sql2);

                $sql3 = "INSERT INTO picture(name,tmp)VALUES('$username.jpg','$username')";
                mysqli_query($mysqli,$sql3);
                        
                        
                        if($results==1){
                              ?>
                        <div class="alert alert-success strover animated bounce" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> ¡Cuenta creada exitosamente! </strong><?php echo'Gracias por crear una cuenta';?></div>
                        <?php

                          }else{
                                ?>
                         <div id="sams1" class="sufee-alert alert with-close alert-danger alert-dismissible fade show col-lg-12">
											<span class="badge badge-pill badge-danger">Error</span>
											Huy! Algo salió mal
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
                        <?php    
                          }      
                      }
                 }
            }
                
                ?>
		<div class="panel panel-default sammacmedia">
            <div class="panel-heading"> Añadir Usuarios</div>
        <div class="panel-body">
            <form method="post" action="a_users.php">
        <div class="row form-group">
          <div class="col-lg-6">
            <label>Nombre(s)</label>
              <input type="text" class="form-control" name="name" placeholder="Ingresa el nombre(s)" required>
            </div>  
             <div class="col-lg-6">
            <label>Apellido(s)</label>
              <input type="text" class="form-control" name="surname" placeholder="Ingresa un apellido(s)" required>
            </div>  
        </div>
            <div class="row form-group">
          <div class="col-lg-6">
            <label>Correo</label>
              <input type="email" class="form-control" name="email"placeholder="Ingresa correo electrónico" required>
            </div>  
             <div class="col-lg-6">
            <label>Teléfono</label>
              <input type="text" class="form-control" name="phone" pattern="[0-9][ -]*){13}" placeholder="7227843512">
            </div>  
        </div>   
         <div class="row form-group">
          <div class="col-lg-6">
            <label>Nivel de acceso</label>
              <select class="form-control" name="permission">
              <option>1</option>
              <option>2</option> 
             <option>3</option> 
             <option>4</option> 
              </select>
            </div>  
             <div class="col-lg-6">
            <label>Género</label>
             <select class="form-control" name="gender">
              <option>F</option>
              <option>M</option>      
              </select>
            </div>  
      
            <div class="col-lg-6">
            <label>Evaluador1</label>
              <input type="text" class="form-control" name="evaluador1" pattern="[0-9][ -]*){4}" placeholder="Número de nómina de evaluador 1" required>
            </div> 
            <div class="col-lg-6">
            <label>Evaluador2</label>
              <input type="text" class="form-control" name="evaluador2" pattern="[0-9][ -]*){4}" placeholder="Número de nómina de evaluador 1+1" required>
            </div> 
            <div class="col-lg-6">
            <label>Puesto</label>
              <input type="text" class="form-control" name="puesto"  placeholder="Eje: Ing. de Soporte" required>
            </div> 
            <div class="col-lg-6">
            <label>Área</label>
              <input type="text" class="form-control" name="area"  placeholder="Eje: Sistemas" required>
            </div> 
            <div class="col-lg-6">
            <label>Número de Nómina</label>
              <input type="text" class="form-control" name="username" pattern="[0-9][ -]*){4}"required>
            </div>  
             <div class="col-lg-3">
            <label>Contraseña</label>
              <input type="password" class="form-control" name="password">
            </div> 
                <div class="col-lg-3">
            <label>Confirmar contraseña</label>
              <input type="password" class="form-control" name="cpassword">
            </div> 
            
                
                <div class="col-md-3">
                    <br>
                  <button type="submit" name="submit" class="btn btn-warning btn-block"><span class="fa fa-plus"></span> Añadir</button>  
                </div>
                     <div class="col-md-3">
                         <br>
                  <button type="reset" class="btn btn-danger btn-block"><span class="fa fa-times"></span> Cancelar</button>  
                </div>
                </div>
            </form>

            </div>
                </div>
                <div class="line"></div>
                <footer>
            <p class="text-center">
            HGZ hailglez@gmail.com  &copy;<?php echo date("Y ");?>Copyright. All Rights Reserved.
            </p>
            </footer>
            </div>
            
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
