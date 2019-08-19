
<div class="col-md-2 sidebar">
  <div class="row">
	<div class="absolute-wrapper"> </div>
	<div class="side-menu">
		<nav class="navbar navbar-default" role="navigation">
			<div class="side-menu-container">

        <ul class="nav navbar-nav">
          <div class="profile-sidebar">
            <!-- SIDEBAR USERPIC -->
            <div class="profile-userpic">
              <?php if (empty($row_usuario['imagen'])) {?>
              <img src="../img/user.png" alt="User image" class="img-responsive">
              <?php }else{ ?>
              <img src="uploads/<?= $row_usuario['imagen']?>" alt="User image" class="img-responsive">
              <?php } ?>
            </div>
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle">
              <div class="profile-usertitle-name">
                  <?= $usuario?>
              </div>
              <div class="profile-usertitle-job">
              	  [Associate Editors]
                  <?= $row_usuario['rol'];?>
              </div>
            </div>

           </div>

				<li><a href="#">New subtmition</a></li>
			
				
				<li class="panel panel-default" id="dropdown">
					<a data-toggle="collapse" href="#dropdown-lvl1">
						<span class="glyphicon glyphicon-user"></span> Users <span class="caret"></span>
					</a>


					<div id="dropdown-lvl1" class="panel-collapse collapse">
						<div class="panel-body">
							<ul class="nav navbar-nav">
								<li><a href="users.php">List Users</a></li>
								<li><a href="#">Mass mailing</a></li>
								<li><a href="#">Added user</a></li>
								<li><a href="#">Correos-error</a></li>							
							</ul>
						</div>
					</div>
				</li>

      

				</ul>
			</div>
		</nav>

	</div>
</div>

</div>
