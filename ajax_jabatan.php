<?php
// 1. MEMANGGIL KONEKSI
include "koneksi.php";

// 2. MEMBUAT QUERY
$query = mysqli_query($koneksi, "SELECT * FROM tb_jabatan_2201010029");

// 3. MENAMPILKAN DATA
echo "<option>PILIH</option>";
while ($tampilkan = mysqli_fetch_array($query)) {
	if ($_POST['id_departemen'] == $tampilkan['id_departemen']) {
		echo "<option value='".$tampilkan['id_jabatan']."'>";
		echo $tampilkan['nama_jabatan'];
		echo "</option>";
	}	
}
?>