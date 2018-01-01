<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	//echo $username . " = " . $password;
	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

	$result = $db->query($sql);

	if($result->num_rows > 0){
		$user = $result->fetch_assoc();
		$_SESSION['user_id'] = $user['id'];
		$_SESSION['username'] = $user['username'];
		$_SESSION['full_name'] = $user['first_name'] . ' ' . $user['last_name'];
		header("Location: index.php");
		die();
	}
	else{
		header("Location: login.php?msg=Invalid login!");
		die();	
	}
}