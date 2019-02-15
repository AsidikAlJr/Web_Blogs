<?php 
	include_once(__DIR__.'/config/koneksi.php');
	include_once(__DIR__.'/helper.php');

	session_start();
	$id = (int) $_POST['id'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	
	$query = 'UPDATE artikel SET title = :title, content = :content, tgl_buat = now() WHERE id = :id';
	$connect = new connectionDB;
	$getConnect = $connect->getConnection();
	$statement = $getConnect->prepare($query);
	$exec = $statement->execute(
		[
			'id' => $id,
			'title' => $title,
			'content' => $content,
		]
	);
	if ($exec) {
		header("Location: ". BASE_PATH ."index.php?page=admin");
	}else{
		header("Location: ". BASE_PATH ."index.php?page=artikel");
	}