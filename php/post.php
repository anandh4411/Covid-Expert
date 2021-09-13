<?php 
include 'get.php'; 

$hostname = "192.168.64.2";
$username = "anand";
$password = "12345678";
$databaseName = "covid_expert";
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$post = $_POST['post'];

$svg_code = $_POST['map_code'];

$centre_name = $_POST['centre_name'];
$location = $_POST['location'];
$cost = $_POST['cost'];
$total_rooms = $_POST['total_rooms'];
$available_rooms = $_POST['available_rooms'];

if ($post == "map_post"){
    $query = "INSERT INTO maps (svg_code) VALUES ('$svg_code')";
    mysqli_query($connect, $query);
    header('Location: ../admin/pages/containment-zone.php');
}
elseif ($post == "quarantine_post"){
    $query = "INSERT INTO quarantine_centres (centre_name, location, cost, total_rooms, available_rooms) 
                VALUES ('$centre_name', '$location', '$cost', $total_rooms, $available_rooms)";
    mysqli_query($connect, $query);
    header('Location: ../admin/pages/quarantine.php');
}
// elseif ($post == "quarantine_post_update"){
//     $centre_id = $_POST["centre_id"];
//     $get_centre_id = $centre_id;
//     header('Location: ../admin/pages/quarantine-update.php');
// }
elseif ($post == "quarantine_post_delete"){
    $centre_id = $_POST["centre_id"];
    $query = "DELETE FROM quarantine_centres WHERE id=$centre_id";
    mysqli_query($connect, $query);
    header('Location: ../admin/pages/quarantine.php');
}
?>