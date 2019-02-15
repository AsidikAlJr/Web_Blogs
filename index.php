<?
	require_once(__DIR__. '/config/koneksi.php');
	require_once('helper.php');
	$page=isset($_GET['page']) ? $_GET['page'] : false; 

  session_start(); // session digunakan utk menyimpan data 
  $id = isset($_SESSION['id']) ? $_SESSION['id'] : false; // isset digunakan utk mengecek apakah id ada atau tidak
  $username = isset($_SESSION['username']) ? $_SESSION['username'] : false;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Article Web</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<body>
<div class="bd-example">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href=<?php echo BASE_PATH. "index.php" ?>><strong>Articles<sub>.web</sub></strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="true" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse show" id="navbarColor01" style="">
      <ul class="navbar-nav mr-auto">
            <?php if ($id): ?>
              <li class="nav-item">
                <a class="nav-link" href=<?php echo BASE_PATH. "index.php?page=all_artikel"?>>Articles</a>
              </li>    
            <?php else: ?>
              <li class="nav-item">
    	          <a class="nav-link" href=<?php echo BASE_PATH. "index.php" ?>>Home <span class="sr-only">(current)</span></a>
    	        </li>

    	        <li class="nav-item">
    	          <a class="nav-link" href=<?php echo BASE_PATH. "index.php?page=about"?>>About</a>
    	        </li>

    	        <li class="nav-item">
    	          <a class="nav-link" href=<?php echo BASE_PATH. "index.php?page=contact"?>>Contact</a>
    	        </li>
            <?php endif ?>
      </ul>
       
        <?php
        if (!isset($_SESSION['id'])) { // jika tidak ada id maka akan menampilkan tombol sign in
          echo '<a href='. BASE_PATH. 'index.php?page=form_login class="btn btn-outline-info my-2 my-sm-0">Sign In</a>';
        } else{
          echo '<a href='. BASE_PATH. 'logout.php class="btn btn-outline-info my-2 my-sm-0">Sign Out</a>';
        }
          ?>
        
    </div>
  </nav>
</div>
<div class="container" style="margin-top:30px">
	<?php
		$fileName = "$page.php";
		if (file_exists($fileName)) {
			include_once($fileName);
		}else{
			include_once("main.php");
		}
	?>
</div>
</body>
</html>