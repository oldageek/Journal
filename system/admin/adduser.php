<?php include("header.php") ?>


<?php 

$crud = 1;


/*

Tengo ya a admin, chief editor y autor, 
puedo usar el mismo crud de chief editor para editor y reviewer, comenzar a meter inserciones a la bd
en cascada: 1ro usuario y luego a tabla que corresponda.



*/

?>


<div class="container-fluid main-container">

<?php include("menu.php") ?>

<div class="col-md-10 content">

<!-- 
<ol class="breadcrumb azul1 blanco">
  <li class="active">Inicio</li>
</ol>

-->


<div class="panel panel-default">
  <div class="panel-heading azul1 blanco">
    Add new user
  </div>
  <div class="panel-body table-responsive">

  <div class="col-md-6 col-md-offset-3">
    <p class="text-warning">* Required fields</p>
    <form class="form" action="adduser.php" method="post">
      <div class="form-group">
        <label for="rol">User rol*</label>
        <select class="form-control" id="rol" name="rol" required>
          <option value="">-Choose rol-</option>
          <option value="1">Admin</option>
          <option value="2">Chief Editor</option>
          <option value="3">Editor</option>
          <option value="4">Reviewer</option>
          <option value="5">Author</option>
        </select>
      </div>

      <div id="admin" style="display:none;">
        <div class="form-group">
          <label for="name">Name*</label>
          <input type="text" name="name" class="form-control" required> 
        </div>
        <div class="form-group">
          <label for="email">Email*</label>
          <input type="email" name="email" class="form-control" required> 
        </div>
        <div class="form-group">
          <label for="telefono">Teléfono*</label>
          <input type="text" name="telefono" class="form-control" required> 
        </div>


        <div class="form-group">
          <label for="password">Password*</label>
          <input type="password" name="password" class="form-control" required> 
        </div>

        <div class="form-group">
          <label for="password2">Confirm password*</label>
          <input type="password" name="password2" class="form-control" required> 
        </div>


      </div>

      <div id="chief-editor" style="display:none;">
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
          <input id="login-username" type="email" class="form-control" name="usuario" required placeholder="Email">
        </div>

        <div style="margin-bottom: 25px" class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input id="login-password" type="password" class="form-control" name="password" required placeholder="Password">
        </div>

        <div style="margin-bottom: 25px" class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input id="login-password" type="password" class="form-control" name="password2" required placeholder="Confirm password">
        </div>
      </div>

      <div id="editor" style="display:none;">
        <h2>Editor</h2>
      </div>

      <div id="reviewer" style="display:none;">
        <h2>Reviewer</h2>
      </div>

      <div id="author" style="display:none;">

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

        <div class="form-group">
          <span class="help-block">Born</span>
          <div class="row" style="margin-bottom: 25px">
            <div class="col-md-3">
              <input type="numer" name="day" class="form-control" placeholder="day">
            </div>
            <div class="col-md-6">
              <input type="numer" name="month" class="form-control" placeholder="month">
            </div>
            <div class="col-md-3">
              <input type="numer" name="year" class="form-control" placeholder="year">
            </div>
          </div>
        </div>

        <div style="margin-top:20px;margin-bottom: 25px" class="input-group">
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
          <input id="login-username" type="email" class="form-control" name="usuario" required placeholder="Email">
        </div>

        <div style="margin-bottom: 25px" class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input id="login-password" type="password" class="form-control" name="password" required placeholder="Password">
        </div>

        <div style="margin-bottom: 25px" class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input id="login-password" type="password" class="form-control" name="password2" required placeholder="Confirm password">
        </div>
      </div>


      <div class="form-group text-right">
        <input type="submit" class="btn btn-success" value="Add user">
        <input type="hidden" name="submitted" value="TRUE">
      </div>
    </form>
  </div>
    


  </div>
  <div class="panel-footer text-right">

    Sitio en desarrollo <b>Realizando pruebas de sistema.</b>
  </div>
</div>
</div>



    </div>

<?php include("footer.php") ?>


<script type="text/javascript">
  $('#rol').on('change',function(){

    if($(this).val()==""){
      $("#admin").hide();
      $("#chief-editor").hide();
      $("#editor").hide();
      $("#reviewer").hide();
      $("#author").hide();

    }else if($(this).val()=="1"){
      $("#admin").fadeIn("slow");
      $("#chief-editor").hide();
      $("#editor").hide();
      $("#reviewer").hide();
      $("#author").hide();

    }else if($(this).val()=="2"){
      $("#chief-editor").fadeIn("slow");
      $("#admin").hide();
      $("#editor").hide();
      $("#reviewer").hide();
      $("#author").hide();

    }else if($(this).val()=="3"){
      $("#editor").fadeIn("slow");
      $("#chief-editor").hide();
      $("#admin").hide();
      $("#reviewer").hide();
      $("#author").hide();
      
    }else if($(this).val()=="4"){
      $("#reviewer").fadeIn("slow");
      $("#chief-editor").hide();
      $("#editor").hide();
      $("#admin").hide();
      $("#author").hide();
      
    }else if($(this).val()=="5"){
      $("#author").fadeIn("slow");
      $("#chief-editor").hide();
      $("#editor").hide();
      $("#reviewer").hide();
      $("#admin").hide();
      
    }

  });


</script>



</body>
</html>