<?php
session_start();

require_once '../includes/mysql_connect.php';

 if (isset($_REQUEST['id'])) {

 $id = intval($_REQUEST['id']);

 $query = "SELECT * FROM article WHERE idarticle=$id";
 $result = mysqli_query($dbc, $query) or die (mysqli_error($dbc));
 $row_article = mysqli_fetch_assoc($result);

 ?>
 <div class="table-responsive">
 <table class="table table-striped table-bordered">
  <tr>
 <th>Title</th>
 <td><?=  $row_article['title']; ?></td>
 </tr>


<tr>
	<th>Area</th>

	<?php 
	$area  = $row_article['area'];
	$query = "SELECT area FROM article_area WHERE idarea=$area";
	$result = mysqli_query($dbc, $query);

	$row_area = mysqli_fetch_assoc($result);

	?>

	<td><?= $row_area['area'] ?></td>
</tr>


 <tr>
 <th>Status</th>
 <?php 

 $status = $row_article['status'];
?>


<?php if ($status == 1) { ?>
<td><span class="label label-warning">Waiting to accept...</span></td>
<?php   }elseif ($status == 2) {  ?>
<td><span class="label label-info">Review in progress</span></td>
<?php  }elseif ($status == 3) {  ?>
<td><span class="label label-info">Editor Review in progress </span></td>
<?php  }elseif ($status == 4) {  ?>
<td><span class="label label-success">Evaluated and published </span></td>
<?php  }elseif ($status == 5) {  ?>
<td><span class="label label-danger">Rejected </span></td>
<?php }else{  ?>
<td><p class="text-danger">Status Error, contact to the admin...</p></td>
<?php } ?>

 </tr>

 <tr>
<th>Current Reviewer</th>
<?php 
	
	$query = "SELECT rol.name as name, rol.lastName as lastName, rol.familyName as familyName FROM rol INNER JOIN rol_has_article on rol.idrol=rol_has_article.idrol WHERE rol_has_article.idarticle=$id";
	$result = mysqli_query($dbc, $query) or die (mysqli_error($dbc));

?>

 <td>
 	<?php while($row_reviewer = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>

 	<?= $row_reviewer['name'] ?> <?= $row_reviewer['lastName'] ?> <?= $row_reviewer['familyName'] ?> | 

 	<?php } ?>
 		
  </td>

</tr>
 </table>

<hr>
<h3>Assign another reviewer?</h3>
<?php 

	$query = "SELECT rol.idrol as idrol FROM rol INNER JOIN rol_has_article on rol.idrol=rol_has_article.idrol WHERE rol_has_article.idarticle=$id";
	$result = mysqli_query($dbc, $query) or die (mysqli_error($dbc));
	$row_reviewer2 = mysqli_fetch_assoc($result);

	$idRol = $row_reviewer2['idrol'];
?>
<?php 

//Select 
$query = "SELECT * FROM rol WHERE rol=3 AND idrol <> $idRol";
$result2 = mysqli_query($dbc, $query) or die(mysqli_error($dbc));

//COMPLETAR ESTA PARTE PARA AGREGAR A MÁS DE UN REVISOR

?>

<form action="addreviewer.php" method="post">

<div class="form-group">
	<input type="hidden" name="idarticle" value="<?= $id ?>">
	<label for="otherreviwer">Select another reviewer</label>
	<select class="form-control" name="reviewer" multiple required>
		<?php while($row_reviewer3 = mysqli_fetch_array($result2, MYSQLI_ASSOC)){ ?>
		<option value="<?= $row_reviewer3['idrol'] ?>"><?= $row_reviewer3['name'] ?> <?= $row_reviewer3['lastName'] ?> <?= $row_reviewer3['familyName'] ?> </option>
		<?php } ?>

	</select>
	<!-- <p class="text-muted">Press the control key to select more than one reviewer </p> -->
</div>

<div class="form-group text-right">
	<input type="submit" class="btn btn-primary" value="Assign Reviewer(s)">
</div>

<input type="hidden" name="submitted" value="TRUE">

</form>


 </div>



 <?php
}

?>
