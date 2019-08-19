<?php
session_start();

require("../includes/mysql_connect.php");


$id = $_SESSION['id'];
$query = "SELECT * FROM user WHERE idUser=$id";
$result = mysqli_query($dbc, $query);
$row_usuario = mysqli_fetch_assoc($result);

$user = $row_usuario['iduser'];

//Datos de rol
$query = "SELECT * FROM rol WHERE iduser=$user AND rol=2";
$result2 = mysqli_query($dbc, $query);
$row_editor = mysqli_fetch_assoc($result2);


  $titulo = $row_usuario['email'];
  $usuario = $row_usuario['email'];
 

?>

<!DOCTYPE html>
<html lang="es-MX">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      <?php
        if (empty($titulo)) {
          echo "Author | Mexican Journal of Materials Science and Engineering";
        }else {
          echo $titulo.' | Mexican Journal of Materials Science and Engineering';
        }
       ?>
    </title>
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.min.css">


  </head>

<body>

  <nav class="navbar navbar-default navbar-static-top">
      <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">
          Mexican Journal of Materials Science and Engineering
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown ">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              <?php if (empty($row_usuario['imagen'])) {?>
              <img src="../img/user.png" alt="User image" class="img-circle" style="width:25px;height:25px">
              <?php }else{ ?>
              <img src="uploads/<?= $row_usuario['imagen']?>" alt="User image" class="img-rounded" style="width:25px;height:25px">
              <?php } ?>
              <?= $usuario?>
              <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li class=""><a href="perfil.php"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
                <li class="divider"></li>
              </ul>
            </li>
            <li><a href="logout.php">Salir <span class="glyphicon glyphicon-log-out"></span></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>