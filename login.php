<?php include('db.php'); ?>
<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect($servername, $username, $password,$dbname ) or die($link);
// To protect MySQL injection for Security purpose
$username = stripslashes($_POST['username']);
$password = stripslashes($_POST['password']);

$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['password']);
// Selecting Database
$db = mysqli_select_db($connection, "asd_doct");
 $stmt = mysqli_prepare($connection, "SELECT * FROM `login` WHERE username = ? AND password = ?");
  mysqli_stmt_bind_param($stmt, "ss", $_POST['username'], $_POST['password']);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  $count = mysqli_stmt_num_rows($stmt);
if ($count == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: dashbord.php"); // Redirecting To Other Page
echo "success";
} else {
$error = "Username or Password is invalid";
}
mysqli_close($connection); // Closing Connection
}
}
?>