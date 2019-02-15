<?php

	define('BASE_PATH', 'http://localhost/Artikel/');

	function getKategori($connection, $id)
	{
		$query = 'SELECT * FROM artikel WHERE kategori_id = :id';
		$connect = $connection->getConnection();
		$statement = $connect->prepare($query);
		$statement->execute(
			[
				'id' => $id
			]
		);
		return $statement->fetchAll();
	}