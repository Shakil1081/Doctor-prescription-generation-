<?php
$url ="http://prescription.webspreed.com";
$servername= "localhost";
$username = "webspree_doc";
$password = "v(^NWy[0dO+,";
$dbname = "webspree_asd_doct";

// Create connection
$link = mysqli_connect($servername, $username, $password,$dbname ) or die($link);

$conn = new mysqli($servername, $username, $password,$dbname );

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo $conn->connect_error;
}

$sql = $link->query("SELECT COUNT(*) FROM sick_list");
$row = $sql->fetch_row();
$count = $row[0];

$sql = $link->query("SELECT COUNT(*) FROM patient");
$row = $sql->fetch_row();
$count1 = $row[0];

$sql = $link->query("SELECT COUNT(*) FROM patient_prescription");
$row = $sql->fetch_row();
$count2 = $row[0];
?>