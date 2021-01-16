<?php
// Mendefinisikan file akan diekspor ke format excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file yang akan diekspor
header("Content-Disposition: attachment; filename=Laporan Peminjaman ".date('d-m-Y H.i').".xls");

?>

Rentang waktu: <?php echo date('d/m/Y', strtotime($tanggal_awal)); ?> hingga <?php echo date('d/m/Y', strtotime($tanggal_akhir)); ?>
<br />
<br />
<!-- Laporan Peminjaman Ruang [Awal] -->
<table border="1">
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