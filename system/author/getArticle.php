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
<th>Reviewer</th>
<?php 
	
	$query = "SELECT rol.name as name, rol.lastName as lastName, rol.familyName as familyName FROM rol INNER JOIN rol_has_article on rol.idrol=rol_has_article.idrol WHERE rol_has_article.idarticle=$id";
	$result = mysqli_query($dbc, $query) or die (mysqli_error($dbc));

	//$row_reviewer = mysqli_fetch_assoc($result);

?>

 <td>
 	<?php while($row_reviewer = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>

 	<?= $row_reviewer['name'] ?> <?= $row_reviewer['lastName'] ?> <?= $row_reviewer['familyName'] ?> | 

 	<?php } ?>
 		
  </td>

</tr>

<tr>
<th>File</th>
<td><a href="../pdfs/<?= $row_article['file']; ?>" target="_blank"><?= $row_article['file']; ?></td>
</tr>
 </table>



 </div>


 <a href="send_cosntancy.php" class="btn btn-primary">Send Constancy again</a>

 <?php
}

?>
