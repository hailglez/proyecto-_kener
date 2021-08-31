<?php
require_once('includes/session.php');
require_once('includes/conn.php');



$sqlA =mysqli_query($mysqli,"SELECT * FROM users WHERE username='{$_SESSION['username']}'");
$eprow=mysqli_fetch_array($sqlA);
$users=$eprow['username'];
$max="1000"; 




$sql = "SELECT SUM(porcentaje) as total  FROM cases WHERE employee_id='$users'  ";
$result = mysqli_query($mysqli, $sql);
while ($a = mysqli_fetch_assoc($result)){
if($a['total'] <= $max){
echo "es correcto el porcentaje";
echo $a['total'];
echo $a['total'] + $max;
}
else{ 
    echo'<script type="text/javascript">
    alert("Porcentaje Superado, Revisa la distribucion de tus objetivos");
    window.location.href="test.php";
    </script>'; 
echo $a['total'];
}
}

?>

<?php
$sqlb = "SELECT users.name, cases.employee_id, case_num, surname,  notes, calificaciona, justificacion,
calificacionm, justificacionm FROM users INNER JOIN cases ON users.username=cases.employee_id ";
$resultado = mysqli_query($mysqli, $sqlb);
?>

<table class="table">
  <thead class="thead-dark">
    <tr>
                <th>No</th>
                  <th> Número de caso </th>
                    <th> Identificación del empleado </th>
                    <th> Objetivo </th>
                    <th> AutoEvaluacion </th>
                    <th> Comentarios </th>
                    <th> Evaluacion Medio Año </th>
                    <th> Comentarios </th>
                    <th> Estatus </th>
                    <th> Acción </th>
    </tr>
  </thead>
  <tbody>
    <?php $n=0; while($row = mysqli_fetch_array($resultado)){ $n++;?>
    <tr>
      <td class="text-center"><?php echo $n; ?></td>
      <td class="text-center"><?php echo $row["case_num"]; ?></td>
      <td class="text-center"><?php echo $row["name"]; 
      echo'<br>'; echo $row["surname"];echo'<br>'; echo $row["employee_id"]; ?></td>
      <td class="text-center"><?php echo $row["notes"]; ?></td>
      <td class="text-center"><?php echo $row["calificaciona"]; ?></td>
      <td class="text-center"><?php echo $row["justificacion"]; ?></td>
      <td class="text-center"><?php echo $row["calificacionm"]; ?></td>
      <td class="text-center"><?php echo $row["justificacionm"]; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<!-- radio button con input mostra o ocultar -->

<?php
$sql = "SELECT id_cliente, cliente, nombre 
            FROM clientes";
    $result = $mysqli->query($sql);                  
    if ($result) {
            
    while($row = $result->fetch_assoc()) {    
    $apellido=$row['cliente'];
    $nombre=$row['nombre'];
    echo $apellido ."<br>";
}
}
$contador = count($row["id_cliente"]);                
if ($contador > 0) {               //Si tengo 1 registro o mas
for ($i=0; $i<$contador; $i++) {  // Hago un FOR cuento todos los registros de la consulta
$apellido = $row["cliente"];
$nombre = $row["nombre"];
//Inserto los registros en otra tabla
}}
$insercion="insert into cale (apellido, nombre) values ('$apellido', '$nombre')";
if ($mysqli->query($insercion)) {
    echo "Se creo una nueva carga";
} else {
    echo "Error: " . $insercion . "<br>" . mysqli_error($mysqli);
}
mysqli_close($mysqli);
?>

<html>
<head>
<script type="text/javascript">
function mostrar(dato) {
  if (dato == "1") {
    document.getElementById("nombre").style.display = "block";
    document.getElementById("apellidos").style.display = "none";
    document.getElementById("edad").style.display = "none";
  }
  if (dato == "2") {
    document.getElementById("nombre").style.display = "none";
    document.getElementById("apellidos").style.display = "none";
    document.getElementById("edad").style.display = "none";
  }
  if (dato == "3") {
    document.getElementById("nombre").style.display = "none";
    document.getElementById("apellidos").style.display = "none";
    document.getElementById("edad").style.display = "block";
  }
}
</script>
</head>
<body>
<div class="row">
  <div class="col-md-5">
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="form-group" id="opciones">
        <label for="">Opciones:</label>
        <input type="radio" name="opc" value="1" onchange="mostrar(this.value);">Solo nombre
        <input type="radio" name="opc" value="2" onchange="mostrar(this.value);">Solo apellidos
        <input type="radio" name="opc" value="3" onchange="mostrar(this.value);">Solo edad
      </div>
      <div class="form-group" id="nombre" style="display:none;">
        <label for="">Nombre:</label>
        <input type="text" class="form-control" name="nombre">
      </div>
      <div class="form-group" id="apellidos" style="display:none;">
        <label for="">Apellidos:</label>
        <input type="text" class="form-control" name="apellidos">
      </div>
      <div class="form-group" id="edad" style="display:none;">
        <label for="">Edad:</label>
        <input type="text" class="form-control" name="edad">
      </div>
    </form>
  </div>
</div>
</body>
</html> 

