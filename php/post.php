<?php 
$hostname = "192.168.64.2";
$username = "anand";
$password = "12345678";
$databaseName = "covid_expert";
$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$svg_code = $_POST['map_code'];
$query = "INSERT INTO maps (svg_code) VALUES ('$svg_code')";
mysqli_query($connect, $query);
header('Location: ../admin/pages/containment-zone.php');
?>