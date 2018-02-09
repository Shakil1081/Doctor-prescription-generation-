<?php
include('db.php');
if (isset($_POST['id'])){
$id = mysqli_real_escape_string($conn,$_POST['id']);
}
if (isset($_POST['name'])){
  $name = mysqli_real_escape_string($conn,$_POST['name']);
}
if (isset($_POST['comment'])){
  $comment = mysqli_real_escape_string($conn,$_POST['comment']);
}

if($id !== 0){
	$conn = new mysqli($servername, $username, $password,$dbname );
	$sql = 'UPDATE sick_list SET name ="'. $name.'", comment = "'.$comment.'" WHERE sick_list.id = "'.$id.'";';
	echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
	
		}
?>		
