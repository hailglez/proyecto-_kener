<?php
require_once('includes/session.php');

if($_SESSION['permission']==2 or $_SESSION['permission']==3){
$sqlA_1 =mysqli_query($mysqli,"SELECT * FROM users WHERE evaluador1='{$_SESSION['username']}'");
$epro_1=mysqli_fetch_array($sqlA_1);
$evaluator1=$epro_1['username'];
}if($_SESSION['permission']==2.5 or $_SESSION['permission']==3){
$sqlA_2 =mysqli_query($mysqli,"SELECT * FROM users WHERE evaluador1='{$_SESSION['username']}'");
$epro_2=mysqli_fetch_array($sqlA_2);
$evaluator2=$epro_2['username'];

}
//OBJETIVOS POR VALIDAR
$sql1 ="SELECT COUNT(IF(eva1 = '{$_SESSION['username']}' 
and (estado='2' or estado='7'), 1, NULL))  As total1 FROM cases ";
     $result1=mysqli_query($mysqli,$sql1);
     $values=mysqli_fetch_assoc($result1);
     $ppe=$values['total1'];
//OBJETIVOS TOTALES
$sql2 ="SELECT COUNT(IF( (e_id2 = '{$_SESSION['username']}'), 1, NULL))  As total2 FROM cases ";
      $result2=mysqli_query($mysqli,$sql2);
      $values=mysqli_fetch_assoc($result2);
      $total=$values['total2'];
//EN EVALUACIÓN
$sql3 ="SELECT COUNT(IF(employee_id ='{$_SESSION['username']}' and (estado= '4' or estado='5'
 or estado='6' or estado='8' or estado='9'), 1, NULL))  As total3 FROM cases ";
      $result3=mysqli_query($mysqli,$sql3);
      $values=mysqli_fetch_assoc($result3);
      $pe=$values['total3'];
// OBJETIVOS POR VALIDAR
 $sql4 ="SELECT COUNT(IF(eva1 = '{$_SESSION['username']}'
 and (estado='1'or estado= '2'or estado='7'), 1, NULL))  As total4 FROM cases ";
      $result4=mysqli_query($mysqli,$sql4);
      $values=mysqli_fetch_assoc($result4);
      $ppv=$values['total4']; 
// OBJETIVOS REPORTES DIRECTOS POR VALIDAR 
 $sq_4 ="SELECT COUNT(IF(eva1= '{$_SESSION['username']}'
 and (estado= '1' or estado='2' or estado='9'), 1, NULL))  As total_4 FROM cases ";
      $result_4=mysqli_query($mysqli,$sq_4);
      $values=mysqli_fetch_assoc($result_4);
      $ppv1=$values['total_4']; 
// OBJETIVOS 1+1 POR VALIDAR
 $sq_4 ="SELECT COUNT(IF(eva2 = '{$_SESSION['username']}'
 and (estado='3' or estado='10'), 1, NULL))  As total_h FROM cases ";
      $result_4=mysqli_query($mysqli,$sq_4);
      $values=mysqli_fetch_assoc($result_4);
      $ppv2=$values['total_h']; 
//EN VALIDACIÓN 
$sql5 ="SELECT COUNT(IF(employee_id = '{$_SESSION['username']}' and (estado= '1'or estado='2'or estado='3'), 1, NULL))  As total5 FROM cases ";
      $result5=mysqli_query($mysqli,$sql5);
      $values=mysqli_fetch_assoc($result5);
      $pv=$values['total5'];
//OBJETIVOS PENDIENTES
$sql6 ="SELECT COUNT(IF(employee_id = '{$_SESSION['username']}' and (estado= '0'  or estado='6'), 1, NULL))  As total6 FROM cases ";
      $result6=mysqli_query($mysqli,$sql6);
      $values=mysqli_fetch_assoc($result6);
      $ap=$values['total6'];
//OBJETIVOS TOTAL FULL
$sql7 ="SELECT COUNT(id) As total7 FROM cases ";
      $result7=mysqli_query($mysqli,$sql7);
      $values=mysqli_fetch_assoc($result7);
      $full=$values['total7'];
//OBJETIVOS TOTAL FULL 
$sql8 ="SELECT COUNT(IF(estado != '5' and (estado !='10'),1,NULL)) As total8 FROM cases ";
      $result8=mysqli_query($mysqli,$sql8);
      $values=mysqli_fetch_assoc($result8);
      $fulln=$values['total8'];
     
  // COMPETENCIAS PENDIENTES
  $sqlb1 = "SELECT * FROM periodos WHERE activo= '1' ORDER BY id DESC";
  $resultado1 = $mysqli->query($sqlb1);
  $trow = $resultado1->fetch_assoc();
  $ty=$trow['fechai']." ". $trow['fechaf']." ". $trow['type'];
//
  $sql90 ="SELECT COUNT(IF(employee_id = '{$_SESSION['username']}' and (periodo1= '$ty' or periodo2= '$ty') 
   and (estado= '0'), 1, NULL)) As total90 FROM historico_comp ";
  $result90=mysqli_query($mysqli,$sql90);
  $values0=mysqli_fetch_assoc($result90);
  $hcp0=$values0['total90'];
   //COMPETENCIAS TOTALES
$sql9 ="SELECT COUNT(IF(employee_id = '{$_SESSION['username']}' and (estado!= '6') and (periodo1= '$ty' or periodo2= '$ty'), 1, NULL)) As total9 FROM historico_comp ";
$result9=mysqli_query($mysqli,$sql9);
$values=mysqli_fetch_assoc($result9);
$hcp=$values['total9'];

//COMPETENCIAS POR VALIDAR
     if($_SESSION['permission']==2){
     $sql10 ="SELECT COUNT(IF(estado= '2' and (employee_id = '$evaluator1')
     and (periodo1= '$ty' or periodo2= '$ty') , 1, NULL)) As total10 FROM historico_comp ";
     $result10=mysqli_query($mysqli,$sql10);
     $values=mysqli_fetch_assoc($result10);
     $hcp1=$values['total10'];

//COMPETENCIAS PENDIENTES VALIDAR 1+1
     }if($_SESSION['permission']==3 or $_SESSION['permission']==2.5){
$sql11 ="SELECT COUNT(IF(estado= '2' and ( employee_id = '$evaluator2')
and (periodo1= '$ty' or periodo2= '$ty') , 1, NULL)) As total11 FROM historico_comp ";
$result11=mysqli_query($mysqli,$sql11);
$values=mysqli_fetch_assoc($result11);
$hcp2=$values['total11'];
     }

?>