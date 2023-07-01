<?php 
// 1. MENGAMBIL DATA JSON
$data = file_get_contents("data/kecamatan.json");

// 2. KONVERSIKAN DATA JSON MENJADI ARRAY
$kabupaten  = $_POST['regency_id']; // menerima data regency_id
$kecamatan = json_decode($data, true);

// 3. MENAMPILKAN ARRAY
echo "<option>PILIH</option>";
foreach ($kecamatan as $key => $value) {
	// FILTER UNTUK MENCOCOKAN REGENCY_ID
	// DENGAN ID KABUPATEN YG DIPILIH
	// JIKA REGENCY_ID SAMA DENGAN ID KABUPATEN
	if ($kecamatan[$key]['regency_id'] == $kabupaten) {
		echo "<option value=".$kecamatan[$key]['id'].">";
		echo $kecamatan[$key]['name'];
		echo "</option>";
	}
		
}
?>