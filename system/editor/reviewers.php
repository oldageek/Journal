<?php include("header.php") ?>

<?php 

//Selecciono los revisores
$query = "SELECT * FROM rol WHERE rol=3";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));


?>


<div class="container-fluid main-container">

<?php include("menu.php") ?>

<div class="col-md-10 content">


<ol class="breadcrumb azul1 blanco">
  <li><a href="index.php">Home</a></li>
  <li class="active">Reviewers</li>
</ol>


<div class="panel panel-default">
  <div class="panel-body">
    <h3>View active reviewers</h3>

    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID Reviewer</th>
            <th>Name</th>
            <th>University</th>
            <th>Dependence</th>
            <th>State</th>
            <th>Email</th>
            <th>Phone</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php  while ($row_reviewer = mysqli_fetch_array($result, MYSQLI_ASSOC)){?>
          <tr>
            <td><?= $row_reviewer['idrol']?></td>
            <td><?= $row_reviewer['name']?> <?= $row_reviewer['lastName']?> <?= $row_reviewer['familyName']?> </td>
            <td><?= $row_reviewer['university']?></td>
            <td><?= $row_reviewer['dependence']?></td>
            <td><?= $row_reviewer['state']?></td>
            <td><?= $row_reviewer['email']?></td>
            <td><?= $row_reviewer['phone']?></td>
            <td class="">
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