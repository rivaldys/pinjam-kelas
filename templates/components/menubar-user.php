<!-- Menubar User: Biro Pendidikan, Kabag/Kaprodi, dan Pengguna Ruangan -->
<ul>
	<li <?php if($hal == "Beranda") echo "class='active'"; ?>>
		<a href="<?php echo base_url('dashboard'); ?>"><!-- <span class="lnr lnr-home"></span> -->Beranda</a>
	</li>
	<li <?php if($hal == "Data Peminjaman" OR $hal == "Laporan Peminjaman") echo "class='active'"; ?>>
		<a href="<?php echo base_url('dashboard/data-peminjaman'); ?>"><!-- <span class="lnr lnr-layers"></span> -->Data Peminjaman
			<?php if ($hal == "Data Peminjaman" && $this->session->userdata('level') == "Kabag/Kaprodi" OR $hal == "Data Peminjaman" && $this->session->userdata('level') == "Biro Pendidikan"): ?>
				<?php foreach($tb as $baris): ?>
					<?php if($baris['status_pinjam'] == "Menunggu" ): ?>
						<span class="badge badge-pill badge-secondary">1</span>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif ?>
		</a>
	</li>
</ul>