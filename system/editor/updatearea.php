<?php
session_start();

require_once '../includes/mysql_connect.php';

if (isset($_POST['submitted'])) {
    $id =  $_POST['idarea'];
  	$area = $_POST['area'];
  	$descripcion = $_POST['descripcion'];

  	$query = "UPDATE article_area SET area='$area', short_description='$descripcion' WHERE idarea=$id";
  	$result = mysqli_query($dbc, $query) or die (mysqli_error($dbc));

  	if ($result) {
  		$_SESSION['message'] = '<p class="text-success text-center">Success!, area edited.</p>';
        echo '<script type="text/javascript">window.location="areas.php";</script>';
  	}
  }

?>