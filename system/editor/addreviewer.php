<?php 

session_start();

require_once '../includes/mysql_connect.php';


if (isset($_POST['submitted'])) {
	$idarticle = $_POST['idarticle'];
	$idrol = $_POST['reviewer'];
	$status = 2;

	$query = "INSERT INTO rol_has_article (idrol, idarticle, status) VALUES($idrol, $idarticle, $status)";
	$result = mysqli_query($dbc, $query) or die (mysqli_error($dbc));

	if ($result) {
		$_SESSION['message'] = '
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Success!</strong> Article accepted, now you can print your constancy.
		</div>
		';
		 echo '<script type="text/javascript">window.location="index.php";</script>';
	}else{
		echo "System error, try again!";
	}
}

?>