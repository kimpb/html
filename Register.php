<?php 
    $con = mysqli_connect("127.0.0.1", "root", "123123", "smartlock");
    mysqli_query($con,'SET NAMES utf8');

    $id = $_POST["id"];
    $pw = $_POST["pw"];
    $name = $_POST["name"];
    

    $statement = mysqli_prepare($con, "INSERT INTO USER VALUES (?,?,?)");
    mysqli_stmt_bind_param($statement, "sss", $id, $pw, $name);
    mysqli_stmt_execute($statement);


    $response = array();
    $response["success"] = true;
 
    echo json_encode($response);
?>
