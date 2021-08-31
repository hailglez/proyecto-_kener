<?php 
      require_once('includes/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Recuperacion de Contraseña</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/awesome/font-awesome.css">
        <link rel="stylesheet" href="assets/css/animate.css">
    </head>
    <body>
    <div id="content">
             
                <div clas="col-md-12">
                    <img src="assets/image/smmk.jpg" class="img-thumbnail">
                    </div>

    

                                    <?php
                if(isset($mysqli,$_POST['update'])){
                    $email = mysqli_real_escape_string($mysqli,$_POST['email']);
                    $token = rand(1000,9999);
                    $sqlA =mysqli_query($mysqli,"SELECT * FROM users WHERE email ='$email'");
                                     $eprow=mysqli_fetch_array($sqlA);
                    $email_message = "Para restablecer tu contraseña deberas ingresar el siguiente código:\n\n";
                   $email_message .= "Código: " . $token . "\n\n";
                    $email_message .= "Ingresa en la siguiente liga tu código: http://localhost/bases/sistemacompl/caaz/admin/token.php \n\n";
                    $email_message .= "Si presentas mayores inconvenientes para ingresar a tu cuenta comunicate a mesa.ayuda@kener.com.mx";
                 
                    

                    $sql_e = "SELECT * FROM users WHERE email ='$email'";
                            $res_e = mysqli_query($mysqli, $sql_e);
                            if(mysqli_num_rows($res_e) < 1){
                            ?>
                             <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Error! </strong><?php echo' No existe el correo electronico ingresado';?></div>
                        <?php    
                       }
                    
                    else{
                    $sqlTaru = "UPDATE users SET  employee_id ='$token' WHERE email='$email' ";
                    $resTaru = mysqli_query($mysqli,$sqlTaru);
                    if($resTaru==1){
                        ?>
                       <script type="text/javascript">
                                    alert("Listo, se envio un codigo a tu correo para recuperar tu contraseña");
                                    window.location.href='token.php';
                                    </script>';
                                    <?php
                    }else{
                    ?>
                <div class="alert alert-warning samuel animated shake" id="sams1">
                          <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> ¡Error! </strong><?php echo' algo salió mal';?></div>
                <?php
                    }

            ?>
<?php
if(mysqli_num_rows($res_e) < 1) {
    echo 'error';}

    else{
$email_to = "$email";
$email_subject = "Restablece tu contraseña | fórmula kener";
$email_from="mesa.ayuda@kener.com.mx";
// Ahora se envía el e-mail usando la función mail() de PHP
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to,  "=?UTF-8?B?".base64_encode($email_subject)."?=", $email_message, $headers);
}
}
}
?>
                <div class="line"></div>
                
<div class="row">
<div class="col-md-4">
    <div class="panel panel-default sammacmedia">
            <div class="panel-heading">Restablece tu contraseña</div>
        <div class="panel-body">
            <form method="post" action="forgotPass.php" >
            <div class="row form-group">
          <div class="col-lg-10">
            <label>Ingresa tu dirección de correo electrónico</label>
              <input type="email" class="form-control" name="email" placeholder="ejemplo@gmail.com"required>
            </div>  
            </div>
                <div class="row">
                <div class="col-md-12">
                  <button type="submit" name="update" class="btn btn-warning btn-block"><span class="fa fa-pencil"></span> Continuar</button>  
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
