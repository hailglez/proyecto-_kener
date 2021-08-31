<?php require_once('includes/session.php');
      require_once('includes/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Agregar Objetivos</title>

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
                    <h3>FORMULA KENER</h3>
                    <strong> </strong>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="dashboard.php">
                            <i class="fa fa-th"></i>
                           Dashboard
                        </a>
                    </li>
                    <?php
                    if($_SESSION['permission']==1 or $_SESSION['permission']==2 or $_SESSION['permission']==3){
                        
                        ?>
                        <li class="active">
                        <a href="invest.php">
                                <i class="fa fa-link"></i>
                                Generar Objetivos
    
                            </a>
                          
                        </li>
                        <?php }?>
                        
                        <li>
                        <a href="e_objetivos.php">
                                <i class="fa fa-plus"></i>
                             Editar Objetivos 
                            </a>
                            
                        </li>
                        <li>
                            <a href="Objetivos.php">
                                <i class="fa fa-link"></i>
                                Ver Ojetivos
    
                            </a>
                        </li>
                                  <?php
                    if($_SESSION['permission']==1 or $_SESSION['permission']==2 ){
                        
                    
                    ?>
                    <li>
                        <a href="v_issue.php">
                            <i class="fa fa-table"></i>
                            Ver Periodos

                        </a>
                    </li>
                    <?php }?>
                             <?php
                    if($_SESSION['permission']==1 or $_SESSION['permission']==2 ){
                        
                    
                    ?>
                    <li>
                        <a href="all_employees.php">
                            <i class="fa fa-table"></i>
                           Todos los Empleados

                        </a>
                    </li>
                    <li>
                        <a href="a_users.php">
                            <i class="fa fa-user"></i>
                            Añadir Usuarios

                        </a>
                    </li>
                    
                    <li>
                        <a href="v_users.php">
                            <i class="fa fa-table"></i>
                            Ver Usuarios

                        </a>
                    </li>
                    <?php }?>
                    <li>
                        <a href="settings.php">
                            <i class="fa fa-cog"></i>
                            Ajustes
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">
             
                <div clas="col-md-12">
                    <img src="assets/image/ssm.jpg" class="img-thumbnail">
                    </div>
         
                
                <nav class="navbar navbar-default sammacmedia">
                    <div class="container-fluid">

                        <div class="navbar-header" id="sams">
                            <button type="button" id="sidebarCollapse" id="makota" class="btn btn-sam animated tada navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Menu</span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right  makotasamuel">
                                <li><a href="#"><?php require_once('includes/name.php');?></a></li>
                                <li ><a href="logout.php"><i class="fa fa-power-off"> Cerrar sesión</i></a></li>
           
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="line"></div>

                            <?php
                            if(isset($mysqli,$_POST['submit'])){
                            $employee_id = mysqli_real_escape_string($mysqli,$_POST['employee_id']);
                            $severity = mysqli_real_escape_string($mysqli,$_POST['severity']);
                            $notes = mysqli_real_escape_string($mysqli,$_POST['notes']);
                            $medida1 = mysqli_real_escape_string($mysqli,$_POST['medida1']);
                            $medida2 = mysqli_real_escape_string($mysqli,$_POST['medida2']);
                            $medida3 = mysqli_real_escape_string($mysqli,$_POST['medida3']);
                            $medida4 = mysqli_real_escape_string($mysqli,$_POST['medida4']);
                            $medida5 = mysqli_real_escape_string($mysqli,$_POST['medida5']);
                            $as = rand(10,100);     
                            $case_num = date("Y/m/d").'.'.$as;
      
                  
                            $sql = "INSERT INTO cases(employee_id,severity,case_num,notes,medida1,medida2,medida3,medida4,medida5)VALUES('$employee_id','$severity','$case_num','$notes','$medida1','$medida2','$medida3','$medida4','$medida5')";
                            $results = mysqli_query($mysqli,$sql);
                        if($results==1){
                              ?>
                        <div class="alert alert-success strover animated bounce" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Successfully! </strong><?php echo'Case has successfully added';?></div>
                        <?php

                          }else{
                                ?>
                        <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Danger! </strong><?php echo'OOPS something went wrong';?></div>
            
                        <?php    
                          }      
                
            }
                
                ?>
		<div class="panel panel-default sammacmedia">
            <div class="panel-heading">Agrega tu Objetivos</div>
        <div class="panel-body">
            <form method="post" action="invest.php">
        <div class="row form-group">
          <div class="col-lg-6">
            <label>Seleccione el número de empleado</label>
             <?php
                       
                    $query1 = "SELECT * FROM `employees`";
                    $result1 = mysqli_query($mysqli, $query1);
                    ?>
                    <select class="form-control" name="employee_id">
                    <?php
                     while($row1 = mysqli_fetch_array($result1)):;?>
                        <option><?php echo $row1['employee_id'];?></option>
                        <?php endwhile;
                        ?>
                       </select>
            </div>  
            <div class="col-lg-6">
            <label>Enviar a:</label>
                <select class="form-control" name="severity">
                <option>1 Evaluacion</option>
                <option>2 Evaluacion 1+1</option>  
               
                </select>
            </div>
            
          <div class="col-lg-12">
          <label>Escribe Tu Objetivo</label>
              <textarea class="form-control" id="editor" name="notes"></textarea>
            </div>  
            <div class="col-lg-6">
            <label>Medida 1</label>
              <input type="text" class="form-control" name="medida1" required>
            </div> 
            <div class="col-lg-6">
            <label>Medida 2</label>
              <input type="text" class="form-control" name="medida2"  required>
            </div>
            <div class="col-lg-6">
            <label>Medida 3</label>
              <input type="text" class="form-control" name="medida3"  required>
            </div>
            <div class="col-lg-6">
            <label>Medida 4</label>
              <input type="text" class="form-control" name="medida4"  required>
            </div>
            <div class="col-lg-6">
            <label>Medida 5</label>
              <input type="text" class="form-control" name="medida5"  required>
            </div>
           </div>
                
             
           </div>
                
                <div class="row">
                <div class="col-md-6">
                  <button type="submit" name="submit" class="btn btn-suc btn-block"><span class="fa fa-plus"></span> Añadir</button>  
                </div>
                     <div class="col-md-6">
                  <button type="reset" class="btn btn-dan btn-block"><span class="fa fa-times"></span> Cancelar</button>  
                </div>
                </div>
            </form>

            </div>
                
            
        </div>
        <!-- jQuery CDN -->
         <script src="assets/js/jquery-1.10.2.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="assets/js/bootstrap.min.js"></script>
         <script src="vendors/ckeditor/sammacmedia.js"></script>

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
              ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                console.log( editor );
		} )
                .catch( error => {
                console.error( error );
		} );
    </script>
    </body>
</html>
