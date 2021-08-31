
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar Registros</title>
 <!-- calendario CSS -->
 <link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css"
  rel="stylesheet" type="text/css" id="cal"/>

 <!-- Bootstrap CSS CDN -->
 <link rel="stylesheet" href="assets/css/bootstrap.min.css">
<!-- Our Custom CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/awesome/font-awesome.css">
        <link rel="stylesheet" href="assets/css/animate.css">

</head>

<body>
<div id="content">

                <nav class="navbar navbar-default sammacmedia">
                    <div class="container-fluid">

                        <div class="navbar-header">
                        <a href="dashboard.php"> <button type="button"  class="btn btn-sam animated tada navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Inicio</span>
                            </button></a>
                        </div>

                    </div>
                </nav>
<div class="panel panel-default sammacmedia">
            <div class="panel-heading"><h4>Editar Periodo</h4></div>
        <div class="panel-body">
<br><br>
<?php 
include("function.php");
$id = $_GET['id'];
select_id('periodos','id',$id);
?>
<form action="" method="post">
                        <div class="col-lg-3" >
                        <h4><label>Tipo de Periodo</label></h4>
                        <select class="form-control"  name="type"  required>
                        <option><?php echo $row->type;?></option>
                        <option>Establecimiento de Objetivos</option>
                        <option>Evaluacion Medio Año</option> 
                        <option>Evaluacion Final</option> 
                        </select>
                        </div>
                        <div class="col-lg-2">
                        <div class="row">
                            <h4><label>Fecha de inicio</label></h4>
                                <input type="date" autocomplete="off" name="fechai" value="<?php echo $row->fechai;?> " required>
                        </div>
                        </div>
                        <div class="col-lg-2">
                        <div class="row">
                            <h4><label>Fecha de cierre</label></h4>
                                <input type="date" autocomplete="off" name="fechaf"  value="<?php echo $row->fechaf;?>" required>
                        </div>
                        </div>
                        
                          
            <div class="col-lg-2">
                <h4><label><input type="radio" name="activo" value="1">Activar</label></h4>
                <h4><label><input type="radio" name="activo" value="0">Inactivar</label></h4>
            </div>
          <div class="col-lg-2">
            <input  class="btn btn-warning" type="submit" name="submit" >
            </div>
</form>
<?php
	
	if(isset($_POST['submit'])){
		$field = array("fechai"=>$_POST['fechai'], "fechaf"=>$_POST['fechaf'], "activo"=>$_POST['activo'], "type"=>$_POST['type']);
		$tbl = "periodos";
		edit($tbl,$field,'id',$id);
        header("location:periodos.php");
		
	}
?>
</div>
</body>
<script  src="assets/js/script_calendar.js"></script>
</html>