<?php
	/**
	 * Koneksi Database
	 * Membuat Article Webs
	 * 30 Januari 2019
	 * Pondok Programmer
	 */
	// Untuk terhubung ke database melalui fungsi gunakan ini dan panggil fungsi getConnection di konstruktor kelas.
	class connectionDB
	{
		
		function getConnection()
		{
			$host = "localhost";
			$username = "root";
			$password = "";

			try {
					$conn = new PDO("mysql:host=$host; dbname=blog", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					return $conn;
				} catch (PDOException $e) {
					echo "ERROR : ".$e->getMessage();
				}	
		}
	}

?>