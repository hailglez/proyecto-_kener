<?php require_once('includes/session.php');
      require_once('includes/conn.php');
$sqlE =mysqli_query($mysqli,"SELECT * FROM users WHERE username='{$_SESSION['username']}'");
$eprow=mysqli_fetch_array($sqlE);
$users=$eprow['username'];
$sqlE1 =mysqli_query($mysqli,"SELECT * FROM cases");
$eprow2=mysqli_fetch_array($sqlE1);
$sqlE3 =mysqli_query($mysqli,"SELECT * FROM periodos WHERE type='Establecimiento de Objetivos'  ORDER BY id DESC ");              
$eprow3=mysqli_fetch_array($sqlE3);
$sqlA =mysqli_query($mysqli,"SELECT * FROM users WHERE username='{$_SESSION['username']}'");
$epro=mysqli_fetch_array($sqlA);
$users=$epro['username'];
$max="100"; 
$sql5 = "SELECT SUM(porcentaje) as total2  FROM cases WHERE employee_id='$users'  ";
$result5 = mysqli_query($mysqli, $sql5);
$a5 = mysqli_fetch_assoc($result5);
$sql2 ="SELECT count(id) As total3 FROM cases  WHERE employee_id='$users'";
$result2=mysqli_query($mysqli,$sql2);
$values=mysqli_fetch_assoc($result2);
$cases=$values['total3'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Generar Objetivos</title>

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
                    <li  class="active">
                    <a href="a_objetivos.php">
                            <i class="fa fa-plus"></i>
                            Establecer de Objetivos </a>
                    </li>
                    <?php }?>
                    <li>
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
                    if($eprow3['activo']==1) 
                    if($eprow3['type']=='Establecimiento de Objetivos')

                    {
                        ?>
                     

                            <?php
                            if(isset($mysqli,$_POST['submit'])){
                            $username = mysqli_real_escape_string($mysqli,$_POST['username']);
                            $notes = mysqli_real_escape_string($mysqli,$_POST['notes']);
                            $porcentaje = mysqli_real_escape_string($mysqli,$_POST['porcentaje']);
                            $medida1 = mysqli_real_escape_string($mysqli,$_POST['medida1']);
                            $medida2 = mysqli_real_escape_string($mysqli,$_POST['medida2']);
                            $medida3 = mysqli_real_escape_string($mysqli,$_POST['medida3']);
                            $medida4 = mysqli_real_escape_string($mysqli,$_POST['medida4']);
                            $medida5 = mysqli_real_escape_string($mysqli,$_POST['medida5']);
                            $as = rand(10,1000);     
                            $case_num = date("Y/m/d").'.'.$as;
                            $estado=(1); 
                            $eva1=mysqli_real_escape_string($mysqli,$_POST['eva1']);
                            $eva2=mysqli_real_escape_string($mysqli,$_POST['eva2']);
                            $periodo1=mysqli_real_escape_string($mysqli,$_POST['periodo1']);
                            
                            
                            //validacion de porcentaje actual
                            $sql = "SELECT SUM(porcentaje) as total  FROM cases WHERE employee_id='$users'  ";
                            $result = mysqli_query($mysqli, $sql);
                            while ($a = mysqli_fetch_assoc($result)){
                            if($a['total'] + $porcentaje > $max){

                                echo'<script type="text/javascript">
                                alert("Porcentaje Superado, Revisa la distribucion de tus objetivos");
                                </script>';
                               
                            }else{ 
                                $sqlTaru = "INSERT INTO cases(employee_id,case_num,notes,porcentaje,
                                medida1,medida2,medida3,medida4,medida5,e_id2,estado,eva1,eva2,periodo1)
                                VALUES('$username','$case_num','$notes','$porcentaje','$medida1',
                                '$medida2','$medida3','$medida4','$medida5','$username',$estado,'$eva1','$eva2','$periodo1')";
                                $resTaru = mysqli_query($mysqli,$sqlTaru);
                                $sqlTaru2 = "INSERT INTO historico(employee_id,case_num,notes,porcentaje,
                                medida1,medida2,medida3,medida4,medida5,e_id2,estado,eva1,eva2,periodo1)
                                VALUES('$username','$case_num','$notes','$porcentaje','$medida1',
                                '$medida2','$medida3','$medida4','$medida5','$username',$estado,'$eva1','$eva2','$periodo1')";
                                $resTaru2 = mysqli_query($mysqli,$sqlTaru2);

                                if($resTaru2==1){
                                    ?>
                                    <div class="alert alert-warning sammac animated shake" id="sams1">
                                      <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong> ¡Listo! </strong><?php echo'Has creado tu objetivo con éxito';?></div>
                                    <?php
                                
                            } 
                        } 
                    }
                }?>
                   
