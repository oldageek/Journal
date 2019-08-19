

<?php include("header.php") ?>

<div class="container-fluid main-container">

<?php //include("menu.php") ?>

<div class="col-md-10 col-md-offset-1 content">

<ol class="breadcrumb azul1 blanco">
  <li class="active">Inicio</li>
</ol>
<div class="panel panel-default">
  <div class="panel-heading azul1 blanco">
    Bienvenido [<?= $usuario?>]
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center">
        <h3>Subir artículo</h3>
        <form>
          <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Escribe el titulo">
          </div>

          <div class="form-group">
            <label for="descripcion">Descripción corta</label>
            <textarea class="form-control" name="descripcion" rows="5"></textarea>
            
          </div>

          <div class="form-group">
            <label for="descripcion">Archivo PDF (máximo 5mb)</label>
            <input type="file" class="form-control" name="archivo">
          </div>

          <div class="form-group">
            <label for="descripcion">Seleccionar categoría</label>
            <select class="form-control" name="categoria">
              <option value="">Categoría 1</option>
              <option value="">Categoría 2</option>
              <option value="">Categoría 2</option>
            </select>
          </div>

          <div class="form-group">
            
            <input type="submit" class="btn btn-primary" value="Enviar articulo">
          </div>
          
        </form>
      </div>

    </div>
  </div>
</div>
</div>



    </div>

<?php include("footer.php") ?>