<?php
// Mendefinisikan file akan diekspor ke format excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file yang akan diekspor
header("Content-Disposition: attachment; filename=Riwayat Akses Ruangan ".date('d-m-Y H.i').".xls");

?>

<!-- Riwayat Akses Ruangan [Awal] -->
<table border="1">
	<tr>
		<th>No.</th>
		<th>ID Kartu</th>
		<th>Nama Ruangan</th>
		<th>Buka Akses</th>
		<th>Tutup Akses</th>
		<th>Status<br />Akses</th>
	</tr>
	
	<?php if(empty($tb)): ?>
	<tr>
		<td align="center" colspan="6">Tidak ada data akses ruangan.</td>
	</tr>
 	<?php endif; ?>

	<?php $no = 1; foreach ($tb as $baris): ?>
	<tr>
		<td align="center"><?php echo $no; ?></td>
		<td align="center"><?php echo $baris['id_kartu']; ?></td>
		<td align="center"><?php echo $baris['nama_ruangan']; ?></td>
		<td align="center"><?php echo date('d/m/Y H:i', strtotime($baris['waktu_akses'])); ?></td>
		<td align="center">
			<?php if(date('d/m/Y H:i', strtotime($baris['waktu_tutup'])) == '01/01/1970 07:00')
			{
				echo '-';	
			}
			else
			{
				echo date('d/m/Y H:i', strtotime($baris['waktu_tutup']));
			}
			?>
		</td>
		<td align="center"><?php echo $baris['status_akses']; ?></td>
	</tr>
	<?php $no++; endforeach; ?>
</table>
<!-- Riwayat Akses Ruangan [Akhir] -->