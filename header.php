<?php 
$issue = 0;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">


    <?php if (!empty($title)){ ?>

      <title>Mexican Journal of Materials Science and Engineering &raquo; <?= $title ?></title>
      
    <?php }else{ ?>

      <title>Mexican Journal of Materials Science and Engineering</title>

    <?php } ?>
    <link href="https://fonts.googleapis.com/css?family=Sanchez" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead text-center">
        <h2 class="text-muted">Mexican Journal of Materials Science and Engineering</h2>
        <nav>
          <ul class="nav nav-justified">
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="search.php">Search</a></li>
            <!-- 
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            -->
          </ul>
        </nav>
      </div>

    </div>