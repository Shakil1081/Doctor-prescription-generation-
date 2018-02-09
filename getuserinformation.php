<?php

ini_set('display_errors', 1);
error_reporting(E_ALL); 

include('db.php');

if (isset($_POST['ids'])) {$id = $_POST['ids'];}
if (isset($_POST['table'])) { $str = $_POST['table'];}
//$sql = SELECT * FROM patient WHERE id=39;
$sql = "select * from patient where id='".$id."'";
$conn = new mysqli($servername, $username, $password,$dbname );


$result =  mysqli_query($conn,$sql) or die
("Error in Selecting " . mysqli_error($connection));
$rows = array();
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
echo json_encode($rows);
?>