<?php
    $hostname = "192.168.64.2";
    $username = "anand";
    $password = "12345678";
    $databaseName = "covid_expert";
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    $query = "SELECT svg_code FROM maps ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
?>