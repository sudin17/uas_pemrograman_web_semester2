<?php
// 1. MEMANGGIL KONEKSI
include "koneksi.php";

// 2. MEMBUAT QUERY
$query = mysqli_query($koneksi, "SELECT * FROM tb_departemen_2201010029");

// 3. MENAMPILKAN DATA
echo "<option>PILIH</option>";
while ($tampilkan = mysqli_fetch_array($query)) {
	echo "<option value='".$tampilkan['id_departemen']."'>";
	echo $tampilkan['nama_departemen'];
	echo "</option>";
}
?>