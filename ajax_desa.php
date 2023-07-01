<?php 
// 1. MENGAMBIL DATA JSON
$data = file_get_contents("data/desa.json");

// 2. KONVERSIKAN DATA JSON MENJADI ARRAY
$kecamatan  = $_POST['district_id']; // menerima data district_id
$desa 		= json_decode($data, true);

// 3. MENAMPILKAN ARRAY
echo "<option>PILIH</option>";
foreach ($desa as $key => $value) {
	// FILTER UNTUK MENCOCOKAN DISTRICT_ID
	// DENGAN ID KECAMATAN YG DIPILIH
	// JIKA DISTRICT_ID SAMA DENGAN ID KECAMATAN
	if ($desa[$key]['district_id'] == $kecamatan) {
		echo "<option value=".$desa[$key]['id'].">";
		echo $desa[$key]['name'];
		echo "</option>";
	}
		
}
?>