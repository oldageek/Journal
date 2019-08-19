<?php
session_start();

require_once '../includes/mysql_connect.php';

$id =  intval($_GET['idarea']);


$query = "DELETE FROM article_area WHERE idarea=$id";
$result = mysqli_query($dbc, $query) or die (mysqli_error($dbc));

if ($result) {
	$_SESSION['message'] = '<p class="text-danger text-center">Success!, area deleted.</p>';
    echo '<script type="text/javascript">window.location="areas.php";</script>';
}

?>