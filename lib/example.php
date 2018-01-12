<?php
error_reporting(0);
// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.
$host = "localhost";
$user = "root";
$pass = "";
$database = "num_list";

$connect= mysqli_connect($host,$user,$pass);
mysqli_select_db($database ,$connect);


// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}

if ($input['action'] === 'edit') {
    $mysqli->query("UPDATE users SET username='" . $input['username'] . "', email='" . $input['email'] . "', avatar='" . $input['avatar'] . "' WHERE id='" . $input['id'] . "'");
} else if ($input['action'] === 'delete') {
    $mysqli->query("UPDATE users SET deleted=1 WHERE id='" . $input['id'] . "'");
} else if ($input['action'] === 'restore') {
    $mysqli->query("UPDATE users SET deleted=0 WHERE id='" . $input['id'] . "'");
}

mysqli_close($mysqli);

echo json_encode($input);
