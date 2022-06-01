<?php 

function uidExists($con, $username, $email){
	$sql = "SELECT * FROM users WHERE username = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($con);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header ("location: http://localhost/YAZWarehouse/view/login.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);
	if ($row = mysqli_fetch_assoc($resultData)){
		return $row;
	}
	else {
		$result = false;
		return $result;
	}
	mysqli_stmt_close($stmt);
}

function emptyInputLogin($username, $pwd) {
	$result = 0;
	 
	if (empty($username) || empty($pwd)) {
		$result = true; 
	}
	else {
		$result = false; 
	}
	return $result; 
}


function loginUser($con, $username, $pwd) {
	$uidExists = uidExists($con, $username, $username);

	if ($uidExists === false) {
		header ("location: http://localhost/YAZWarehouse/view/login.php?error=wronglogin");
		exit();
	}

	$pwdHashed = $uidExists["password"];
	$hashedPwd = password_hash($pwdHashed, PASSWORD_DEFAULT);
	$checkPwd = password_verify($pwd, $hashedPwd);

	if ($checkPwd === false){
		header("location: http://localhost/YAZWarehouse/view/login.php?error=wrongpassword");
		exit();

	}
	else if ($checkPwd === true) {
		session_start();
		$_SESSION["id"] = $uidExists["id"];
		$_SESSION["username"] = $uidExists["username"];
		$_SESSION["Role"] = $uidExists["Role"];

		if ($_SESSION["Role"]=='Admin'){
			header("location:http://localhost/YAZWarehouse/view/HOMEPAGE.php");
		exit();

		} 
		else if ($_SESSION["Role"]=='CLIENT') {
			header("location:http://localhost/YAZWarehouse/view/HOMEPAGE.php");
		exit();
		}

		
		

	}
}