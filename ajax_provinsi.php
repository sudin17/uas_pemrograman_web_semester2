<?php 
// 1. MENGAMBIL DATA JSON
$data = file_get_contents("data/provinsi.json");

// 2. KONVERSIKAN DATA JSON MENJADI ARRAY
$provinsi = json_decode($data, true);

// 3. MENAMPILKAN ARRAY
echo "<option>PILIH</option>";
foreach ($provinsi as $key => $value) {
	echo "<option value=".$provinsi[$key]['id'].">";
	echo $provinsi[$key]['name'];
	echo "</option>";
}
?>