<?php include("header.php") ?>

<?php 


$idArticle = intval($_GET['id']);

if (empty($idArticle)) {
  echo '<script type="text/javascript">window.location="index.php";</script>';
}

$query = "SELECT article.idarticle as noarticle, article.title as title, article.shortDescription as description, article.file as file, article.area, article.uploadDate as dateupload, article.idauthor as idauthor, article.status as status, author.name as name, author.lastName as lastname, author.familyName as familyname, article_area.idarea, article_area.area as area FROM article INNER JOIN article_area ON article.area=article_area.idarea INNER JOIN author on idauthor= author.idautor WHERE article.idarticle=$idArticle";

$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));

$row_article = mysqli_fetch_assoc($result);




//Envio revisiones
if (isset($_POST['submitted'])) {
  $idArticle = $_POST['idarticle'];
  $reviewer = $_POST['review'];
  $type = $_POST['type'];

  if (empty($type)) {
    $type = "0";
  }else{
    $type = $_POST['type'];
  }

  $comments = $_POST['comments'];
  $status = 3; //Send to editor

  $query ="INSERT INTO correction (correctionType, description, correctionDate, idarticle) VALUES ($type, '$comments', NOW(), (SELECT idarticle from article WHERE idarticle=$idArticle))";

  $result = mysqli_query($dbc, $query) or die (mysqli_error($dbc));

  if ($result) {
    $query = "UPDATE article SET status=3 WHERE idarticle=$idArticle";
    $result2 = mysqli_query($dbc, $query) or die (mysqli_error($dbc));

    if ($result2) {
      $query = "UPDATE rol_has_article SET status=3 WHERE idrol=$reviewer AND idarticle=$idArticle";
      $result3 = mysqli_query($dbc, $query) or die(mysqli_error($dbc));

      $_SESSION['message'] = '
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> Review send to the editor.
      </div>
      ';
     echo '<script type="text/javascript">window.location="index.php";</script>';
    }else{
      echo "System error!";
    }
  }


}


?>


<div class="container-fluid main-container">


<div class="col-md-12 content">


<ol class="breadcrumb azul1 blanco">
  <li><a href="index.php">Home</a></li>
  <li class="active">View article</li>
</ol>


<div class="panel panel-default">
  <div class="panel-body">
    <h3>Article: [<?= $row_article['title'] ?>]</h3>

  <div class="col-md-6">
    <h2>File</h2>
    <p class="text-muted">If you can't see the file, you can download <a href="../pdfs/<?= $row_article['file'] ?>">[here]</a></p>
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
        $status = "Review in progress";
        
      }elseif ($status == 3) {
       $status = "Editor Review in progress";
       
      }elseif ($status == 4) {
       $status = "Evaluated and published";
       
      
      }elseif ($status == 5) {
       $status = "Rejected";
       
      }else{
        $status = "I dont know ";
      }
    ?>

    <p><b>Status: </b> <?= $status?></p>

    <hr>
    <div class="col-md-4">
      <a href="#" class="btn btn-danger">Decline Article</a>
    </div>


    <?php //acabar esta parte, generar un formulario y luego enviarlo aprobado o no ?>

    <div class="col-md-4">
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-id="<?= $row_article['noarticle'] ?>" data-title="<?= $row_article['title'] ?>">Send evaluation</button>
    </div>

<!--
    <div class="col-md-4">
      <a href="#" class="btn btn-success">Accept article</a>
    </div>
-->

  </div>
    


  </div>
  <div class="panel-footer text-right">

    Site in development
  </div>
</div>
</div>



    </div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Title</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="view.php?id=<?= $idArticle ?>">
          <input type="hidden" name="idarticle" id="idarticle">
          <input type="hidden" name="review" value="<?= $idrevisor ?>">

          <label for="correction" class="control-label">Does the article need correction?:</label>
          <div class="radio">
            
            <label>
              <input type="radio" name="correction" id="correction1" value="1">
              Yes
            </label>

            <label>
              <input type="radio" name="correction" id="correction2" value="2" checked>
              No
            </label>
          </div>
          <div id="show-correction" class="form-group" style="display:none;">
            <label for="typecorrection">Select type of correction</label>
            <select class="form-control" name="type">
              <option value="">----</option>
              <option value="1">Article description</option>
              <option value="2">Change the context</option>
              <option value="3">Other</option>
            </select>
          </div>
          <div class="form-group">
            <label for="comments" class="control-label">Comments:</label>
            <textarea class="form-control" id="comments" name="comments" rows="4"></textarea>
            <p class="text-muted">If the article is correct, please write: Valid and revised article</p>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
        <input type="submit" class="btn btn-primary confirmation" value="Send review">
        <input type="hidden" name="submitted" value="TRUE">
        </form>
      </div>
    </div>
  </div>
</div>

<?php include("footer.php") ?>


<script type="text/javascript">
  

  $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var id = button.data('id'); 
  var title = button.data('title'); 

  var modal = $(this);
  modal.find('.modal-title').text('Article: ' + title);
  modal.find('.modal-body #idarticle').val(id);
})




$("input[name='correction']").click(function () {
    $('#show-correction').css('display', ($(this).val() === '1') ? 'block':'none');
});



$('.confirmation').on('click', function () {
  return confirm('Are you sure to send the review?');
});


</script>