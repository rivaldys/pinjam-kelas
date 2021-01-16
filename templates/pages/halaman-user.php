<!-- Tabel Data User [Awal] -->
<table>
	<tr>
		<th>No.</th>
		<th>Nama Lengkap</th>
		<th>Username</th>
		<th>Level</th>
		<th>Aksi</th>
	</tr>
 	
	<?php $no = 1; foreach ($tb as $user): ?>
	<tr>
		<td align="center"><?php echo $no; ?></td>
		<td><?php echo $user['fullname']; ?></td>
		<td><?php echo $user['username']; ?></td>
		<td><?php echo $user['level']; ?></td>
		<td align="center">
			<div class="button-edit">
	            <a href="" data-toggle="modal" data-target="#suntinguser<?php echo $user['username']; ?>" data-backdrop="static">Sunting</a>
	        </div>
	        <div class="button-delete">
	        	<a href="" data-toggle="modal" data-target="#hapususer<?php echo $user['username']; ?>" data-backdrop="static">Hapus</a>
	        </div>
		</td>
	</tr>
  	<?php $no++; endforeach; ?>
</table>
<!-- Tabel Data User [Akhir] -->


<!-- Modal Buat User [Awal] -->
<div id="buatuser" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Konten Modal [Awal] -->
		<div class="modal-content">
			<div class="modal-header">
				Buat Akun Baru
				<button type="button" class="close" data-dismiss="modal"><span class="lnr lnr-cross-circle"></span></button>
			</div>

			<div class="modal-body">
				<?php echo form_open('dashboard/buat-user'); ?>
				<ul>
					<li>
						<div><i class="lnr lnr-text-format"></i></div><input type="text" name="fullname" placeholder="Nama lengkap" maxlength="25" required />
					</li>
					<li>
						<div><i class="lnr lnr-user"></i></div><input type="text" name="username" placeholder="Nama pengguna" maxlength="10" required />
					</li>
					<li>
						<div><i class="lnr lnr-lock"></i></div><input type="password" name="password" placeholder="Kata sandi" required />
					</li>
					<li>
						<div><i class="lnr lnr-layers"></i></div><select name="level" required="required">
							<option value="" selected>Level</option>
							<option value="Pengguna Ruangan">Pengguna Ruangan</option>
							<option value="Bagian Umum">Bagian Umum</option>
							<option value="Biro Pendidikan">Biro Pendidikan</option>
							<option value="Kabag/Kaprodi">Kabag/Kaprodi</option>
						</select>
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
<!-- Modal Buat User [Akhir] -->


<!-- Modal Perbarui Data User [Awal] -->
<?php foreach ($tb as $user): ?>
<div id="suntinguser<?php echo $user['username']; ?>" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Konten Modal [Awal] -->
		<div class="modal-content">
			<div class="modal-header">
				Sunting Akun
				<button type="button" class="close" data-dismiss="modal"><span class="lnr lnr-cross-circle"></span></button>
			</div>

			<div class="modal-body">
				<?php echo form_open('dashboard/perbarui-user'); ?>
				<ul>
					<li>
						<input type="hidden" name="username" value="<?php echo $user['username']; ?>">
					</li>
					<li>
						<div><i class="lnr lnr-text-format"></i></div><input type="text" name="fullname" placeholder="Nama lengkap" maxlength="25" value="<?php echo $user['fullname']; ?>" required />
					</li>
					<li>
						<div><i class="lnr lnr-user"></i></div><input type="text" placeholder="Nama pengguna" value="<?php echo $user['username']; ?> (tidak dapat diubah)" disabled />
					</li>
					<li>
						<div><i class="lnr lnr-layers"></i></div><select name="level" required="required">
							<option value="" selected>Level</option>
							<option value="Pengguna Ruangan">Pengguna Ruangan</option>
							<option value="Bagian Umum">Bagian Umum</option>
							<option value="Biro Pendidikan">Biro Pendidikan</option>
							<option value="Kabag/Kaprodi">Kabag/Kaprodi</option>
						</select>
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
<!-- Modal Perbarui Data User [Akhir] -->


<!-- Modal Hapus Data User [Awal] -->
<?php foreach ($tb as $user): ?>
<div id="hapususer<?php echo $user['username']; ?>" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Konten Modal [Awal] -->
		<div class="modal-content">
			<div class="modal-header">
				Hapus Akun
				<button type="button" class="close" data-dismiss="modal"><span class="lnr lnr-cross-circle"></span></button>
			</div>

			<div class="modal-body">
				<?php echo form_open('dashboard/hapus-user'); ?>
				<ul>
					<li>
						<input type="hidden" name="username" value="<?php echo $user['username']; ?>">
					</li>
					<li>
						<p>Apakah Anda yakin ingin menghapus akun <span><?php echo $user['fullname']; ?></span> dari sistem?</p>
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
<!-- Modal Hapus Data User [Akhir] -->