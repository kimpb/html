<?php 
    $con = mysqli_connect("127.0.0.1", "root", "123123", "smartlock");
    mysqli_query($con,'SET NAMES utf8');

    $id = $_POST["id"];
    $pw = $_POST["pw"];
    $name = $_POST["name"];
    $secondpw = $_POST["secondpw"];


    //먼저 비밀번호 솔팅 하기
    $salted1 = "KAUCapstonedesign".$pw."SmartLock";
    $salted2 = "KAUCapstonedesign".$secondpw."secondpw";


    //비밀번호 해시처리하기
    $hashedpw = hash('sha512', $salted1);
    $hashed2ndpw = hash('sha512', $salted2);

    $statement = mysqli_prepare($con, "INSERT INTO USER VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($statement, "ssss", $id, $hashedpw, $name, $hashed2ndpw);
    mysqli_stmt_execute($statement);


    $response = array();
    $response["success"] = true;
 
    echo json_encode($response);
?>
