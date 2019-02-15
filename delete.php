<?php
	include_once(__DIR__.'/config/koneksi.php');
	include_once(__DIR__.'/helper.php');

	$query = 'DELETE FROM artikel WHERE id=:id';
	$connect = new connectionDB;
	$getConnect = $connect->getConnection();
	$statement = $getConnect->prepare($query);
	$statement->execute(
		[
			'id' => (int) $_GET['id']
		]
	);


	header("location: " . BASE_PATH ."index.php?page=all_artikel");


