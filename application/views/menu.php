<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  <a class="navbar-brand" href="#">Medicalck</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

	<div class="collapse navbar-collapse" id="navbarColor01">

		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<?php echo anchor("dashboard","Dashboard",array("class"=>"nav-link")); ?>
			</li>
			
			<?php if($this->session->userdata('userType')==PERMIT_ADMIN){ ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pasien</a>
					<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
						<?php echo anchor("pasien","Pasien Form",array("class"=>"dropdown-item")); ?>
						<?php echo anchor("pasien/daftar","Daftar Pasien",array("class"=>"dropdown-item")); ?>
					</div>
				</li>
				
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Obat</a>
					<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
						<?php echo anchor("obat","Master Obat",array("class"=>"dropdown-item")); ?>
					</div>
				</li>
				
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dokter</a>
					<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
						<?php echo anchor("dokter","Add Dokter",array("class"=>"dropdown-item")); ?>
						<?php echo anchor("dokter/daftar","List Dokter",array("class"=>"dropdown-item")); ?>
					</div>
				</li>
				
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pengguna</a>
					<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
						<?php echo anchor("pengguna","Add New",array("class"=>"dropdown-item")); ?>
						<?php echo anchor("pengguna/listaktif","List Aktif",array("class"=>"dropdown-item")); ?>
						<?php echo anchor("pengguna/listnonaktif","List Non Aktif",array("class"=>"dropdown-item")); ?>
					</div>
				</li>
			<?php } ?>
			
			<?php if(in_array($this->session->userdata('userType'),array(PERMIT_ADMIN,PERMIT_DOKTER))){ ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Checkup</a>
					<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
						<?php echo anchor("checkup","Add new Data",array("class"=>"dropdown-item")); ?>
						<?php echo anchor("checkup/list","List Checkup",array("class"=>"dropdown-item")); ?>
					</div>
				</li>
			<?php } ?>
			
			<?php if(in_array($this->session->userdata('userType'),array(PERMIT_ADMIN,PERMIT_PASIEN))){ ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Payment</a>
					<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
						<?php echo anchor("payment","Add new Data",array("class"=>"dropdown-item")); ?>
						<?php echo anchor("payment/list","List Checkup",array("class"=>"dropdown-item")); ?>
					</div>
				</li>
			<?php } ?>
		</ul>
		
		<div class="my-2 my-lg-0">
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('namaPengguna'); ?></a>
					<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
						<?php echo anchor("login/logout","Log Out",array("class"=>"dropdown-item")); ?>
					</div>
				</li>
			</ul>
		</div>
	</div>
  </div>
</nav>