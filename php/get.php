<?php
    $hostname = "192.168.64.2";
    $username = "anand";
    $password = "12345678";
    $databaseName = "covid_expert";
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);

    $query1 = "SELECT svg_code FROM maps ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($connect, $query1);
    $row = mysqli_fetch_array($result);

    $query2 = "SELECT * FROM quarantine_centres";
    $quarantine_result = mysqli_query($connect, $query2);

    // $get_centre_id = " ";
    // echo "hey";
    // echo $get_centre_id;
    // $query3 = "SELECT * FROM quarantine_centres WHERE id=$get_centre_id";
    // $update_result = mysqli_query($connect, $query3);
?>