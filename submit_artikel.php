<?php
	
	include_once __DIR__.'/config/koneksi.php';
	include_once __DIR__.'/helper.php';
	
	session_start();
	$user_id = (int) $_SESSION['id'];		
	$kategori_id = (int) $_POST['kategori'];
	$title = $_POST['title'];
	$content = $_POST['content'];

	$query = 'INSERT INTO artikel (user_id, kategori_id, title, content, tgl_buat, penulis) VALUES (:user_id, :kategori_id, :title, :content, now(), :penulis)';
	$connect = new connectionDB;
	$getConnect = $connect->getConnection();
	$statement = $getConnect->prepare($query);
	$exec = $statement->execute(
		[

			'user_id' => $user_id,
			'title' => $title,
			'kategori_id' => $kategori_id,
			'content' => $content,
			'penulis' => $_SESSION['username']
		]
	);
	if ($exec) {
		header("Location: ". BASE_PATH ."index.php?page=admin");
	}else{
		header("Location: ". BASE_PATH ."index.php?page=artikel");
	}