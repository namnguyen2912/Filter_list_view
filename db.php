<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "num_list";

$connect= mysqli_connect($host,$user,$pass);
mysqli_select_db($database ,$connect);




function InsertInTable($table,&$fields){
    $col = "insert into $table (`".implode("` , `",array_keys($fields))."`)";
    $val = " values('";
    
    foreach($fields as $key => $value) {
        $fields[$key] = mysqli_escape_string($value);
    }
    
    $val .= implode("' , '",array_values($fields))."');";
    
    $fields = array();
    return;
}


function UpdateTable($table,&$fields,$condition) {
    
    $sql = "update $table set ";
    foreach($fields as $key => $value) {
        $fields[$key] = " `$key` = '".mysqli_escape_string($value)."' ";
    }
    $sql .= implode(" , ",array_values($fields))." where ".$condition.";";
    $fields = array();
}


function SelectTableRecords($query){
    $result = mysqli_query ($query);
    $count = 0;
    $data = array();
    while ( $row = mysqli_fetch_array($result)){
        $data[$count] = $row;
        $count++;
    }
    return $data;
}
function DeleteRecord($query){
    $result = mysqli_query ($query); 
    return true;
}

