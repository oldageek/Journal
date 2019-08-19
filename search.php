<?php  

$title = "Search";
?>
<?php include("header.php") ?>


<div class="container">


  <div class="row">

    <?php include("sidebar.php"); ?>


    <div class="col-lg-8 content-journal">
      <h2>System Mexican Journal</h2>

      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" >
          <div class="panel-heading">
            <div class="panel-title text-center">Search</div>

          </div>

          <div style="padding-top:30px" class="panel-body" >

            <form id="loginform" role="form" method="post" action="index.php">

              <div style="margin-bottom: 25px" class="form-group">
                <input id="login-username" type="text" class="form-control" name="usuario" required placeholder="Start typing in the input field below:">
              </div>

            
              <div style="margin-top:10px" class="form-group">
                <!-- Button -->

                <div class="col-sm-12 controls text-center">
                  <input type="hidden" name="submitted" value="TRUE">
                  <button type="submit" class="btn btn-primary azul1">Search </button>

                </div>
              </div>
            </form>

           

          </div>
          
        </div>

      </div>


      <div class="separator"></div>

      


    </div>

  </div>


</div> <!-- /container -->


<?php include("footer.php"); ?>
