<?php
include('db.php');

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{


if (isset($_POST['ids'])){
$id = mysqli_real_escape_string($conn,$_POST['ids']);
}
if (isset($_POST['name'])){
$name = mysqli_real_escape_string($conn,$_POST['name']);
}
if (isset($_POST['age'])){
$age = mysqli_real_escape_string($conn,$_POST['age']);
}
if (isset($_POST['sex'])){
$sex = mysqli_real_escape_string($conn,$_POST['sex']);
}
if (isset($_POST['status'])){
$status = mysqli_real_escape_string($conn,$_POST['status']);
}
if (isset($_POST['phone'])){
$phone = mysqli_real_escape_string($conn,$_POST['phone']);
}
if (isset($_POST['email'])){
$email = mysqli_real_escape_string($conn,$_POST['email']);
}
if (isset($_POST['adddate'])){
$adddate = mysqli_real_escape_string($conn,$_POST['adddate']);
}
if (isset($_POST['note'])){
$note = mysqli_real_escape_string($conn,$_POST['note']);
}
if (isset($_POST['adddate'])){
$adddate = mysqli_real_escape_string($conn,$_POST['adddate']);
}
$sql ='UPDATE patient SET name = "'.$name.'", sex = "'.$sex.'", status= "'.$status.'", note = "'.$note.'", phone = "'.$phone.'", email = "'.$email.'" WHERE patient.id ="'.$id.'";';
echo $sql;
if ($conn->query($sql) === TRUE) {
echo "Record updated successfully";
} else {
echo "Error updating record: " . $conn->error;
}


}else{
	
}
?>		
