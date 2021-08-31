<?php require_once('includes/session.php');
      require_once('includes/conn.php');
$sqlE =mysqli_query($mysqli,"SELECT * FROM users WHERE username='{$_SESSION['username']}'");
$eprow=mysqli_fetch_array($sqlE);
$sqlA =mysqli_query($mysqli,"SELECT * FROM users WHERE username='{$_SESSION['username']}'");
$epro=mysqli_fetch_array($sqlA);
$users=$epro['username'];
$max="3"; 
$sqlE1 =mysqli_query($mysqli,"SELECT * FROM cases");
$eprow2=mysqli_fetch_array($sqlE1);
$sqlE3 =mysqli_query($mysqli,"SELECT * FROM periodos WHERE type='Evaluacion Medio Año'  ORDER BY id DESC ");              
$eprow3=mysqli_fetch_array($sqlE3);
$sqlE4 =mysqli_query($mysqli,"SELECT * FROM periodos WHERE type='Evaluacion Final'  ORDER BY id DESC ");              
$eprow4=mysqli_fetch_array($sqlE4);


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Competencias</title>
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
                    <li  class="active">
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
                    if($eprow3['type']=='Evaluacion Medio Año')

                    { ?>
                            <?php
                            if(isset($mysqli,$_POST['submit'])){
                            $employee_id = mysqli_real_escape_string($mysqli,$_POST['employee_id']);
                            $comp1 = mysqli_real_escape_string($mysqli,$_POST['comp1']);
                            $p1 = mysqli_real_escape_string($mysqli,$_POST['p1']);
                            $comp2 = mysqli_real_escape_string($mysqli,$_POST['comp2']);
                            $p2 = mysqli_real_escape_string($mysqli,$_POST['p2']);
                            $comp3 = mysqli_real_escape_string($mysqli,$_POST['comp3']);
                            $p3 = mysqli_real_escape_string($mysqli,$_POST['p3']);
                            $comp4 = mysqli_real_escape_string($mysqli,$_POST['comp4']);
                            $p4 = mysqli_real_escape_string($mysqli,$_POST['p4']);
                            $comp5 = mysqli_real_escape_string($mysqli,$_POST['comp5']);
                            $p5 = mysqli_real_escape_string($mysqli,$_POST['p5']);
                            if($_SESSION['permission']==2 or $_SESSION['permission']==3){
                            $comp6 = mysqli_real_escape_string($mysqli,$_POST['comp6']);
                            $p6 = mysqli_real_escape_string($mysqli,$_POST['p6']);
                            $comp7 = mysqli_real_escape_string($mysqli,$_POST['comp7']);
                            $p7 = mysqli_real_escape_string($mysqli,$_POST['p7']);
                            }
                            $as1 = rand(10,1000);$case_num1 = date("Y/m/d").'.'.$as1;
                            $as2 = rand(10,1000); $case_num2 = date("Y/m/d").'.'.$as2;
                            $as3 = rand(10,1000);$case_num3 = date("Y/m/d").'.'.$as3;
                            $as4 = rand(10,1000);$case_num4 = date("Y/m/d").'.'.$as4;
                            $as5 = rand(10,1000);$case_num5 = date("Y/m/d").'.'.$as5; 
                            $as6 = rand(10,1000);$case_num6 = date("Y/m/d").'.'.$as6;  
                            $as7 = rand(10,1000); $case_num7 = date("Y/m/d").'.'.$as7;        
                            $estado=(1); 
                            $periodo1=mysqli_real_escape_string($mysqli,$_POST['periodo1']);
                            $t1=("Orientación a resultados"); 
                            $t2=("Manejo del cambio"); 
                            $t3=("Actuar con integridad"); 
                            $t4=("Influencia"); 
                            $t5=("Trabajo en equipo"); 
                            $t6=("Liderazgo"); 
                            $t7=("Desarrollo de personal y de talento");  
                            //validacion de competencias  actuales
                          $sql = "SELECT COUNT(ID) as total  FROM competencias WHERE employee_id='$users'  ";
                          $result = mysqli_query($mysqli, $sql);

                          while ($a = mysqli_fetch_assoc($result)){
                          if($a['total']  > $max){

                              echo'<script type="text/javascript">
                              alert("Ya has enviado tus competencias a validacion anteriormente");
                              </script>';
                             
                          }else{
                               
                                $sqlTaru = "INSERT INTO competencias(employee_id,comp1,p1,estado,periodo1,tipo,case_num)
                                VALUES('$employee_id','$comp1','$p1','$estado','$periodo1','$t1','$case_num1'),
                                  ('$employee_id','$comp2','$p2','$estado','$periodo1','$t2','$case_num2'),
                                  ('$employee_id','$comp3','$p3','$estado','$periodo1','$t3','$case_num3'),
                                  ('$employee_id','$comp4','$p4','$estado','$periodo1','$t4','$case_num4'),
                                  ('$employee_id','$comp5','$p5','$estado','$periodo1','$t5','$case_num5')";
                                 
                                $resTaru = mysqli_query($mysqli,$sqlTaru);
                                $sqlTaru2 = "INSERT INTO historico_comp(employee_id,comp1,p1,estado,periodo1,tipo,case_num)
                                VALUES('$employee_id','$comp1','$p1','$estado','$periodo1','$t1','$case_num1'),
                                  ('$employee_id','$comp2','$p2','$estado','$periodo1','$t2','$case_num2'),
                                  ('$employee_id','$comp3','$p3','$estado','$periodo1','$t3','$case_num3'),
                                  ('$employee_id','$comp4','$p4','$estado','$periodo1','$t4','$case_num4'),
                                  ('$employee_id','$comp5','$p5','$estado','$periodo1','$t5','$case_num5')";
                                  
                                $resTaru2 = mysqli_query($mysqli,$sqlTaru2);

                                if($_SESSION['permission']==2 or $_SESSION['permission']==3){
                                    $sqlTa = "INSERT INTO competencias(employee_id,comp1,p1,estado,periodo1,tipo,case_num)
                                    VALUES ('$employee_id','$comp6','$p6','$estado','$periodo1','$t6','$case_num6'),
                                           ('$employee_id','$comp7','$p7','$estado','$periodo1','$t7','$case_num7')";
                                    $resTa = mysqli_query($mysqli,$sqlTa);
                                    $sqlTa2 = "INSERT INTO historico_comp(employee_id,comp1,p1,estado,periodo1,tipo,case_num)
                                    VALUES ('$employee_id','$comp6','$p6','$estado','$periodo1','$t6','$case_num6'),
                                           ('$employee_id','$comp7','$p7','$estado','$periodo1','$t7','$case_num7')";
                                    $resTa2 = mysqli_query($mysqli,$sqlTa2);
                                }

                                if($resTaru2 or $resTa2 ==1){
                                    ?>
                                    <div class="alert alert-warning sammac animated shake" id="sams1">
                                      <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong> ¡Listo! </strong><?php echo'Has enviado tus competencias con éxito';?></div>
                                    <?php
                                }  
                            } 
                        }
                        } 
                ?>
                   
<div class="row">
<div class="col-md-12">
    <div class="panel panel-default sammacmedia">
            <div class="panel-heading">Autoevaluación de competencias</div>
        <div class="panel-body">
            <form method="post" action="competencias.php"  autocomplete="off">
            <input type="hidden" value="<?=$eprow['username'];?>" name="employee_id">
     <input type="hidden" value="<?=$eprow3['fechai']," ", $eprow3['fechaf']," ",
      $eprow3['type'];?>" name="periodo1">
        <div class="row form-group">
            <div class="col-lg-12">
             <input type="text" class="form-control"  value="<?php echo 'Métrica de Evaluación: 
 |    1  Insatisfactorio  
        |  2  Necesita desarrollo
             |  3  Efectivo y esperado 
             |  4  Excelente   
|  5  Sobresaliente'?>" readonly>
            </div> 
            <div class="col-lg-10">
            <br>
            <label>Competencia </label>
             <input type="text" class="form-control" value="<?php echo 'Orientación a resultados'?>" readonly>
            </div>  
            <div class="col-lg-10">
            <textarea class="form-control" name="comp1" placeholder="Justifica aquí tu puntuación" required></textarea>
            </div>
            <div class="col-lg-2">
            <label>Puntuación</label>
            <div >
            <select  class="form-control" name="p1" required>
                <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option>
                 </select>
            </div>
            </div>
            <div class="col-lg-10">
            <br>
             <input type="text" class="form-control"  value="<?php echo 'Manejo del cambio'?>" readonly>
            </div>  
            <div class="col-lg-10">
            <textarea class="form-control" name="comp2" placeholder="Justifica aquí tu puntuación" required></textarea>
            </div>
            <div class="col-lg-2">
            <label>Puntuación</label>
            <div >
            <select  class="form-control" name="p2" required>
                <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option>
                 </select>
            </div>
            </div>
            <div class="col-lg-10">
            <br>
             <input type="text" class="form-control"  value="<?php echo 'Actuar con integridad'?>" readonly>
            </div>  
            <div class="col-lg-10">
            <textarea class="form-control" name="comp3"placeholder="Justifica aquí tu puntuación" required></textarea>
            </div>
            <div class="col-lg-2">
            <label>Puntuación</label>
            <div >
            <select  class="form-control" name="p3" required>
                <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option>
                 </select>
            </div>
            </div>
            <div class="col-lg-10">
            <br>
             <input type="text" class="form-control"  value="<?php echo 'Influencia'?>" readonly>
            </div>  
            <div class="col-lg-10">
            <textarea class="form-control" name="comp4" placeholder="Justifica aquí tu puntuación" required></textarea>
            </div>
            <div class="col-lg-2">
            <label>Puntuación</label>
            <div >
            <select  class="form-control" name="p4" required>
                <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option>
                 </select>
            </div>
            </div>
            <div class="col-lg-10">
            <br>
             <input type="text" class="form-control"  value="<?php echo 'Trabajo en equipo'?>" readonly>
            </div>  
            <div class="col-lg-10">
            <textarea class="form-control" name="comp5" placeholder="Justifica aquí tu puntuación" required></textarea>
            </div>
            <div class="col-lg-2">
            <label>Puntuación</label>
            <div >
            <select  class="form-control" name="p5" required>
                <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option>
                 </select>
            </div>
            </div>
                    <?php
                     if($_SESSION['permission']==2 or $_SESSION['permission']==3  or $_SESSION['permission']==4 ){
                    ?>
                     <div class="col-lg-10">
            <br>
             <input type="text" class="form-control"  value="<?php echo 'Liderazgo'?>" readonly>
            </div>  
            <div class="col-lg-10">
            <textarea class="form-control" name="comp6" placeholder="Justifica aquí tu puntuación"></textarea>
            </div>
            <div class="col-lg-2">
            <label>Puntuación</label>
            <div >
            <select  class="form-control" name="p6">
                <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option>
                 </select>
            </div>
            </div>
            <div class="col-lg-10">
            <br>
             <input type="text" class="form-control"  value="<?php echo 'Desarrollo de personal y de talento'?>" readonly>
            </div>  
            <div class="col-lg-10" >
            <textarea class="form-control" name="comp7" placeholder="Justifica aquí tu puntuación"></textarea>
            </div>
            <div class="col-lg-2">
            <label>Puntuación</label>
            <div >
            <select  class="form-control" name="p7" >
                <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option>
                 </select>
            </div>
            </div>
            <?php } ?>
                <div class="row">
                <div class="col-md-6">
                <label></label>
                  <button type="submit" name="submit" class="btn btn-sam animated tada navbar-btn">
                  <span class="fa fa-plus"></span> Enviar a validación</button>  
                </div>
                </div>
            </form>

            </div>
    </div>
    </div>
    <?php }?>
    <?php
                    if($eprow4['activo']==1) 
                    if($eprow4['type']=='Evaluacion Final')

                    { ?>
                        <?php
                        if(isset($mysqli,$_POST['submit'])){
                        $employee_id = mysqli_real_escape_string($mysqli,$_POST['employee_id']);
                        $comp1 = mysqli_real_escape_string($mysqli,$_POST['comp1']);
                        $p1 = mysqli_real_escape_string($mysqli,$_POST['p1']);
                        $comp2 = mysqli_real_escape_string($mysqli,$_POST['comp2']);
                        $p2 = mysqli_real_escape_string($mysqli,$_POST['p2']);
                        $comp3 = mysqli_real_escape_string($mysqli,$_POST['comp3']);
                        $p3 = mysqli_real_escape_string($mysqli,$_POST['p3']);
                        $comp4 = mysqli_real_escape_string($mysqli,$_POST['comp4']);
                        $p4 = mysqli_real_escape_string($mysqli,$_POST['p4']);
                        $comp5 = mysqli_real_escape_string($mysqli,$_POST['comp5']);
                        $p5 = mysqli_real_escape_string($mysqli,$_POST['p5']);
                        if($_SESSION['permission']==2 or $_SESSION['permission']==3){
                        $comp6 = mysqli_real_escape_string($mysqli,$_POST['comp6']);
                        $p6 = mysqli_real_escape_string($mysqli,$_POST['p6']);
                        $comp7 = mysqli_real_escape_string($mysqli,$_POST['comp7']);
                        $p7 = mysqli_real_escape_string($mysqli,$_POST['p7']);
                        }
                        $c_evaluado = mysqli_real_escape_string($mysqli,$_POST['c_evaluado']);
                        $as1 = rand(10,1000);$case_num1 = date("Y/m/d").'.'.$as1;
                        $as2 = rand(10,1000); $case_num2 = date("Y/m/d").'.'.$as2;
                        $as3 = rand(10,1000);$case_num3 = date("Y/m/d").'.'.$as3;
                        $as4 = rand(10,1000);$case_num4 = date("Y/m/d").'.'.$as4;
                        $as5 = rand(10,1000);$case_num5 = date("Y/m/d").'.'.$as5; 
                        $as6 = rand(10,1000);$case_num6 = date("Y/m/d").'.'.$as6;  
                        $as7 = rand(10,1000); $case_num7 = date("Y/m/d").'.'.$as7; 
                        if($_SESSION['permission']==1){       
                        $estado=(3);}
                        if($_SESSION['permission']==2  or $_SESSION['permission']==3){       
                            $estado=(4);}
                        $periodo2=mysqli_real_escape_string($mysqli,$_POST['periodo2']);
                        $t1=("Orientación a resultados"); 
                        $t2=("Manejo del cambio"); 
                        $t3=("Actuar con integridad"); 
                        $t4=("Influencia"); 
                        $t5=("Trabajo en equipo"); 
                        $t6=("Liderazgo"); 
                        $t7=("Desarrollo de personal y de talento");  
                          //validacion de competencias  actuales
                          $sql = "SELECT COUNT(ID) as total  FROM competencias WHERE employee_id='$users'  ";
                          $result = mysqli_query($mysqli, $sql);

                          while ($a = mysqli_fetch_assoc($result)){
                          if($a['total']  > $max){

                              echo'<script type="text/javascript">
                              alert("Ya has enviado tus competencias a validacion anteriormente");
                              </script>';
                             
                          }else{
                           
                            $sqlTaru = "INSERT INTO competencias(employee_id,comp1,p1,estado,periodo2,tipo,case_num,c_evaluado)
                            VALUES('$employee_id','$comp1','$p1','$estado','$periodo2','$t1','$case_num1','$c_evaluado'),
                                  ('$employee_id','$comp2','$p2','$estado','$periodo2','$t2','$case_num2','$c_evaluado'),
                                  ('$employee_id','$comp3','$p3','$estado','$periodo2','$t3','$case_num3','$c_evaluado'),
                                  ('$employee_id','$comp4','$p4','$estado','$periodo2','$t4','$case_num4','$c_evaluado'),
                                  ('$employee_id','$comp5','$p5','$estado','$periodo2','$t5','$case_num5','$c_evaluado')";
                            $resTaru = mysqli_query($mysqli,$sqlTaru);
                            $sqlTaru2 = "INSERT INTO historico_comp(employee_id,comp1,p1,estado,periodo2,tipo,case_num,c_evaluado)
                            VALUES('$employee_id','$comp1','$p1','$estado','$periodo2','$t1','$case_num1','$c_evaluado'),
                                  ('$employee_id','$comp2','$p2','$estado','$periodo2','$t2','$case_num2','$c_evaluado'),
                                  ('$employee_id','$comp3','$p3','$estado','$periodo2','$t3','$case_num3','$c_evaluado'),
                                  ('$employee_id','$comp4','$p4','$estado','$periodo2','$t4','$case_num4','$c_evaluado'),
                                  ('$employee_id','$comp5','$p5','$estado','$periodo2','$t5','$case_num5','$c_evaluado')";
                            $resTaru2 = mysqli_query($mysqli,$sqlTaru2); 
                            
                            if($_SESSION['permission']==2 or $_SESSION['permission']==3){
                                $sqlTa = "INSERT INTO competencias(employee_id,comp1,p1,estado,periodo2,tipo,case_num,c_evaluado)
                                VALUES ('$employee_id','$comp6','$p6','$estado','$periodo2','$t6','$case_num6','$c_evaluado'),
                                  ('$employee_id','$comp7','$p7','$estado','$periodo2','$t7','$case_num7','$c_evaluado')";
                                $resTa = mysqli_query($mysqli,$sqlTa);
                                $sqlTa2 = "INSERT INTO historico_comp(employee_id,comp1,p1,estado,periodo2,tipo,case_num,c_evaluado)
                                VALUES ('$employee_id','$comp6','$p6','$estado','$periodo2','$t6','$case_num6','$c_evaluado'),
                                  ('$employee_id','$comp7','$p7','$estado','$periodo2','$t7','$case_num7','$c_evaluado')";
                                $resTa2 = mysqli_query($mysqli,$sqlTa2);
                                    
                            if($resTaru2==1 or $resTa2 ==1){
                                ?>
                                <div class="alert alert-warning sammac animated shake" id="sams1">
                                  <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong> ¡Listo! </strong><?php echo'has envido tus competencias a validacion con exito';?></div>
                                <?php
                            } 
                        } 
                    } 
                }
            }?>
               
<div class="row">
<div class="col-md-12">
<div class="panel panel-default sammacmedia">
        <div class="panel-heading">Autoevaluación de comtepencias</div>
    <div class="panel-body">
        <form method="post" action="competencias.php"  autocomplete="off">
        <input type="hidden" value="<?=$eprow['username'];?>" name="employee_id">
 <input type="hidden" value="<?=$eprow4['fechai']," ", $eprow4['fechaf']," ",
  $eprow4['type'];?>" name="periodo2">
    <div class="row form-group">
        <div class="col-lg-12">
         <input type="text" class="form-control"  value="<?php echo 'Métrica de Evaluación: 
|    1  Insatisfactorio  
         |  2  Necesita desarrollo
         |  3  Efectivo y esperado 
         |  4  Excelente  
         |  5  Sobresaliente'?>" readonly>
        </div> 
        <div class="col-lg-10">
        <br>
        <label>Competencia </label>
         <input type="text" class="form-control" value="<?php echo 'Orientación a resultados'?>" readonly>
        </div>  
        <div class="col-lg-10">
        <textarea class="form-control" name="comp1" placeholder="Justifica aqui tu puntuación" required></textarea>
        </div>
        <div class="col-lg-2">
        <label>Puntuacion</label>
        <div >
        <select  class="form-control" name="p1" required>
            <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option>
             </select>
        </div>
        </div>
        <div class="col-lg-10">
        <br>
         <input type="text" class="form-control"  value="<?php echo 'Manejo del Cambio'?>" readonly>
        </div>  
        <div class="col-lg-10">
        <textarea class="form-control" name="comp2" placeholder="Justifica aqui tu puntuación" required></textarea>
        </div>
        <div class="col-lg-2">
        <label>Puntuacion%</label>
        <div >
        <select  class="form-control" name="p2" required>
            <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option>
             </select>
        </div>
        </div>
        <div class="col-lg-10">
        <br>
         <input type="text" class="form-control"  value="<?php echo 'Actuar con integridad'?>" readonly>
        </div>  
        <div class="col-lg-10">
        <textarea class="form-control" name="comp3"placeholder="Justifica aqui tu puntuación" required></textarea>
        </div>
        <div class="col-lg-2">
        <label>Puntuacion</label>
        <div >
        <select  class="form-control" name="p3" required>
            <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option>
             </select>
        </div>
        </div>
        <div class="col-lg-10">
        <br>
         <input type="text" class="form-control"  value="<?php echo 'Influencia'?>" readonly>
        </div>  
        <div class="col-lg-10">
        <textarea class="form-control" name="comp4" placeholder="Justifica aqui tu puntuación" required></textarea>
        </div>
        <div class="col-lg-2">
        <label>Puntuacion</label>
        <div >
        <select  class="form-control" name="p4" required>
            <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option>
             </select>
        </div>
        </div>
        <div class="col-lg-10">
        <br>
         <input type="text" class="form-control"  value="<?php echo 'Trabajo en equipo'?>" readonly>
        </div>  
        <div class="col-lg-10">
        <textarea class="form-control" name="comp5" placeholder="Justifica aqui tu puntuación" required></textarea>
        </div>
        <div class="col-lg-2">
        <label>Puntuacion</label>
        <div >
        <select  class="form-control" name="p5" required>
            <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option>
             </select>
        </div>
        </div>
                <?php
                if($_SESSION['permission']==2 or $_SESSION['permission']==3  or $_SESSION['permission']==4 ){
                ?>
                 <div class="col-lg-10">
        <br>
         <input type="text" class="form-control"  value="<?php echo 'Liderazgo'?>" readonly>
        </div>  
        <div class="col-lg-10">
        <textarea class="form-control" name="comp6" placeholder="Justifica aqui tu puntuación" required></textarea>
        </div>
        <div class="col-lg-2">
        <label>Puntuacion</label>
        <div >
        <select  class="form-control" name="p6" required>
            <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option>
             </select>
        </div>
        </div>
        <div class="col-lg-10">
        <br>
         <input type="text" class="form-control"  value="<?php echo 'Desarrollo de personal y de talento'?>" readonly>
        </div>  
        <div class="col-lg-10" >
        <textarea class="form-control" name="comp7" placeholder="Justifica aqui tu puntuación" required></textarea>
        </div>
        <div class="col-lg-2">
        <label>Puntuacion</label>
        <div >
        <select  class="form-control" name="p7" required>
            <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option>
             </select>
        </div>
        </div>
        <?php } ?>
        <div class="col-lg-12">
        <br>
         <input type="text" class="form-control"  value="<?php echo 'Comentarios sobre la evaluación'?>" readonly>
        </div>  
        <div class="col-lg-12" >
        <textarea class="form-control" name="c_evaluado" placeholder="Ingresa un comentario sobre la evaluación" required></textarea>
        </div>
            <div class="row">
            <div class="col-md-6">
            <label></label>
              <button type="submit" name="submit" class="btn btn-sam animated tada navbar-btn">
              <span class="fa fa-plus"></span> Enviar Competencias</button>  
            </div>
            </div>
        </form>

        </div>
</div>
</div>
<?php }?> 	 
    <div class="line"></div>
                <footer>
            <p class="text-center">
            HGZ hailglez@gmail.com &copy;<?php echo date("Y ");?>Copyright. All Rights Reserved.           </p>
            </footer>
            </div>
            
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
    </body>
</html>