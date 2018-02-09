<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$url ="http://prescription.webspreed.com";
$servername= "localhost";
$username = "webspree_doc";
$password = "v(^NWy[0dO+,";
$dbname = "webspree_asd_doct";

$connection = mysqli_connect("$servername", "$username", "$password");
// Selecting Database
$db = mysqli_select_db($connection, $dbname);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ss="select* from login where username='$user_check'";
$ses_sql=mysqli_query($connection, $ss);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
$login_id =$row['id'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>