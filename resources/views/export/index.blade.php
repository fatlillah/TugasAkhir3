<?php

include "functions.php";
$mahasiswa=query("SELECT absensi.id_absensi,mahasiswa.nrp,mahasiswa.nama,absensi.tanggal,absensi.keterangan 
					FROM mahasiswa 
					INNER JOIN mahasiswa_absensi 
					ON mahasiswa.nrp=mahasiswa_absensi.nrp 
					INNER JOIN absensi 
					ON mahasiswa_absensi.id_absensi=absensi.id_absensi 
					INNER JOIN matakuliah 
					ON matakuliah.id_matakuliah=absensi.id_matakuliah
					group by mahasiswa.nama;");
?>

<table width="50%" border="0" align="center">

<tr bgcolor="#CCCCCC">

<td width="8%"><div align="center"><strong>No</strong></div></td>

<td width="34%"><div align="center"><strong>ID Absensi</strong></div></td>
<td width="34%"><div align="center"><strong>NRP</strong></div></td>

<td width="26%"><div align="center"><strong>Nama</strong></div></td>

<td width="32%"><div align="center"><strong>Tanggal</strong></div></td>
<td width="32%"><div align="center"><strong>Keterangan</strong></div></td>

</tr>


<?php $i=1;
  foreach($mahasiswa as $m) : ?>
    <tr>
      <td><?= $i++; ?></td>
      <td><?= $m['id_absensi']; ?></td>
      <td><?= $m['nrp']; ?></td>
      <td><?= $m['nama']; ?></td>
      <td><?= $m['tanggal']; ?></td>
      <td><?= $m['keterangan']; ?></td>
    </tr>
  <?php endforeach; ?>
</table>

<?php
header("Content-Type: application/vnd.ms-word");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=laporan.doc");

?>