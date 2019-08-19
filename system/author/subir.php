<?php include("header.php") ?>


<?php 

if(isset($_POST['submitted'])){

  $author = $name."-".$lastname."-".$familyname;

  if(empty($_POST['title'])){
    $errors[] = 'You forgot to put the name of the article';
  }else{
     $title = escape_data($_POST['title']);
   }

  $description = escape_data($_POST['description']);
  $area = escape_data($_POST['area']);
  $reviewer = escape_data($_POST['reviewer']);

  if ($_FILES['file']['size'] < 5242880){

    if(is_uploaded_file($_FILES['file']['tmp_name'])) {
      $namefile2 = $_FILES['file']['name'];
      $tmpfile2 = $_FILES['file']['tmp_name'];
      $sizefile = $_FILES['file']['size'];
      $extension2 = explode(".",$namefile2);
      $ext2 = $extension2[1];
      //Correccion de nombre a RVIyT_2018_1
      //Obtengo el numero de articulos
      $query = "SELECT * FROM article WHERE idauthor=$id";
      $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
      $narticle = mysqli_num_rows($result);


      $year = date("Y");
      $noarticle = $narticle+1;

      $fil2 ="RVIyT_".$year."_".$noarticle.".";
      $file= $fil2.$ext2;
      $urlnueva2 = "../pdfs/".$file;       
      if(is_uploaded_file($tmpfile2)){
        copy($tmpfile2,$urlnueva2); 
        $upload = TRUE;  

        //Inserto en la bd

        $volumen = 1;
        $status = 1; //Enviado para revisar
        $query = "INSERT INTO article (title, shortDescription, file, area, uploadDate, idauthor, idvolume, status) VALUES('$title', '$description', '$file', $area, NOW(), (SELECT idautor from author WHERE idautor=$idauthor), $volumen, $status)";
        $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));

        if ($result) {
          $idarticle = mysqli_insert_id($dbc);

          $query = "INSERT INTO rol_has_article (idrol, idarticle) VALUES((SELECT idrol from rol WHERE idrol=$reviewer),(SELECT idarticle from article WHERE idarticle=$idarticle))";
          $result2 = mysqli_query($dbc, $query) or die(mysqli_error($dbc));

          if ($result2) {


            //Poner la parte de envió de correos aquí... solo pruebas...

             /*$_SESSION['success'] = '<p class="text-success text-center">Success!, Article sent and send constancy to <b>'.$email.'</b></p>';
            echo '<script type="text/javascript">window.location="index.php";</script>';*/

echo '<script type="text/javascript">window.location="../mail/mail.php";</script>';
          }

        }else{
          echo "
          <script>
            alert('Error al insertar articulo');
          </script>
          ";
        }


      }else{
         $_SESSION['error2'] = '<p class="text-danger">Error!, no se pudo cargar el archivo PDF del artículo, intenta otra vez.</p>';
         echo '<script type="text/javascript">window.location="subir.php";</script>';
      }
    }

  }else{
    $_SESSION['error1'] = '<p class="text-danger">Error!, El archivo PDF pesa mas de 5mb, intenta de nuevo.</p>';
    echo '<script type="text/javascript">window.location="subir.php";</script>';
  }



}


?>

<div class="container-fluid main-container">

<?php //include("menu.php") ?>

<div class="col-md-10 col-md-offset-1 content">

<ol class="breadcrumb azul1 blanco">
  <li><a href="index.php">Home</a></li>
  <li class="active">Article</li>
</ol>
<div class="panel panel-default">

  <div class="panel-body">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center">
        <h3>Upload new article</h3>

        <?php if(!empty($_SESSION['error'])){
               echo $_SESSION['error'];
               unset($_SESSION['error']);
          } ?>
        <?php if(!empty($_SESSION['error1'])){
             echo $_SESSION['error1'];
             unset($_SESSION['error1']);
        } ?>

        <?php if(!empty($_SESSION['error2'])){
             echo $_SESSION['error2'];
             unset($_SESSION['error2']);
        } ?>
        <form method="post" action="subir.php" enctype="multipart/form-data">
          <div class="form-group">
            <label for="titulo">Title</label>
            <input type="text" name="title" id="title" class="form-control">
          </div>

          <div class="form-group">
            <label for="descripcion">Short Description</label>
            <textarea class="form-control" name="description" rows="5"></textarea>
            
          </div>

          <div class="form-group">
            <label for="file">PDF FILE (max 5mb)</label>
            <input type="file" class="form-control" name="file" accept="application/pdf">
          </div>

          <div class="form-group">
            <label for="descripcion">Area</label>

            <?php
              $query = "SELECT * FROM article_area ORDER BY area DESC";
              $result = mysqli_query($dbc, $query);
            ?>

            <select class="form-control" name="area">
              <option value="">---</option>
              <?php while($row_area = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
                <option value="<?= $row_area['idarea']?>"><?=$row_area['area']?></option>
                <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label for="descripcion">Select reviewer of the article</label>

            <?php
              $query = "SELECT * FROM rol WHERE rol=3";
              $result = mysqli_query($dbc, $query);
            ?>

            <select class="form-control" name="reviewer" id="reviewer">
              <option value="">---</option>
              <?php while($row_reviewer = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
                <option value="<?= $row_reviewer['idrol']?>"><?=$row_reviewer['name']?> <?=$row_reviewer['lastName']?> <?=$row_reviewer['familyName']?></option>
                <?php } ?>
              
                <option value="other">Other</option>
              
            </select>
          </div>

          <div id="newreviewer" style="display:none;">
            <h2>Add new reviewer</h2>
            <input type="hidden" name="rol" value="1">


            <div class="form-group">
              <label for="degree">Degree</label>
              <input type="text" name="degree" id="degree" class="form-control">
            </div>

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-control">
            </div>

            <div class="form-group">
              <label for="lastName">Last name</label>
              <input type="text" name="lastName" id="lastName" class="form-control">
            </div>

            <div class="form-group">
              <label for="familyName">Family name</label>
              <input type="text" name="familyName" id="familyName" class="form-control">
            </div>

            <div class="form-group">
              <label for="institucion">Institution</label>
              <input type="text" name="institucion" id="institucion" class="form-control">
            </div>

            <div class="form-group">
              <label for="dependence">Dependence</label>
              <input type="text" name="dependence" id="dependence" class="form-control">
            </div>

            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" name="phone" id="phone" class="form-control">
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" id="email" class="form-control">
            </div>


          </div>

          <div class="form-group">
            
            <input type="submit" class="btn btn-primary" value="Send Article">
            <input type="hidden" name="submitted" value="TRUE">
          </div>
          
        </form>
      </div>

    </div>
  </div>
</div>
</div>



    </div>

<?php include("footer.php") ?>

<script type="text/javascript">
  $('#reviewer').on('change',function(){

    if($(this).val()=="other"){
       $("#newreviewer").fadeIn("slow");
    }else{
      $("#newreviewer").hide();
    }
  });


</script>