<?php 
    require('dbconnect.php');

    $project_name = $_POST["project_name"];
    $keyword_project = $_POST["keyword_project"];
    $des_project = $_POST["des_project"];
    $type_project = $_POST["type_project"];
    $genre_project = $_POST["genre_project"];
    $category_project = $_POST["category_project"];
    session_start();
    $userid = $_SESSION['usersid'];
    $sql = "INSERT INTO addproject (project_name, keyword_project, des_project, type_project, genre_project, category_project, users_id)
        VALUES ('$project_name', '$keyword_project', '$des_project', '$type_project', '$genre_project', '$category_project', '$userid')";
    
?>