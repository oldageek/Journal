<?php include("header.php") ?>

<?php 

//Selecciono los articulos
$query = "SELECT * FROM article_area";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));



if (isset($_POST['submitted'])) {
  $area = $_POST['area'];
  $description = $_POST['description'];


  $query = "INSERT INTO article_area (area, short_description) VALUES('$area', '$description')";
  $result2 = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
  if ($result2) {

    $_SESSION['message'] = '<p class="text-success">Add new area!</p>';
    echo '<script type="text/javascript">window.location="areas.php";</script>';
  }else{
     $_SESSION['message'] = '<p class="text-danger">Error to create area, try again...</p>';
     echo '<script type="text/javascript">window.location="areas.php";</script>';
  }
}

?>


<div class="container-fluid main-container">

<?php include("menu.php") ?>

<div class="col-md-10 content">


<ol class="breadcrumb azul1 blanco">
  <li><a href="index.php">Home</a></li>
  <li class="active">Areas</li>
</ol>


<div class="panel panel-default">

  <div class="panel-body">
    <h3>Areas</h3> 
    <?php 
      if(!empty($_SESSION['message'])){
        echo $_SESSION['message'];

        unset($_SESSION['message']);
      } 
    ?>
    <p class="text-right"><a href="#addarea" data-toggle="modal" data-target="#addarea" class="btn btn-primary">Add new area</a> </p>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Id Area</th>
            <th>Area</th>
            <th>Description</th>
        
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php  while ($row_area = mysqli_fetch_array($result, MYSQLI_ASSOC)){?>
          <tr>
            <td><?= $row_area['idarea']?></td>
            <td><?= $row_area['area']?></td>
            <td><?= $row_area['short_description']?></td>

            <td><a href="#view-modal"  data-toggle="modal" data-target="#view-modal" data-id="<?= $row_area['idarea']?>" id="editarea" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a> <a href="deletearea.php?idarea=<?= $row_area['idarea']?>" class="btn btn-danger confirmation"><span class="glyphicon glyphicon-trash"></span></a></td>
            
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


<!-- Modal -->
<div class="modal fade" id="addarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add new area</h4>
      </div>
      <div class="modal-body">
        <div class="col-md-8 col-md-offset-2">
          <form method="post" action="areas.php">
            <div class="form-group">
              <label for="area">Area name</label>
              <input type="text" name="area" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        
        <input type="submit" class="btn btn-primary"" value=" Add new Area">
        <input type="hidden" name="submitted" value="TRUE">
        </form>
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
       <i class="glyphicon glyphicon-edit"></i> Edit Area
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



<script>
  $('.confirmation').on('click', function () {
    return confirm('Are you sure dalete Area?');
  });

</script>


<script type="text/javascript">
  $(document).ready(function(){

    $(document).on('click', '#editarea', function(e){

     e.preventDefault();

       var uid = $(this).data('id'); // get id of clicked row
       $('#dynamic-content').html(''); // leave this div blank
       $('#modal-loader').show();      // load ajax loader on button click

       $.ajax({
        url: 'editarea.php',
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
