<?php 
      require_once('includes/conn.php');
      
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Cambio de Contraseña</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/awesome/font-awesome.css">
        <link rel="stylesheet" href="assets/css/animate.css">
    </head>
    <body>
    <div clas="col-md-12">
                    <img src="assets/image/smmk.jpg" class="img-thumbnail">
                    </div>
                    <div class="line"></div>
                                                  
                            <?php
                            if(isset($mysqli,$_POST['submit'])){
                            $token =mysqli_real_escape_string($mysqli,$_POST['token']);
                            $password =mysqli_real_escape_string($mysqli,$_POST['password']);
                            $cpassword =mysqli_real_escape_string($mysqli,$_POST['cpassword']);
                            $sqlE1 =mysqli_query($mysqli,"SELECT * FROM users WHERE employee_id = '$token' ");
                            $eprow2=mysqli_fetch_array($sqlE1);
                            $reintok=(0);
                                if($eprow2['employee_id']!=$token){
                                  ?>
                                <div class="alert alert-danger samuel animated shake" id="sams1">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong> Error! </strong><?php echo'Lo Sentimos el codigo es incorrecto, Verifica tu codigo';?></div>
                                    <?php   
                                }else{
                                    if($password!=$cpassword){
                                     ?>
                                <div class="alert alert-danger samuel animated shake" id="sams1">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong> Error! </strong><?php echo'Verifica la nueva contraseña y la confirmacion no coinciden';?></div>

                                    <?php      
                                    }else{
                                      $password =md5($cpassword);  
                                $sqliU ="UPDATE users SET employee_id='$reintok', password='$password' WHERE employee_id='$token'";
                                $res = mysqli_query($mysqli,$sqliU);
                                if($res==1){
                                    ?>
                                <script type="text/javascript">
                                    alert("Perfecto, cambiaste tu contraseña con exito");
                                    window.location.href='../index.php';
                                    </script>';

                                    <?php
                                }
                                }
                                }
                            }
                        ?>
           


    <div class="col-md-4">
    <div class="panel panel-default sammacmedia">
            <div class="panel-heading">Cambio de Contraseña</div>
        <div class="panel-body">
            <form method="post" action="token.php">
        <div class="row form-group">
          <div class="col-lg-12">
            <label>Ingresa tu Código  </label>
              <input type="password" class="form-control" name="token" placeholder="código enviado a tu correo de 4 dígitos eje: 1234" required>
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
		
                <div class="line"></div>
                <footer>
            <p class="text-center">
          HGZ &copy;<?php echo date("Y ");?>Copyright. All Rights Reserved.   
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
