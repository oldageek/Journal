<?php include("header.php") ?>

<?php 


//Seleccionamos todos los articulos del autor
$query ="SELECT * FROM article WHERE idauthor = $idauthor ORDER BY idarticle DESC";
$result = mysqli_query($dbc, $query) or die (mysqli_error($dbc));

$date = date('d-m-Y');
$key = md5($name.$lastname.$familyname.$date);

 ?>


<div class="container-fluid main-container">

<?php include("menu.php") ?>

<div class="col-md-10 content">

<ol class="breadcrumb azul1 blanco">
  <li><a href="index.php">Home</a></li>
  <li class="active">History of articles</li>
</ol>
<div class="panel panel-default">
  <div class="panel-heading azul1 blanco">
    History of articles
  </div>
  <div class="panel-body">
    <div class="row">
      <?php if(!empty($_SESSION['success'])){
               echo $_SESSION['success'];
               unset($_SESSION['success']);
          } ?>


      <div class="col-md-12 text-center">
    
        <table class="table table-bordered">
          <tr>
            <th>Name</th>
            <th>Status</th>
            <th>Date send</th>
            <th></th>
          </tr>
          <?php while($row_article = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
          <tr>
            <td><?= $row_article['title']?></td>

            <?php  
              $status = $row_article['status'];
            ?>

            <?php if ($status == 1) { ?>
              <td><span class="label label-warning">Waiting to accept...</span></td>
            <?php   }elseif ($status == 2) {  ?>
              <td><span class="label label-info">Review in progress</span></td>
            <?php  }elseif ($status == 3) {  ?>
              <td><span class="label label-info">Editor Review in progress </span></td>
            <?php  }elseif ($status == 4) {  ?>
              <td><span class="label label-success">Evaluated and published </span></td>
            <?php  }elseif ($status == 5) {  ?>
            <td><span class="label label-danger">Rejected </span></td>
            <?php }else{  ?>
            <td><p class="text-danger">Status Error, contact to the admin...</p></td>
            <?php } ?>

            <?php 
              //Obtener fecha y ponerla en formato español
              $originalDate = $row_article['uploadDate'];
              $fecha = date("d-M-Y H:i", strtotime($originalDate));
            ?>
            <td><?= $fecha ?> hrs.</td>


            <td><button data-toggle="modal" data-target="#view-modal" data-id="<?= $row_article['idauthor']?>" id="getArticle" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Ver datos">More...</button>
            <br><br> <a href="generate.php?id=<?= $row_article['idarticle']?>&idauthor=<?= $idauthor?>&key=<?= $key ?>" class="btn btn-success">Generate constancy</a></td>

          </tr>
          <?php } ?>
          
        </table>

     <?php //Poner soo 5 articulos y luego botón ver todos los articulos ?>

      </div>
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
