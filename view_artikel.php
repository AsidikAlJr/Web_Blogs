<?php
	include_once '/config/koneksi.php';

	$query = 'SELECT * FROM artikel WHERE id=:artikel_id';
	$connect = new connectionDB::getConnection();
	$statement = $connect->prepare($query);
	$statement->execute(
		[
			'artikel_id' => $id;
		]
?>