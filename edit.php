<?php
	include_once(__DIR__.'/config/koneksi.php');
	include_once(__DIR__.'/helper.php');

	$id = (int) $_GET['id'];
   
	$query = 'SELECT * FROM artikel WHERE id=:id';
	$connect = new connectionDB;
	$getConnect =  $connect->getConnection();
	$statement = $getConnect->prepare($query);
	$statement->execute(
		[
			'id' => $id
		]
	);

	$artikel = $statement->fetchAll();

?>
<div class="col-8">
	<form action="edit_artikel.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id ?>">
		<div class="form-group">
			<label>Title</label>
	   		<input type="text" class="form-control" name="title" placeholder="Title" value="<?php print $artikel[0]['title'] ?>" />
	    </div>
	    <div class="form-group">
	    	<label>Content</label>
	   		<textarea class="form-control" name="content" rows="3" ><?php print $artikel[0]['content'] ?></textarea>
	   	</div>	   	
	    <input type="submit" value="Save Changes" class="btn btn-outline-info my-2 my-sm-0">

	</form>
</div>
