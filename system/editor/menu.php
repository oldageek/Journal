<?php 

$degree = $row_editor['degree'];
$name = $row_editor['name'];
$lastname = $row_editor['lastName'];
$familyname = $row_editor['familyName'];

$institution = $row_editor['university'];

?>

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

						<li><a href="index.php">Home</a></li>
						<li><a href="reviewers.php">View Reviewers</a></li>
						<li><a href="journal.php">View Journal</a></li>
						<li><a href="areas.php">View Area</a></li>


					</ul>
				</div>
			</nav>

		</div>
	</div>

</div>
