<?php


if (empty($login)) {
  

  if(!isset($_SESSION['id'])){
    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
      if((substr($url, -1) == '/') OR (substr($url, -1) == '\\')){
        $url = substr($url, 0, -1);
      }

      $url = '../../login.php';
      header("Location: $url");
      exit();
  }else{
    $inactive = 1800;
    ini_set('session.gc_maxlifetime', $inactive);
    //por 30 minutos
    if (time() - $_SESSION['tiempo'] > $inactive) {
        unset($_SESSION['id']);
        unset($_SESSION['usuario']);
        unset($_SESSION['email']);
        unset($_SESSION['rol']);
        unset($_SESSION['tiempo']);
        $_SESSION['mensaje'] = '<p class="text-center text-danger">You have closed the session, come back soon!</p>';

        echo '<script type="text/javascript">window.location="../../login.php";</script>';
    }
  }


}

?>
