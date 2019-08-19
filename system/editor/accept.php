<?php 

session_start();

require_once '../includes/mysql_connect.php';


$idArticle = intval($_GET['id']);
$reviewer = intval($_GET['reviewer']);

if (empty($idArticle)) {
  echo '<script type="text/javascript">window.location="index.php";</script>';
}


//Valido mi articulo
$query = "UPDATE article SET status=4 WHERE idarticle=$idArticle";
    $result = mysqli_query($dbc, $query) or die (mysqli_error($dbc));

if ($result) {
  $query = "UPDATE rol_has_article SET status=4 WHERE idrol=$reviewer AND idarticle=$idArticle";
  $result2 = mysqli_query($dbc, $query) or die(mysqli_error($dbc));

  $_SESSION['message'] = '
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Success!</strong> Article evaluated and published.
  </div>
  ';
 echo '<script type="text/javascript">window.location="view.php?id='.$idArticle.'";</script>';
}else{
  echo "System error!";
}



 ?>