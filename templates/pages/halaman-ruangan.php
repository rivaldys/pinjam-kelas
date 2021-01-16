<table>
	<tr>
		<th>No.</th>
		<th>ID Ruangan</th>
		<th>Nama Ruangan</th>
		<th>Status Ruangan</th>
		<th>Aksi</th>
	</tr>
 	
	<?php $no = 1; foreach ($tb as $baris): ?>
	<tr>
		<td align="center"><?php echo $no; ?></td>
		<td align="center"><?php echo $baris['id_ruangan']; ?></td>
		<td align="center"><?php echo $baris['nama_ruangan']; ?></td>
		<td align="center"><?php echo $baris['status']; ?></td>
		<td align="center">
			<div class="button-edit">
	            <a href="" data-toggle="modal" data-target="#suntingruangan<?php echo $baris['id_ruangan']; ?>" data-backdrop="static">Sunting</a>
	        </div>
	        <div class="button-delete">
	        	<a href="" data-toggle="modal" data-target="#hapusruangan<?php echo $baris['id_ruangan']; ?>" data-backdrop="static">Hapus</a>
	        </div>
		</td>
	</tr>
  	<?php $no++; endforeach; ?>
</table>


<!-- Modal Buat Ruangan [Awal] -->
<div id="buatruangan" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Konten Modal [Awal] -->
		<div class="modal-content">
			<div class="modal-header">
				Tambah Ruangan Baru
				<button type="button" class="close" data-dismiss="modal"><span class="lnr lnr-cross-circle"></span></button>
			</div>

			<div class="modal-body">
				<?php echo form_open('dashboard/buat-ruangan'); ?>
				<ul>
					<li>
						<div><i class="lnr lnr-user"></i></div><input type="text" name="id_ruangan" placeholder="ID ruangan" required />
					</li>
					<li>
						<div><i class="lnr lnr-text-format"></i></div><input type="text" name="nama_ruangan" placeholder="Nama ruangan" required />
					</li>
					<br /><hr />
					<li>
						<input type="submit" name="tombol_tambah" value="Tambah" />
					</li>
				</ul>
				<?php echo form_close(); ?>
			</div>

			<div class="modal-footer">
				<span>Pastikan data telah terisi dengan benar.</span>
			</div>
		</div>
		<!-- Konten Modal [Akhir] -->
	</div>
</div>
<!-- Modal Buat Ruangan [Akhir] -->


<!-- Modal Perbarui Data Ruangan [Awal] -->
<?php foreach ($tb as $baris): ?>
<div id="suntingruangan<?php echo $baris['id_ruangan']; ?>" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Konten Modal [Awal] -->
		<div class="modal-content">
			<div class="modal-header">
				Sunting Data Ruangan
				<button type="button" class="close" data-dismiss="modal"><span class="lnr lnr-cross-circle"></span></button>
			</div>

			<div class="modal-body">
				<?php echo form_open('dashboard/perbarui-ruangan'); ?>
				<ul>
					<li>
						<input type="hidden" name="id_ruangan" value="<?php echo $baris['id_ruangan']; ?>">
					</li>
					<li>
						<div><i class="lnr lnr-user"></i></div><input type="text" placeholder="ID ruangan" value="<?php echo $baris['id_ruangan']; ?> (tidak dapat diubah)" disabled />
					</li>
					<li>
						<div><i class="lnr lnr-text-format"></i></div><input type="text" name="nama_ruangan" placeholder="Nama lengkap" value="<?php echo $baris['nama_ruangan']; ?>" required />
					</li>
					<br /><hr />
					<li>
						<input type="submit" name="tombol_simpan" value="Simpan" />
					</li>
				</ul>
				<?php echo form_close(); ?>
			</div>

			<div class="modal-footer" >
				<span>Pastikan data telah terisi dengan benar.</span>
			</div>
		</div>
		<!-- Konten Modal [Akhir] -->
	</div>
</div>
<?php endforeach; ?>
<!-- Modal Perbarui Data Ruangan [Akhir] -->


<!-- Modal Hapus Data Ruangan [Awal] -->
<?php foreach ($tb as $baris): ?>
<div id="hapusruangan<?php echo $baris['id_ruangan']; ?>" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Konten Modal [Awal] -->
		<div class="modal-content">
			<div class="modal-header">
				Hapus Data Ruangan
				<button type="button" class="close" data-dismiss="modal"><span class="lnr lnr-cross-circle"></span></button>
			</div>

			<div class="modal-body">
				<?php echo form_open('dashboard/hapus-ruangan'); ?>
				<ul>
					<li>
						<input type="hidden" name="id_ruangan" value="<?php echo $baris['id_ruangan']; ?>">
					</li>
					<li>
						<p>Apakah Anda yakin ingin menghapus ruangan <span><?php echo $baris['nama_ruangan']; ?></span> dari sistem?</p>
					</li>
					<br /><hr />
					<li>
						<input type="submit" name="tombol_hapus" value="Hapus" />
					</li>
				</ul>
				<?php echo form_close(); ?>
			</div>

			<div class="modal-footer">
				<span>Pastikan kembali apakah data benar-benar ingin dihapus.</span>
			</div>
		</div>
		<!-- Konten Modal [Akhir] -->
	</div>
</div>
<?php endforeach; ?>
<!-- Modal Hapus Data Ruangan [Akhir] -->