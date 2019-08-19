<?php  

$title = "Login";
?>

<?php
/*

#Modificación del archivo login, se empata con la BD USER y se elige los roles de 
usuario
#Rol: 1:Admin 2: Editor 3:Revisor 4:Autor
#Status: 1: Activado 2: Suspendido 3: Baja

*/

$login = 1;


include("includes/mysql_connect.php");

if(isset($_POST['submitted'])){

  $errors = array();

  if(empty($_POST['email'])){
    $errors[] = 'Olvidaste poner usuario';
  }else{
    $email = escape_data($_POST['email']);
  }

  $password = md5($_POST['password']);

  if(empty($errors)){
    $query = "SELECT iduser, email, rol, status FROM user WHERE email='$email' AND password='$password'";

    $result = mysqli_query($dbc, $query) or die (mysqli_errno($dbc));
    $row = mysqli_fetch_array($result, MYSQL_NUM);

    if($row){

      if ($row[3] == 1) {
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
      }else{
        echo "<script language='JavaScript'>
                alert('User not activated!');
                </script>";
      }

      

    }
    else{
      echo "<script language='JavaScript'>
                alert('Unregistered user!');
                </script>";
    }
  }
}

?>

<?php include("header.php") ?>


<div class="container">


  <div class="row">

    <?php include("sidebar.php"); ?>


    <div class="col-lg-8 content-journal">
      <h2>System Mexican Journal</h2>

      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default" >
          <div class="panel-heading">
            <div class="panel-title text-center">Login</div>

          </div>

          <div style="padding-top:30px" class="panel-body" >

            <?php 
              if(!empty($_SESSION['mensaje'])){
                echo $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);
              } 
            ?>

            <form id="loginform" class="form-horizontal" role="form" method="post" action="login.php">

              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="login-username" type="text" class="form-control" name="email" required placeholder="Email">
              </div>

              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="login-password" type="password" class="form-control" name="password" required placeholder="Contraseña">
              </div>

              <div style="margin-top:10px" class="form-group">

                <div class="col-sm-12 controls text-center">
                  <input type="hidden" name="submitted" value="TRUE">
                  <button type="submit" class="btn btn-primary azul1">Sign in <i class="glyphicon glyphicon-log-in"></i></button>
                  
                </div>
              </div>
            </form>

            <p class="text-center">Do not have an account? <a href="register.php">Create account</a></p>
            <p class="text-center"><a href="forgot.php">Forgot your password?</a></p>

          </div>
          
        </div>

      </div>


      <div class="separator"></div>

      <div class="col-md-12">
        <p class="text-muted text-justify">This site has been created for the exclusive use of interested users to contribute to the objectives of the magazine. Use of this site is subject to the Legal Notices, the Terms of Use and the Privacy Statement published on the site. Unauthorized access or failure to comply with these conditions may result in the cancellation of your permission to use the site and / or relevant legal actions</p>

      </div>


    </div>

  </div>


</div> <!-- /container -->


<?php include("footer.php"); ?>
