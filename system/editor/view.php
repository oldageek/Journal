<?php include("header.php") ?>

<?php 


$idArticle = intval($_GET['id']);

$query = "SELECT article.idarticle as noarticle, article.title as title, article.shortDescription as description, article.file as file, article.area, article.uploadDate as dateupload, article.idauthor as idauthor, article.status as status, author.name as name, author.lastName as lastname, author.familyName as familyname, article_area.idarea, article_area.area as area, rol_has_article.idrol as idrol, rol_has_article.idarticle as thearticle, rol.idrol as therol, rol.name as namerol, rol.lastName as lastNamerol, rol.familyname as familynamerol FROM article INNER JOIN article_area ON article.area=article_area.idarea INNER JOIN author on idauthor= author.idautor INNER JOIN rol_has_article ON article.idarticle = rol_has_article.idarticle INNER JOIN rol ON rol_has_article.idrol = rol.idrol  WHERE article.idarticle=$idArticle";

$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));

$row_article = mysqli_fetch_assoc($result);



?>


<div class="container-fluid main-container">


<div class="col-md-12 content">


<ol class="breadcrumb azul1 blanco">
  <li ><a href="index.php">Home</a></li>
  <li class="active"> View Article</li>
</ol>


<div class="panel panel-default">
  <div class="panel-body">
    <h3>Article: [<?= $row_article['title'] ?>]</h3>

  <div class="col-md-6">
    <h2>File</h2>
    <embed src="../pdfs/<?= $row_article['file'] ?>" width="100%" height="475" type='application/pdf'>
  </div>

  <div class="col-md-6">
    <h2>Information</h2>
    <h4>Author: <?= $row_article['name']?> <?= $row_article['lastname']?> <?= $row_article['familyname']?></h4>
    <p><b>Area:</b> <?= $row_article['area']?></p>
    <?php 
      //Obtener fecha y ponerla en formato español
      $originalDate = $row_article['dateupload'];
      $fecha = date("d-M-Y H:i", strtotime($originalDate));
    ?>
    <p><b>Date Upload: </b><?= $fecha ?> hrs.</p>
    <p><b>Description</b></p>
    <p class="text-justify"><?= $row_article['description']?></p>

    <?php 
      $status = $row_article['status'];
      if ($status == 1) {
        $status = "Pending...";
        
      }elseif ($status == 2) {
        $status = "In progress..";
        
      }elseif ($status == 3) {
       $status = "Evaluated";
       
      }elseif ($status == 4) {
        $status = "<span class='text-success'>Evaluated and published</span>";
                     
      }elseif ($status == 5) {
        $status = "<span class='text-danger'>Rejected</span>";
       
      }else{
        $status = "I dont know ";
      
      }

    ?>

    <p><b>Status: </b> <?= $status?></p>


    <p>Reviewer: <b> <?= $row_article['namerol']?> <?= $row_article['lastNamerol']?> <?= $row_article['familynamerol']?></b></p>

    <div class="col-md-3">
      <a href="decline.php?id=<?= $row_article['noarticle']?>&reviewer=<?= $row_article['therol']?>" class="btn btn-danger">Decline Article</a>
    </div>

    <!--

    <div class="col-md-3">
      <a href="#" class="btn btn-warning">Send message</a>
    </div>

    <div class="col-md-3">
      <a href="assign.php" class="btn btn-info">Assign reviewer</a>
    </div>
  
    -->

    <div class="col-md-3">
      <a href="accept.php?id=<?= $row_article['noarticle']?>&reviewer=<?= $row_article['therol']?>" class="btn btn-success">Accept article</a>
    </div>

    <hr><br><br>

    <?php 

    $query = "SELECT * FROM correction WHERE idarticle=$idArticle";
    $result2 = mysqli_query($dbc, $query) or die(mysqli_error($dbc));

    ?>

    <h3>Reviewer comments:</h3>

    <table class="table table-bordered">
      <tr>
        <th>Correction type</th>
        <th>Comment</th>
        <th>Date</th>
      </tr>
      <?php  while ($row_correction = mysqli_fetch_array($result2, MYSQLI_ASSOC)){?>
      <tr>

        <?php 

          $type = $row_correction['correctionType'];

          if ($type == 0) {
            $type = "Article without corrections";
          }elseif ($type == 1) {
            $type = "Article description";
          }elseif ($type == 2) {
            $type = "Change the context";
          }elseif ($type == 3) {
            $type = "Other";
          }

         ?>

        <td><?=  $type ?> </td>
        <td><?= $row_correction['description'] ?></td>
        <?php 
            //Obtener fecha y ponerla en formato español
            $originalDate = $row_correction['correctionDate'];
            $fecha = date("d-m-Y", strtotime($originalDate));
        ?>
        <td><?= $fecha ?></td>

      </tr>
      <?php } ?>
    </table>


  </div>
    


  </div>
  <div class="panel-footer text-right">

    Site in development
  </div>
</div>
</div>



    </div>

<?php include("footer.php") ?>