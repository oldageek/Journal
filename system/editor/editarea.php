<?php
session_start();

require_once '../includes/mysql_connect.php';

 if (isset($_REQUEST['id'])) {

 $id = intval($_REQUEST['id']);

  $query = "SELECT * FROM article_area WHERE idarea=$id";
  $result = mysqli_query($dbc, $query) or die (mysqli_error($dbc));
  $row_area= mysqli_fetch_assoc($result);

?>


<form action="updatearea.php" method="post">
	<div class="form-group">
		<label for="area">Area</label>
		<input type="text" class="form-control" name="area" id="area" value="<?= $row_area['area'] ?>">
	</div>

	<div class="form-group">
		<label for="descripcion">Descripción</label>
		<textarea name="descripcion" id="descripcion" class="form-control" rows="5"><?= $row_area['short_description'] ?></textarea>
	</div>


	<div class="form-group text-right">
		<input type="hidden" name="submitted" value="TRUE">
		<input type="hidden" name="idarea" value="<?= $id ?>">
		<input type="submit" class="btn btn-primary" value="Editar area">
	</div>



</form>



<?php
}
?>
