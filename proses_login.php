<?php
	include_once 'config/koneksi.php';
	include_once 'helper.php';

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$query= "SELECT * FROM user WHERE username = :username AND password = :password";
	$connect = new connectionDB;
	$getConnect = $connect->getConnection();
	$statement = $getConnect->prepare($query);
	$statement->execute(
		[
			'username' => $username,
			'password' => $password
		]
	);
if ($statement->rowCount() == 0) {
	header("location: ".BASE_PATH. "index.php?page=form_login");
}else{
	$data = $statement->fetch();
	session_start();

	$_SESSION['id'] = $data['id'];
	$_SESSION['username'] = $data['username'];
	// var_dump($statement->fetch()["id"]); 
	header("location: ".BASE_PATH."index.php?page=admin");
}
?>