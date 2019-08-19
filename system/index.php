<?php 

if(!isset($_SESSION['id'])){

    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
    if((substr($url, -1) == '/') OR (substr($url, -1) == '\\'))
    {
      $url = substr($url, 0, -1);
    }

    $url = '../login.php';
    header("Location: $url");
    exit();

  }else{

  	session_start();
        $_SESSION['id'] = $row[0];
        $_SESSION['user'] = $row[1];
        $_SESSION['rol'] = $row[2];

        $_SESSION['tiempo'] = time();

        $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
        if((substr($url, -1) == '/') OR (substr($url, -1) == '\\'))
        {
          $url = substr($url, 0, -1);
        }

        if ($_SESSION['rol'] == 1) {
          //Admin
          $url = 'system/admin/index.php';
          header("Location: $url");
        }elseif($_SESSION['rol'] == 2){
          //Editor
          $url = 'system/editor/index.php';
          header("Location: $url");
        }elseif($_SESSION['rol'] == 3){
          //Revisor
          $url = 'system/reviewer/index.php';
          header("Location: $url");
        }elseif($_SESSION['rol'] == 4){
          //Autor
          $url = 'system/author/index.php';
          header("Location: $url");
        }else{
          echo "<script language='JavaScript'>
                alert('You have no role assigned, contact the admin');
                </script>";
        }


  }




 ?>