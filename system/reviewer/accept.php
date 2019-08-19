<?php 
session_start();

require("../includes/mysql_connect.php");

//podemos usar un md5 para hacer una public_key

$idarticle = $_GET['id'];
$reviewer = $_GET['reviewer'];


$query = "UPDATE article SET status=2 WHERE idarticle=$idarticle";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));

if ($result) {
	//Se actualizo el status del articulo
	$query = "UPDATE rol_has_article SET status=2 WHERE idrol=$reviewer AND idarticle=$idarticle";
	$result2 = mysqli_query($dbc, $query) or die(mysqli_error($dbc));

	if ($result2) {
		$_SESSION['message'] = '
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Success!</strong>Add new Reviewer to article.
		</div>
		';
		 echo '<script type="text/javascript">window.location="index.php";</script>';
	}else{
		echo "No se puede cambiar el status en rol has article";
	}

}else{
	echo "NO se puede cambiar el status";
}




/*

Actualizar bd para indicar que acepto el articulo y así mostrar los otros botones 

*/

?>