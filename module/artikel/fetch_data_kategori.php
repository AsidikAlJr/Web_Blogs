<?php
	include_once(__DIR__ .'/config/koneksi.php');
	// include_once '../../helper.php';

	$query = 'SELECT * FROM kategori';
	$connect = new connectionDB;
	$getConnect = $connect->getConnection();
	$statement = $getConnect->prepare($query);
	$statement->execute();
	$kategori = $statement->fetchAll();