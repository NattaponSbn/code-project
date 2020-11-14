<?php
    $datadb = "projectdb";
    $servername = "localhost";
    $username = "root";
    $password = "";

    // $datadb = "ictthesis";
    // $servername = "localhost";
    // $username = "ictthesis";
    // $password = "ictthesis@2";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $datadb);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    // echo "Connected successfully";
?>