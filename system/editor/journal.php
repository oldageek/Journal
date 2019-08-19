<?php include("header.php") ?>

<?php 

//Selecciono los articulos
$query = "SELECT * FROM journal WHERE status=1";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));



if (isset($_POST['submitted'])) {
  $name = $_POST['name'];
  $volume = $_POST['volume'];
  $date = $_POST['date'];
  $status = 1;

  $query = "SELECT * FROM journal";
  $result = mysqli_query($dbc, $query);
  $no = mysqli_num_rows($result);

  $newNo = $no + 1;

  $query = "INSERT INTO journal (NoJournal, name, volume, date, status) VALUES($newNo, '$name', $volume, '$date', $status)";
  $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
  if ($result) {


    $_SESSION['message'] = '<p class="text-success">Add new journal!</p>';
    echo '<script type="text/javascript">window.location="journal.php";</script>';
  }else{
     $_SESSION['message'] = '<p class="text-danger">Error to create journal, try again...</p>';
     echo '<script type="text/javascript">window.location="journal.php";</script>';
  }
}

?>


<div class="container-fluid main-container">

<?php include("menu.php") ?>

<div class="col-md-10 content">


<ol class="breadcrumb azul1 blanco">
  <li><a href="index.php">Home</a></li>
  <li class="active">Journals</li>
</ol>


<div class="panel panel-default">

  <div class="panel-body">
    <h3>Journals</h3> 
    <?php 
      if(!empty($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      } 
    ?>
    <p class="text-right"><a href="#addjournal" data-toggle="modal" data-target="#addjournal" class="btn btn-primary">Add new Journal</a> </p>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No. Journal</th>
            <th>Name</th>
            <th>Volume</th>
            <th>Status</th>
            <th>Date created</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php  while ($row_journal = mysqli_fetch_array($result, MYSQLI_ASSOC)){?>
          <tr>
            <td><?= $row_journal['NoJournal']?></td>
            <td><?= $row_journal['name']?></td>
            <td><?= $row_journal['volume']?></td>
            <?php 
            $status = $row_journal['status'];
            if ($status == 1) {
              $status = "Published";
              
            }elseif ($status == 2) {
              $status = "In progress..";
              
            }elseif ($status == 3) {
             $status = "Not published";
             
            }

            ?>

            <td><?= $status?></td>

            <?php 
              //Obtener fecha y ponerla en formato español
              $originalDate = $row_journal['date'];
              $fecha = date("d-M-Y", strtotime($originalDate));
            ?>
            <td><?= $fecha ?></td>

            <td>---</td>
            
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
<div class="modal fade" id="addjournal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add new jornal</h4>
      </div>
      <div class="modal-body">
        <div class="col-md-8 col-md-offset-2">
          <form method="post" action="journal.php">
            <div class="form-group">
              <label for="name">Name Journal</label>
              <input type="text" name="name" class="form-control" value="Mexican Journal of Materials Science and Engineering" required>
            </div>
            <div class="form-group">
              <label for="volume">Volume</label>
              <input type="number" name="volume" class="form-control" placeholder="1" required>
            </div>
            <div class="form-group">
              <label for="date">Date</label>
              <input type="date" name="date" class="form-control" required>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        
        <input type="submit" class="btn btn-primary"" value=" Add new journal">
        <input type="hidden" name="submitted" value="TRUE">
        </form>
      </div>
    </div>
  </div>
</div>


<?php include("footer.php") ?>