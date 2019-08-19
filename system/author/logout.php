<?php
session_start();
require("../includes/mysql_connect.php");
if(!isset($_SESSION['id']))
{
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
		if((substr($url, -1) == '/') OR (substr($url, -1) == '\\'))
		{
			$url = substr($url, 0, -1);
		}

		$url = '../../index.php';
		header("Location: $url");
		exit();
}
else
{
	/*$_SESSION = array();
	session_destroy();*/
	$id = $_SESSION['id'];
	$query = "INSERT INTO user_activity (iduser, activity_date) values((SELECT iduser from user WHERE iduser=$id), NOW())";
	$result	= mysqli_query($dbc, $query) or die(mysqli_errno($dbc));



	unset($_SESSION['id']);
    unset($_SESSION['user']);
    unset($_SESSION['tiempo']);


	$_SESSION['mensaje'] = '<p class="text-center text-danger">You have closed the session, come back soon!</p>';

	echo '<script type="text/javascript">window.location="../../login.php";</script>';

	/*$url = '../index.php';
	header("Location: $url");*/

}


$page_title = "Has salido del sistema";

echo '<h1 id="mainhead">Has salido del sistema!</h1>';
echo '<p>Gracias por tu visita, has cerrado session correctamente, regresa pronto!</p>';
echo '<a href="../index.php">[Inicio]</a>';
?>
