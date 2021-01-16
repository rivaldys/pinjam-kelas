<!-- Dropdown Profil -->
<div>
	<a class="dropdown-info" id="dropdown-info" data-toggle="dropdown">
		Halo, <?php echo $this->session->userdata('namalengkap'); ?> <span class="lnr lnr-chevron-down"></span>
	</a>
	
	<div class="dropdown-menu info-content" aria-labelledby="dropdown-info">
		<a class="" href="#">
			<span class="lnr lnr-cog"></span>&nbsp;&nbsp;Informasi Profil
		</a>
		<a class="" href="<?php echo base_url('dashboard/logout'); ?>">
			<span class="lnr lnr-power-switch"></span>&nbsp;&nbsp;Keluar
		</a>
	</div>
</div>