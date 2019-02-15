<?php
	include_once(__DIR__.'/config/koneksi.php');
	include_once(__DIR__.'/helper.php');

	$query = 'SELECT * FROM kategori';
	$koneksi = new connectionDB;
	$getKoneksi = $koneksi->getConnection();
	$statement = $getKoneksi->prepare($query);
	$statement->execute();

	$dataKategori = $statement->fetchAll();

?>
<div class="col-8">
	<form action="submit_artikel.php" method="POST">
		<div class="form-group">
			<label>Title</label>
	   		<input type="text" class="form-control" name="title" placeholder="Title">
	    </div>
	    <div class="form-group">
			<label>Category</label>
	   		<select name="kategori" class="form-control" id="exampleSelect1">
	 			<?php foreach ($dataKategori as $value): ?>
	 				<option value=<?php echo $value['id_kategori'] ?>><?php echo $value['isi_kategori'] ?></option>
	 			<?php endforeach ?>
	   		</select>
	    </div>
	    <div class="form-group">
	    	<label>Content</label>
	   		<textarea class="form-control" name="content" rows="3"></textarea>
	   	</div>	   	
	    <input type="submit" name="submit" value="Create Article" class="btn btn-outline-info my-2 my-sm-0">

	</form>
</div>