<div class="row">
<div class="col-md-12">
    <div class="panel panel-default sammacmedia">
            <div class="panel-heading">Alta de objetivos</div>
        <div class="panel-body">
            <form method="post" action="a_objetivos.php"  autocomplete="off">
         
     <input type="hidden" value="<?=$eprow3['fechai']," ", $eprow3['fechaf']," ", $eprow3['type'];?>" name="periodo1">

        <div class="row form-group">
          <div class="col-lg-2">
            <label>Nombre</label>
              <input type="text" class="form-control"  value="<?php echo $eprow['name'];?>"readonly>
            </div>  
             <div class="col-lg-2">
            <label>Apellido</label>
              <input type="text" class="form-control" value="<?php echo $eprow['surname'];?>"readonly>
            </div>  
            <div class="col-lg-2">
            <label>No.Nómina</label>
             <input type="text" class="form-control" name="username" value="<?php echo $eprow['username'];?>" readonly>
            </div>
            <div class="col-lg-2">
            <label>Área</label>
             <input type="text" class="form-control"  value="<?php echo $eprow['area'];?>" readonly>
            </div>
            <div class="col-lg-2">
            <label>% Ocupado</label> 
             <input type="text" class="form-control"  value="<?php echo $a5['total2'];?>" readonly>
            </div>
            <div class="col-lg-2">
            <label>Objetivos Actuales</label> 
             <input type="text" class="form-control"  value="<?php echo $values['total3'];?>" readonly>
            </div>
            <div class="col-lg-12">
            <label></label>
             <input type="text" class="form-control"  value="<?php echo 'Métrica de Evaluación: 
 |    1  Insatisfactorio  
             |  2  Parcialmente Logrado 
             |  3  Logrado  
             |  4  Excedido  
             |  5  Sobresaliente'?>" readonly>
            </div>
            <div class="col-lg-12">
            <br>
            <label>Objetivo</label>
            <textarea class="form-control"name="notes" placeholder="Describe aquí tu objetivo" required></textarea>
            </div>
            <div class="col-lg-2">
            <br>
            <label>Porcentaje %</label>
            <div class="row form-group">
            <select  class="form-control" name="porcentaje" required>
                <option>10</option> 
                <option>15</option> 
                <option>20</option> 
                <option>25</option> 
                <option>30</option>
                <option>35</option> 
                <option>40</option> 
                <option>45</option> 
                <option>50</option> 
                <option>55</option> 
                <option>60</option> 
                 </select>
            </div>
            </div>
            <div class="col-lg-2">
            <br>
            <label>Métrica 1</label>
            <input type="text" class="form-control" name="medida1" placeholder="Eje: Septiembre-Octubre" required>
            </div>
            <div class="col-lg-2">
            <br>
            <label>Métrica 2</label>
            <input type="text" class="form-control" name="medida2"  placeholder="Eje: Julio-Agosto" required>
            </div>
            <div class="col-lg-2">
            <br>
            <label>Métrica 3</label>
            <input type="text" class="form-control" name="medida3"  placeholder="Eje: Mayo-Junio" required>
            </div>
            <div class="col-lg-2">
            <br>
            <label>Métrica 4</label>
            <input type="text" class="form-control" name="medida4"  placeholder="Eje: Marzo-Abril" required>
            </div>
            <div class="col-lg-2">
            <br>
            <label>Métrica 5</label>
            <input type="text" class="form-control" name="medida5"  placeholder="Eje: Enero-Febrero" required>
            </div>
            </div>
            <input type="hidden" value="<?=$eprow['evaluador1'];?>" name="eva1">
            <input type="hidden" value="<?=$eprow['evaluador2'];?>" name="eva2">
            </div>

            

                <div class="row">
                <div class="col-md-6">
                <label></label>
                  <button type="submit" name="submit" class="btn btn-sam animated tada navbar-btn"><span class="fa fa-plus"></span> Añadir Objetivo</button>  
                </div>
                   
                </div>
            </form>

            </div>
    </div>
    </div>
    
        
    </div>
    
    <?php }?>	   

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
