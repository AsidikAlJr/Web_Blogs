<?php
  include_once(__DIR__.'/config/koneksi.php');
  include_once(__DIR__.'/helper.php');

  $connect = new connectionDB;
  $query = 'SELECT * FROM artikel';
  $getConnect = $connect->getConnection();
  $statement = $getConnect->prepare($query);
  $statement->execute();

  $data = $statement->fetchAll();

  $query = 'SELECT * FROM kategori';
  $getConnect = $connect->getConnection();
  $statement = $getConnect->prepare($query);
  $statement->execute();
  $kategori = $statement->fetchAll();
  
  $kategori2 = isset($_GET['kategori']) ? getKategori($connect, $_GET['kategori']) : false;


?>
<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-5 font-italic font-weight-bold">Welcome to Articles Web</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
      <p class="lead mb-0"><a href="#" class="btn btn-primary btn-lg">Learn More</a></p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8 blog-main">
        <?php if (isset($_GET['kategori'])): ?>
          <?php foreach ($kategori2 as $value): ?>
           <div class="blog-post">
              <h2 class="blog-post-title"><?php echo $value['title'] ?></h2>
              <p class="blog-post-meta"><?php echo $value['tgl_buat'] ?> <a href="#"><?php echo $value['penulis'];?></a></p>
             <p><?php echo $value['content'] ?></p>

            </div> 
        <?php endforeach ?>  
        
        <?php else: ?>
          <?php foreach ($data as $value): ?>
            <div class="blog-post">
              <h2 class="blog-post-title"><?php echo $value['title'] ?></h2>
              <p class="blog-post-meta"><?php echo $value['tgl_buat'] ?> <a href="#"><?php echo $value['penulis'];?></a></p>

             <p><?php echo strlen($value['content']) ? substr($value['content'], 0, 50) ."..." : $value['content']?></p>
           

            </div>
            <hr>
          <?php endforeach ?>
        <?php endif ?>
      </div>

    
    <aside class="col-md-4 blog-sidebar">

          <div class="p-3">
            <h4 class="font-italic">Kategori</h4>
            <ol class="list-unstyled mb-0">
              <?php foreach ($kategori as $value): ?>
               <?php $id = (string) $value['id_kategori'];?>
              <li><a href=<?php echo BASE_PATH . "index.php?kategori=$id"?>><?php echo $value['isi_kategori'] ?></a></li>
            <?php endforeach ?>
            </ol>
          </div>
        </aside>
  </div>

