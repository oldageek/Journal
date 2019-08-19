<?php include("header.php") ?>

<?php 

//Selecciono los articulos
$query = "SELECT article.idarticle as noarticle, article.title as title, article.area, article.uploadDate as dateupload, article.idauthor as idauthor, article.status as status, author.name as name, author.lastName as lastname, author.familyName as familyname, article_area.idarea, article_area.area as area FROM article INNER JOIN article_area ON article.area=article_area.idarea INNER JOIN author on idauthor= author.idautor";

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
              //Obtener fecha y ponerla en formato español
              $originalDate = $row_article['dateupload'];
              $fecha = date("d-M-Y H:i", strtotime($originalDate));
            ?>
            <td><?= $fecha ?> hrs.</td>

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

            <td><?= $status?></td>
            <td class="text-center">
              <a href="view.php?id=<?= $row_article['noarticle']?>" class="btn btn-info">View Article</a>
              <br><br>
              <button data-toggle="modal" data-target="#view-modal" data-id="<?= $row_article['noarticle']?>" id="getArticle" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Ver datos">Assign reviewer</button>

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





<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
   <div class="modal-content">

    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
     <h4 class="modal-title">
       <i class="glyphicon glyphicon-file"></i> Article
     </h4>
   </div>

   <div class="modal-body">

    <div id="modal-loader" style="display: none; text-align: center;">
     <img src="../img/ajax-loader.gif">
   </div>
   <div id="dynamic-content"></div>
 </div>

 <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>

</div>
</div>
</div>

<?php include("footer.php") ?>


<script type="text/javascript">
  $(document).ready(function(){

    $(document).on('click', '#getArticle', function(e){

     e.preventDefault();

       var uid = $(this).data('id'); // get id of clicked row
       $('#dynamic-content').html(''); // leave this div blank
       $('#modal-loader').show();      // load ajax loader on button click

       $.ajax({
        url: 'getArticle.php',
        type: 'POST',
        data: 'id='+uid,
        dataType: 'html'
      })
       .done(function(data){
            //console.log(data);
            $('#dynamic-content').html(''); // blank before load.
            $('#dynamic-content').html(data); // load here
            $('#modal-loader').hide(); // hide loader
          })
       .fail(function(){
        $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Ups! Algo malo ocurrio, Por favor intenta otra vez...');
        $('#modal-loader').hide();
      });

     });
  });
</script>
