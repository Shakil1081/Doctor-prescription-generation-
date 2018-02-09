<?php
include('db.php');

if (isset($_POST['vals'])){
    $vals = mysqli_real_escape_string($conn,$_POST['vals']);             // get data
}
if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn,$_POST['id']);             // get data
}
if (isset($_POST['desc'])) {
    $desc = mysqli_real_escape_string($conn,$_POST['desc']);             // get data
}
if (isset($_POST['nots'])) {
    $nots = mysqli_real_escape_string($conn,$_POST['nots']);             // get data
}
if (isset($_POST['pdate'])) {
    $pdate = $_POST['pdate'];             // get data
}


$sql= "insert into patient_prescription (patien, disisis, notes,ccompln,pdate) ";
$sql.= "values( '$id','$desc','$nots','$vals',$pdate) ";
$result = $conn->query($sql);
$last_id = $conn->insert_id;
echo json_encode($last_id);
$conn->close();
?>