<?php include("header.php") ?>


<div class="container">


  <div class="row">

    <?php include("sidebar.php"); ?>


    <div class="col-lg-8 content-journal">
      <h2>System Mexican Journal</h2>

      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default" >
          <div class="panel-heading">
            <div class="panel-title text-center">Forgot Password</div>

          </div>

          <div style="padding-top:30px" class="panel-body" >

            <form id="loginform" class="form-horizontal" role="form" method="post" action="index.php">

              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="login-username" type="text" class="form-control" name="email" required placeholder="Email">
              </div>


              <div style="margin-top:10px" class="form-group">

                <div class="col-sm-12 controls text-center">
                  <input type="hidden" name="submitted" value="TRUE">
                  <button type="submit" class="btn btn-primary azul1">Reset password </button>

                </div>
              </div>
            </form>

            <p class="text-center">Do not have an account? <a href="register.php">Create account</a></p>
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
