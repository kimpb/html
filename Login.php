<?php

    $con = mysqli_connect("127.0.0.1", "root", "123123", "smartlock");
    mysqli_query($con,'SET NAMES utf8');


    $id = $_POST["id"];
    $pw = $_POST["pw"];

    
    $statement = mysqli_prepare($con, "SELECT * FROM USER WHERE id = ? AND pw = ?");
    mysqli_stmt_bind_param($statement, "ss", $id, $pw);
    mysqli_stmt_execute($statement);


    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $id, $pw, $name);

    $response = array();
    $response["success"] = false;
 
    while(mysqli_stmt_fetch($statement)) {
        $response["success"] = true;
        $response["id"] = $id;
        $response["pw"] = $pw;
        $response["name"] = $name;
    }

    echo json_encode($response);

?>
