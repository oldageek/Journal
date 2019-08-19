<?php  

$title = "Register new user";
?>

<?php include("header.php") ?>

<?php 


if (isset($_POST['submitted'])) {

  require('includes/mysql_connect.php');

  $degree = $_POST['degree'];
  $name = $_POST['name'];
  $last_name = $_POST['last_name'];
  $family_name = $_POST['family_name'];
  $institution = $_POST['institution'];
  $acronym = $_POST['acronym'];
  $dependence = $_POST['dependence'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $country = $_POST['country'];

  $phone = $_POST['phone'];
  $email = $_POST['email'];

  $password = md5($_POST['password']);


  //Inserción a usuario
  $query = "SELECT * FROM user WHERE email='$email'";
  $result = mysqli_query($dbc, $query) or die (mysqli_error($dbc));

  if (mysqli_num_rows($result) == 1) {
    echo '
    <script>
      alert("Email already registered");
    </script>
    ';
  }else{
    $rol = 4;
    $status = 1;
    $query = "INSERT INTO user (email, password, rol, status) values('$email', '$password', $rol, $status)";
    $result = mysqli_query($dbc, $query) or die (mysqli_error($dbc));

    $idUser = mysqli_insert_id($dbc);

    $date = date('d-m-Y');
    $key = md5($name.$last_name.$family_name.$date);


    $query = "INSERT INTO author (name, lastName, familyName, city, state, country, degree, institution, acronym, dependence, phone, email, iduser, public_key, registration_date) values('$name', '$last_name', '$family_name', '$city', '$state', '$country', '$degree', '$institution', '$acronym', '$dependence', '$phone','$email', (SELECT iduser from user WHERE iduser=$idUser), '$key', NOW())";

    $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));

    if ($result) {

      //Send mail confirmation
      
        require 'email/PHPMailerAutoload.php';

        //Create a new PHPMailer instance
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;
        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        $mail->Host = "mail.webmilab.com";
        //Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port = 26;
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication
        $mail->Username = "contacto@webmilab.com";
        //Password to use for SMTP authentication
        $mail->Password = "Ah@\R6D!<31H";
        //Set who the message is to be sent from
        $mail->setFrom('contact@mexicanjournal.buap.mx', 'Mexican Journal of Materials Science and Engineering');
        //Set an alternative reply-to address
        $mail->addReplyTo('omar_350_hs@hotmail.com', 'Omar Hernandez Sarmiento');
        //Set who the message is to be sent to
        $mail->addAddress($email, $name);   
        //Set the subject line
        $mail->Subject = 'Sign Up to Mexican Journal of Materials Science and Engineering';
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //$mail->msgHTML(file_get_contents('body.php'), dirname(__FILE__));
        //Replace the plain text body with one created manually
        $mail->Body = '
                
        <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Sign Up to Mexican Journal of Materials Science and Engineering</title>
        </head>
        <body>
            <div style="text-align:center;width: 100%; font-family: Arial, Helvetica, sans-serif;">
                <h1>Success Sign Up!</h1>
                

                <p>Welcome to Mexican Journal of Materials Science and Engineering</p>
                <p>This is an confirmation email </p>

                <p>Now you can sign in to: <a href="http://webmilab.com/omar/journal/register.php">http://webmilab.com/omar/journal/login.php</a></p>

            </div>
        </body>
        </html>

        ';
        $mail->IsHTML(true); 
        $mail->AltBody = 'This is a plain-text message body';

        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }else{

          echo '
          <script>
            alert("Successful registered user, you will receive a confirmation email");
            window.location="http://webmilab.com/omar/journal/login.php";
          </script>
          ';

        }
        

        
    }else{
      echo 'Erro al registrar';
    }

  }


}


?>


<div class="container">


  <div class="row">

    <?php include("sidebar.php"); ?>


    <div class="col-lg-8 content-journal">
      <h2>System Mexican Journal</h2>

      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" >
          <div class="panel-heading">
            <div class="panel-title text-center">Create new account</div>

          </div>

          <div style="padding-top:30px" class="panel-body" >
            <p class="text-warning">* Required fields</p>

            <form id="loginform" class="form-horizontal" role="form" method="post" action="register.php">

              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                <input id="login-username" type="text" class="form-control" name="degree" required placeholder="Degree">
              </div>

              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="login-username" type="text" class="form-control" name="name" required placeholder="Name">
              </div>

              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="login-username" type="text" class="form-control" name="last_name" required placeholder="Last name">
              </div>

              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="login-username" type="text" class="form-control" name="family_name" required placeholder="Family name">
              </div>

              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                <input id="login-username" type="text" class="form-control" name="institution" required placeholder="Institution*">
              </div>

              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                <input id="login-username" type="text" class="form-control" name="acronym" required placeholder="Acronym">
              </div>

              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
                <input id="login-username" type="text" class="form-control" name="dependence" required placeholder="Dependence(1)">

              </div>

              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input id="login-username" type="text" class="form-control" name="city" required placeholder="City*">
              </div>

              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input id="login-username" type="text" class="form-control" name="state" required placeholder="State*">
              </div>

              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input id="login-username" type="text" class="form-control" name="country" required placeholder="Country*">
              </div>

              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input id="login-username" type="text" class="form-control" name="phone" required placeholder="Phone">
              </div>



              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input id="login-username" type="email" class="form-control" name="email" required placeholder="Email">
              </div>

              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="login-password" type="password" class="form-control" name="password" required placeholder="Password">
              </div>

              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="login-password" type="password" class="form-control" name="password2" required placeholder="Confirm password">
              </div>

              <div style="margin-top:10px" class="form-group">
                <!-- Button -->

                <div class="col-sm-12 controls text-center">
                  <input type="hidden" name="submitted" value="TRUE">

                  <button type="submit" class="btn btn-primary azul1">Register <i class="glyphicon glyphicon-log-in"></i></button>

                </div>
              </div>
            </form>
            <p class="text-muted text-center">(1)Faculty/laboratory/department/research center etc.</p>
            <p class="text-center">Do you have an account? <a href="login.php">Sign in</a></p>
            

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
