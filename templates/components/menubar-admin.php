<!-- Menubar Admin: Bagian Umum -->
<ul>
	<li <?php if($hal == "Beranda") echo "class='active'"; ?>>
		<a href="<?php echo base_url('dashboard'); ?>"><!-- <span class="lnr lnr-home"></span> -->Beranda</a>
	</li>
	<li <?php if($hal == "Kelola Akun Pengguna") echo "class='active'"; ?>>
		<a href="<?php echo base_url('dashboard/akun-pengguna'); ?>"><!-- <span class="lnr lnr-user"></span> -->Akun Pengguna</a>
	</li>
	<li <?php if($hal == "Kelola Data Ruangan") echo "class='active'"; ?>>
		<a href="<?php echo base_url('dashboard/data-ruangan'); ?>"><!-- <span class="lnr lnr-database"></span> -->Data Ruangan</a>
	</li>
	<li <?php if($hal == "Data Peminjaman" OR $hal == "Laporan Peminjaman") echo "class='active'"; ?>>
		<a href="<?php echo base_url('dashboard/data-peminjaman'); ?>"><!-- <span class="lnr lnr-layers"></span> -->Data Peminjaman
			<?php if ($hal == "Data Peminjaman"): ?>
				<?php foreach($tb as $baris): ?>
					<?php if($baris['status_pinjam'] == "Menunggu"): ?>
						<span class="badge badge-pill badge-secondary">1</span>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif ?>
		</a>
	</li>
	<li <?php if($hal == "Riwayat Akses Ruangan") echo "class='active'"; ?>>
		<a href="<?php echo base_url('dashboard/akses-ruangan'); ?>"><!-- <span class="lnr lnr-history"></span> -->Riwayat Akses Ruangan</a>
	</li>
</ul>