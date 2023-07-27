<?php 

require_once('db.php');

$query = "SELECT * FROM location";
$result = mysqli_query($link,$query);

//declare array
$output = array();

foreach ($result as $row) {
 array_push($output,$row);


}

// assign to json variable
$json=json_encode($output);

//declare document type to json and output json
header("Content-Type: application/json");
echo $json;

?>
