<?php
  include_once(__DIR__.'/config/koneksi.php');
  include_once(__DIR__.'/helper.php');
  
  $query = 'SELECT * FROM kategori INNER JOIN artikel ON kategori.id_kategori = artikel.kategori_id';
  $connect = new connectionDB;
  $getConnect = $connect->getConnection();
  $statement = $getConnect->prepare($query);
  $statement->execute();

  $artikel = $statement->fetchAll();

?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th scope="col">Content</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($artikel as $value): ?>
    <tr>
      <th scope="row"><?php echo $value['id']?></th>
      <td><?php echo $value['title']?></td>
      <td><?php echo $value['isi_kategori'] ?></td>
      <td><?php echo strlen($value['content']) ? substr($value['content'], 0, 50) ."..." : $value['content']?></td>
      <td>
        <a href=<?php echo BASE_PATH."index.php?page=edit&id=".(string) $value['id']?>>Edit</a>
        <label>|</label>
        <a href=<?php echo BASE_PATH.'delete.php?id='.(string) $value['id']?>>Delete</a>
      </td>
    </tr>
  <?php endforeach ?>
  </tbody>
</table>
