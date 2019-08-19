<?php include("header.php") ?>

<?php  

//Selecciono los articulos que pertenen al revisor
$query = "SELECT article.idarticle as noarticle, article.title as title, article.area, article.uploadDate as dateupload, article.idauthor as idauthor, article.status as status, author.name as name, author.lastName as lastname, author.familyName as familyname, rol_has_article.idrol as idrol, article_area.idarea, article_area.area as area FROM article INNER JOIN article_area ON article.area=article_area.idarea INNER JOIN author on idauthor= author.idautor INNER JOIN rol_has_article on article.idarticle=rol_has_article.idarticle WHERE idrol=$idrevisor";

$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));



?>


<div class="container-fluid main-container">

<?php include("menu.php") ?>

<div class="col-md-10 content">

<ol class="breadcrumb azul1 blanco">
  <li class="active">Home</li>
</ol>



<div class="panel panel-default">
  <div class="panel-heading azul1 blanco">
    Welcome [<?= $degree ?> <?= $name ?> <?= $lastname ?> <?= $familyname ?>] 
  </div>
  <div class="panel-body">
    <h3>Articles</h3>

   <?php 
      if(!empty($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      } 
    ?>

    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID Article</th>
            <th>Name</th>
            <th>Area</th>
            <th>Author</th>
            <th>Date Upload</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php  while ($row_article = mysqli_fetch_array($result, MYSQLI_ASSOC)){?>
          <tr>
            <td><?= $row_article['noarticle']?></td>
            <td><?= $row_article['title']?></td>
            <td><?= $row_article['area']?></td>
            <td><?= $row_article['name']?> <?= $row_article['lastname']?> <?= $row_article['familyname']?> </td>
            <?php 
              //Obtener fecha y ponerla en formato espa«Ðol
              $originalDate = $row_article['dateupload'];
              $fecha = date("d-M-Y H:i", strtotime($originalDate));
            ?>
            <td><?= $fecha ?> hrs.</td>

            <?php 
            $status = $row_article['status'];
            if ($status == 1) {
              $status = "Waiting to accept...";
              $link = '<a href="accept.php?id='.$row_article['noarticle'].'&reviewer='.$idrevisor.'" class="btn btn-info confirmation">Accept article</a>';
            }elseif ($status == 2) {
              $status = "Review in progress";

              //$link = '<a href="view.php?id='.$row_article['noarticle'].'" class="btn btn-primary">review article</a> <br><br> <a href="generate.php?id='. $row_article['noarticle'].'&reviewer='.$idrevisor.'" class="btn btn-success">Generate constancy</a>';
              $link = '<a href="view.php?id='.$row_article['noarticle'].'" class="btn btn-primary">Review article</a> ';
            }elseif ($status == 3) {
             $status = "Editor Review in progress";
             $link = '<a href="view.php?id='.$row_article['noarticle'].'" class="btn btn-primary">Review article</a> ';
            }elseif ($status == 4) {
             $status = "Evaluated and published";
             $link = '<a href="view.php?id='.$row_article['noarticle'].'" class="btn btn-success">View Evaluate Article</a> <br><br> <a href="generate.php?id=<'. $row_article['noarticle'].'&reviewer='.$idrevisor.'" class="btn btn-success">Generate constancy</a>';

            }elseif ($status == 5) {
               $status = "Rejected";
            }

            ?>



            <td><?= $status?></td>
            <td>
              <?= $link ?>
            </td>
            
          </tr>
          <?php } ?>
          
        </tbody>
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



<script type="text/javascript">
  $('.confirmation').on('click', function () {
    return confirm('Are you sure to accept the article?');
  });

</script>


</body>
</html>