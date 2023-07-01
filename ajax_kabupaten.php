<?php 
// 1. MENGAMBIL DATA JSON
$data = file_get_contents("data/kabupaten.json");

// 2. KONVERSIKAN DATA JSON MENJADI ARRAY
$provinsi  = $_POST['province_id']; // menerima data province_id
$kabupaten = json_decode($data, true);

// 3. MENAMPILKAN ARRAY
echo "<option>PILIH</option>";
foreach ($kabupaten as $key => $value) {
	// FILTER UNTUK MENCOCOKAN PROVINCE_ID
	// DENGAN ID PROVINSI YG DIPILIH
	// JIKA PROVINCE_ID SAMA DENGAN ID PROVINSI
	if ($kabupaten[$key]['province_id'] == $provinsi) {
		echo "<option value=".$kabupaten[$key]['id'].">";
		echo $kabupaten[$key]['name'];
		echo "</option>";
	}
		
}
?>