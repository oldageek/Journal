<?php include("header.php") ?>


<?php 

$crud = 1;


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
    List Users
  </div>
  <div class="panel-body table-responsive">
  <p class="text-right"><a href="adduser.php" class="btn btn-primary">Add new user</a></p>

  <table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Tools</th>
        </tr>
    </tfoot>
    <tbody>
      <tr>
        <td>201330999</td>
        <td>Omar Hernandez</td>
        <td>omar@correo.com</td>
        <td>Author</td>
        <td><a href="#" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a> <a href="#" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a></td>
      </tr>
    </tbody>
  </table>
    

    


  </div>
  <div class="panel-footer text-right">

    Sitio en desarrollo <b>Realizando pruebas de sistema.</b>
  </div>
</div>
</div>



    </div>

<?php include("footer.php") ?>


</body>
</html>