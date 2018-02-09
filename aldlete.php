<?php
include('db.php');
$conn = new mysqli($servername, $username, $password,$dbname );
if (isset($_POST['ids'])){
    $id = mysqli_real_escape_string($conn, $_POST['ids']);             // get data
}
if (isset($_POST['table'])) {
    $str = mysqli_real_escape_string($conn, $_POST['table']);             // get data
}
require("db.php");	
$sql = "delete from $str where id='".$id."'";

if($conn->query($sql)===TRUE){
    echo $id."88";
}else{
   echo $conn->error;
}
?>
