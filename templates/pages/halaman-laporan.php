<br />
<div class="rentang" align="center">
	Rentang waktu: <?php echo date('d/m/Y', strtotime($tanggal_awal)); ?> hingga <?php echo date('d/m/Y', strtotime($tanggal_akhir)); ?>
</div>
<br />
<!-- Laporan Peminjaman Ruang [Awal] -->
<table>
	<tr>
		<th>No.</th>
		<th>ID Peminjaman</th>
		<th>Pengguna</th>
		<th>Ruang</th>
		<th>Pengajuan</th>
		<th>Penyetujuan</th>
		<th>Pengembalian</th>
		<th>Status <br />Peminjaman</th>
	</tr>

	<?php if(empty($tb)): ?>
	<tr>
		<td align="center" colspan="8">Tidak ada data peminjaman pada rentang waktu tersebut.</td>
	</tr>
 	<?php endif; ?>

	<?php $no = 1; foreach ($tb as $baris): ?>
	<tr>
		<td align="center"><?php echo $no; ?></td>
		<td align="center"><?php echo $baris['id_peminjaman']; ?></td>
		<td><?php echo $baris['peminjam']; ?></td>
		<td align="center"><?php echo $baris['ruangan_dipinjam']; ?></td>
		<td align="center"><?php echo date('d/m/Y H:i', strtotime($baris['waktu_pengajuan'])); ?></td>
		<td align="center">
			<?php if(date('d/m/Y H:i', strtotime($baris['waktu_penyetujuan'])) == '01/01/1970 01:00')
			{
				echo '-';	
			}
			else
			{
				echo date('d/m/Y H:i', strtotime($baris['waktu_penyetujuan']));
			}
			?>
		</td>
		<td align="center">
			<?php if(date('d/m/Y H:i', strtotime($baris['waktu_pengembalian'])) == '01/01/1970 01:00')
			{
				echo '-';	
			}
			else
			{
				echo date('d/m/Y H:i', strtotime($baris['waktu_pengembalian']));
			}
			?>
		</td>
		<td><?php echo $baris['status_pinjam']; ?></td>
	</tr>
	<?php $no++; endforeach; ?>
</table>
<!-- Laporan Peminjaman Ruang [Akhir] -->


<!-- Modal Konfirmasi Unduh Data Laporan [Awal] -->
<?php foreach ($tb as $baris): ?>
<div id="unduh-lap-peminjaman" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Konten Modal [Awal] -->
		<div class="modal-content">
			<div class="modal-header">
				Unduh Laporan Peminjaman
				<button type="button" class="close" data-dismiss="modal"><span class="lnr lnr-cross-circle"></span></button>
			</div>

			<div class="modal-body">
				<?php echo form_open('dashboard/unduh-laporan-peminjaman'); ?>
				<ul>
					<input type="hidden" name="tanggal_awal" value="<?php echo $tanggal_awal; ?>">
					<input type="hidden" name="tanggal_akhir" value="<?php echo $tanggal_akhir; ?>">
					<li>
						<p>Unduh data peminjaman <span><?php echo date('d/m/Y', strtotime($tanggal_awal)); ?></span> hingga <span><?php echo date('d/m/Y', strtotime($tanggal_akhir)); ?></span>?</p>
					</li>
					<br />
					<li>
						<input type="submit" name="tombol_unduh" value="Unduh" />
					</li>
				</ul>
				<?php echo form_close(); ?>
			</div>
		</div>
		<!-- Konten Modal [Akhir] -->
	</div>
</div>
<?php endforeach; ?>
<!-- Modal Konfirmasi Unduh Data Laporan [Akhir] -->