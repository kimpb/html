<?php
	$con = mysqli_connect("127.0.0.1", "root", "123123", "smartlock");
	mysqli_query($con,'SET NAMES utf8');

	$id = $_POST["id"];
	$pw = $_POSE["pw"];

	$statement = mysqli_prepare($con, "SELECT id FROM USER WHERE id = ?");

	mysqli_stmt_bind_param($statement, "s", $id);
	mysqli_stmt_execute($statement);
	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $userID);

	$response = array();
	$response["success"] = true;

	while(mysqli_stmt_fetch($statement)){
		$response["success"] = false;
		$response["id"] = $id;
	}

	echo json_encode($response);
?>
