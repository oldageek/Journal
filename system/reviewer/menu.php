
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
                  <?= $degree ?> <?= $name ?> <?= $lastname ?> <?= $familyname ?>
                </div>
                <div class="profile-usertitle-job">
                  <?= $institution;?>
                </div>
              </div>

           </div>

				<li><a href="#">Home</a></li>
				
				</ul>
			</div>
		</nav>

	</div>
</div>

</div>
