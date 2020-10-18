<?php 
    $datadb = "projectdb";
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $datadb);

    if(isset($_POST['query'])){
        $key1=$_POST['query'];
        $query = "SELECT name_key FROM keyword_p WHERE name_key LIKE '%$key1%";
        $result = $conn->query($query);
        if($result->num_rows>0){
            while($data_k=$result->fetch_assoc()){
                echo "<a href='#' class='list-group-item list-group-item-action border-1' style='width: 80%;'>".$data_k['name_key']."</a>";
            }
        }
        else{
            echo "<p class='list-group-item border-1'>ไม่พบคำสำคัญ</p>";
        }
    }
    elseif(isset($_POST['query2'])){
        $key2=$_POST['query2'];
        $query2 = "SELECT name_key FROM keyword_p WHERE name_key LIKE '%$key2%";
        $result = $conn->query($query2);
        if($result->num_rows>0){
            while($data_k=$result->fetch_assoc()){
                echo "<a href='#' class='list-group-item list-group-item-action border-1' style='width: 80%;'>".$data_k['name_key']."</a>";
            }
        }
        else{
            echo "<p class='list-group-item border-1'>ไม่พบคำสำคัญ</p>";
        }
    }
    elseif(isset($_POST['query3'])){
        $key3=$_POST['query3'];
        $query3 = "SELECT name_key FROM keyword_p WHERE name_key LIKE '%$key3%";
        $result = $conn->query($query3);
        if($result->num_rows>0){
            while($data_k=$result->fetch_assoc()){
                echo "<a href='#' class='list-group-item list-group-item-action border-1' style='width: 80%;'>".$data_k['name_key']."</a>";
            }
        }
        else{
            echo "<p class='list-group-item border-1'>ไม่พบคำสำคัญ</p>";
        }
    }
    elseif(isset($_POST['query4'])){
        $key4=$_POST['query4'];
        $query4 = "SELECT name_key FROM keyword_p WHERE name_key LIKE '%$key4%";
        $result = $conn->query($query4);
        if($result->num_rows>0){
            while($data_k=$result->fetch_assoc()){
                echo "<a href='#' class='list-group-item list-group-item-action border-1' style='width: 80%;'>".$data_k['name_key']."</a>";
            }
        }
        else{
            echo "<p class='list-group-item border-1'>ไม่พบคำสำคัญ</p>";
        }
    }
    
?>