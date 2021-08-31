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
        <title>Editar Usuarios</title>
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
                    if($_SESSION['permission']==4){ 
                    ?>
                    <li>
                        <a href="settings.php">
                            <i class="fa fa-cog"></i>
                            Ajustes </a>
                    </li>
                    <?php } ?>
                    <li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content"  class="col-md-12">
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
                if(isset($mysqli,$_POST['update'])){
                    $name = mysqli_real_escape_string($mysqli,$_POST['name']);
                    $surname = mysqli_real_escape_string($mysqli,$_POST['surname']);
                    $email = mysqli_real_escape_string($mysqli,$_POST['email']);
                    $username = mysqli_real_escape_string($mysqli,$_POST['username']);
                    $password = mysqli_real_escape_string($mysqli,$_POST['password']); 
                    $permission = mysqli_real_escape_string($mysqli,$_POST['permission']); 
                    $gender = mysqli_real_escape_string($mysqli,$_POST['gender']);   
                    $phon = mysqli_real_escape_string($mysqli,$_POST['phone']); 
                    $evaluador1 = mysqli_real_escape_string($mysqli,$_POST['evaluador1']);  
                    $evaluador2 = mysqli_real_escape_string($mysqli,$_POST['evaluador2']);  
                    $area = mysqli_real_escape_string($mysqli,$_POST['area']);  
                    $puesto = mysqli_real_escape_string($mysqli,$_POST['puesto']);  

                    $queryUpdate = "UPDATE users INNER JOIN  employees ON users.username = employees.employee_id 

                    SET users.name = '".$_POST['name']."',users.surname = '".$_POST['surname']."',users.email = '".$_POST['email']."',
                    users.username = '".$_POST['username']."',users.password = '".$_POST['password']."',
                    users.permission = '".$_POST['permission']."',users.gender = '".$_POST['gender']."',
                    users.phone = '".$_POST['phone']."',users.evaluador1 = '".$_POST['evaluador1']."',
                    users.evaluador2 = '".$_POST['evaluador2']."',users.area = '".$_POST['area']."',
                    users.puesto = '".$_POST['puesto']."',
                    employees.employee_id = '".$_POST['username']."',employees.name = '".$_POST['name']."',
                    employees.surname = '".$_POST['surname']."',employees.phone = '".$_POST['phone']."',
                    employees.gender = '".$_POST['gender']."',employees.tmp = '".$_POST['username']."'
                    
                    WHERE users.id = ".$_POST['idForm'].";";
                    $resultUpdate = mysqli_query($mysqli, $queryUpdate); 

                    $sqlTaru = "UPDATE cases SET employee_id ='".$_POST['username']."', e_id2 = '".$_POST['username']."',
                    eva1 ='".$_POST['evaluador1']."', eva2 = '".$_POST['evaluador2']."'
                    WHERE employee_id = ".$_POST['username'].";";
                    $resTaru = mysqli_query($mysqli,$sqlTaru);

                    $sqlTaru1 = "UPDATE competencias SET employee_id ='".$_POST['username']."'
                    WHERE employee_id = ".$_POST['username'].";";
                    $resTaru1 = mysqli_query($mysqli,$sqlTaru1);
                   
                    if($resultUpdate==1){
                        ?>
                        <div class="alert alert-warning sammac animated shake" id="sams1">
                          <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> ¡Exito! </strong><?php echo'Has actualizado el perfil con éxito';?></div>
                        <?php
                    }else{
                    ?>
                <div class="alert alert-warning samuel animated shake" id="sams1">
                          <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Error!</strong><?php echo'Verifica tu informacion';?></div>
                <?php
                    }
                }
                ?>           

		    <div class="panel panel-default sammacmedia">
            <div class="panel-heading"><h4>Todos los Usuarios</h4></div>
            <div class="panel-body">
                        <table class="table table-striped thead-dark table-bordered table-hover" id="myTable">
                <thead>
                <tr>
                    <th> Id</th>
                    <th> Nombre </th>
                    <th> No. de Nomina</th>
                    <th> Evaluador 1</th>
                    <th> Evaluador 2</th>
                    <th> Acción </th>
                    </tr>
                </thead>
                    <?php
                    $query=mysqli_query($mysqli,"select *from `users` ");
                     while($row=mysqli_fetch_array($query))
                        {
                          
                          ?>
                          <tr>
                              <td><?php echo $row['id'];?></td> 
                            <td><?php echo $row['name'].' '.$row['surname'];?></td>
                            <td><?php echo $row['username'];?></td>
                            <td><?php echo $row['evaluador1'];?></td>  
                            <td><?php echo $row['evaluador2'];?></td> 
                            <td>
                            <?php echo "<button class='btn btn-warning'><span class='fa fa-pencil'></span><a href=\"?id=".$row["id"]."\">Editar</a></button>";?>
                            </td>
                          </tr>
                          <?php
                      }
                        ?>

                      <?php
                      if($_GET)
                      {
                         $querySelectByID = "SELECT * FROM users WHERE id = ".$_GET['id'].";";
                         $resultSelectByID = mysqli_query($mysqli, $querySelectByID); 
                         $rowSelectByID = mysqli_fetch_array($resultSelectByID);
                      ?>
                      <form action="e_usuarios.php" method="post" autocomplete="off" >
                         <input type="hidden" value="<?=$rowSelectByID['id'];?>" name="idForm">
                         <div class="col-lg-4">
                            <label>Nombre:</label>
                              <input type="text" class="form-control" name="name" value="<?php echo $rowSelectByID['name'];?>">
                            </div>
                            <div class="col-lg-4">
                            <label>Apellidos</label>
                              <input type="text" class="form-control" name="surname" value="<?php echo $rowSelectByID['surname'];?>"required>
                            </div>
                          <div class="col-lg-4">
                            <label>email</label>
                              <input type="email" class="form-control" name="email" value="<?php echo $rowSelectByID['email'];?>" required>
                            </div>
                          <div class="col-lg-2">
                          <br>
                            <label>Nomina</label>
                              <input type="text" class="form-control" name="username" value="<?php echo $rowSelectByID['username'];?>" required readonly>
                            </div>
                            <div class="col-lg-2">
                            <br>
                            <label>Contraseña</label>
                            <input type="text" class="form-control" name="password"  value="<?php echo $rowSelectByID['password'];?>" required readonly>
                            </div>
                            <div class="col-lg-2">
                            <br>
                            <label>Nivel Acceso</label>
                            <input type="text" class="form-control" name="permission"  value="<?php echo $rowSelectByID['permission'];?>" required>
                            </div>
                            <div class="col-lg-2">
                            <br>
                            <label>Genero</label>
                            <input type="text" class="form-control" name="gender" value="<?php echo $rowSelectByID['gender'];?>" required>
                            </div>
                            <div class="col-lg-2">
                            <br>
                            <label>Celular</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo $rowSelectByID['phone'];?>">
                            </div>
                            <div class="col-lg-2">
                            <br>
                            <label>Evaluador 1</label>
                            <input type="text" class="form-control" name="evaluador1"  value="<?php echo $rowSelectByID['evaluador1'];?>" required>
                            </div>
                            <div class="col-lg-2">
                            <br>
                            <label>Evaluador 2</label>
                            <input type="text" class="form-control" name="evaluador2"  value="<?php echo $rowSelectByID['evaluador2'];?>" required>
                            </div>
                            <div class="col-lg-2"><br>
                            <label>Area</label>
                            <input type="text" class="form-control" name="area"  value="<?php echo $rowSelectByID['area'];?>" required>
                            </div>
                            <div class="col-lg-4"><br>
                            <label>Puesto</label>
                            <input type="text" class="form-control" name="puesto"  value="<?php echo $rowSelectByID['puesto'];?>" required>
                            </div>
                                <div class="col-lg-4"><br>
                                <br>
                                <label></label>
                                  <button type="submit" value="Guardar" name="update" class="btn btn-warning col-lg-6">Actualizar Datos</button>  
                                  <br> <br><br>
                                </div>
                                </div>
                         
                      </form> 
                      <?php
                      }
                      mysqli_close($mysqli);
                      ?>
                
                </div>
                </div>
              
               
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
             