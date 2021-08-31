<?php
function db_query($query) {
    $connection = mysqli_connect("localhost","root","Soporte01","caaz");
    $result = mysqli_query($connection,$query);

    return $result;
}

function edit($periodos,$form_data,$field_id,$id){
	$sql = "UPDATE ".$periodos." SET ";
	$data = array();

	foreach($form_data as $column=>$value){

		$data[] =$column."="."'".$value."'";

	}
	$sql .= implode(',',$data);
	$sql.=" where ".$field_id." = ".$id."";
	return db_query($sql); 
}
function select_id($tblname,$field_name,$field_id){
	$sql = "Select * from ".$tblname." where ".$field_name." = ".$field_id."";
	$db=db_query($sql);
	$GLOBALS['row'] = mysqli_fetch_object($db);

	return $sql;

}
?>
