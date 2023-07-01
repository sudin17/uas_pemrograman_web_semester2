<?php 
// MENGGUNAKAN KONEKSI
include "koneksi.php";
 ?>

  <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perusahaan Sudin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script type="text/javascript" src="jquery-3.7.0.min.js"></script>
    <style>
        .mx-auto {
            width: 1000px;
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<?php include "fungsi.php"; ?>
<div id="table_pegawai" ></div>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header text-white bg-primary">
                Update Data Pegawai
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <table class="table table-bordered">
                        <tr>
                            <td>nip</td>
                            <td> : </td>
                            <td>
                                <input type="text" name="nip" id="input_nip"required class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>nama</td>
                            <td> : </td>
                            <td>
                                <input type="text" name="nama" id="input_nama"required class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>departemen</td>
                            <td> : </td>
                            <td>
								<select name="departemen" id="select_departemen" required class="form-control">
                        		<option value="">- Pilih Departemen -</option>
								</select>
                            </td>
                        </tr>
						<tr>
                            <td>jabatan</td>
                            <td> : </td>
                            <td>
								<select name="jabatan" id="select_jabatan" required class="form-control">
                        		<option value="">- Pilih Jabatan -</option>
								</select>
						<tr>
							<td>Provinsi</td>
							<td>:</td>
							<td>
							<select name="province_id" id="province_id"required class="form-control" disabled="">
							</td>
						</tr>
						<tr>
							<td>Kabupaten</td>
							<td>:</td>
							<td>
							<select name="regency_id" id="regency_id" required class="form-control" disabled=""></select>
							</td>
						</tr>
						<tr>
							<td>Kecamatan</td>
							<td>:</td>
							<td>
							<select name="district_id" id="district_id" required class="form-control" disabled=""></select>
							</td>
						</tr>
						<tr>
							<td>Desa</td>
							<td>:</td>
							<td>
							<select name="village_id" id="village_id" required class="form-control" disabled=""></select>
							</td>
						</tr>
                    	</select>
                            </td>
                        </tr>
                    </table>
                    <button type="submit" name="tombol_simpan" id="tombol_simpan" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>



	<script type="text/javascript">
		$(document).ready(function() {

			// memanggil fungsi MENAMPILKAN
			tampilkan();
		    // 1. AJAX MEMILIH PROVINSI
			$.ajax({
				url		: "ajax_provinsi.php",
				method	: "POST",
				data	: "",
				success	: function(data){
					$("#province_id").prop("disabled",false);
					$("#province_id").html(data);
				}
			});

			// 2. AJAX MEMILIH KABUPATEN
			// JIKA PROVINSI SUDAH DIPILIH
			$("#province_id").change(function(){
				// MAKA, JALANKAN AJAX KABUPATEN
				$.ajax({
					url		: "ajax_kabupaten.php",
					method	: "POST",
					data	: {province_id:$("#province_id").val()},
					success	: function(data){
						$("#regency_id").prop("disabled",false);
						$("#regency_id").html(data);
					}
				});
			});

			// 3. AJAX MEMILIH KECAMATAN
			// JIKA KABUPATEN SUDAH DIPILIH
			$("#regency_id").change(function(){
				// MAKA, JALANKAN AJAX KECAMATAN
				$.ajax({
					url		: "ajax_kecamatan.php",
					method	: "POST",
					data	: {regency_id:$("#regency_id").val()},
					success	: function(data){
						$("#district_id").prop("disabled",false);
						$("#district_id").html(data);
					}
				});
			});

			// 4. AJAX MEMILIH DESA
			// JIKA KECAMATAN SUDAH DIPILIH
			$("#district_id").change(function(){
				// MAKA, JALANKAN AJAX DESA
				$.ajax({
					url		: "ajax_desa.php",
					method	: "POST",
					data	: {district_id:$("#district_id").val()},
					success	: function(data){
						$("#village_id").prop("disabled",false);
						$("#village_id").html(data);
					}
				});
			});

			// 5. AJAX MEMILIH departemen
			$.ajax({
				url		: "ajax_departemen.php",
				method	: "POST",
				data	: "",
				success	: function(data){
					$("#select_departemen").prop("disabled",false);
					$("#select_departemen").html(data);
				}
			});

			// 6. AJAX MEMILIH jabatan
			// JIKA departemen SUDAH DIPILIH
			$("#select_departemen").change(function(){
				// MAKA, JALANKAN AJAX jabatan
				$.ajax({
					url		: "ajax_jabatan.php",
					method	: "POST",
					data	: {id_departemen:$("#select_departemen").val()},
					success	: function(data){
						$("#select_jabatan").prop("disabled",false);
						$("#select_jabatan").html(data);
					}
				});
			});

			// MENYIMPAN Data
			
			$(document).ready(function() {
				$("#tombol_simpan").click(function() {
					$.ajax({
						url: "ajax_simpan.php",
						method: "POST",
						data: {
							nip: $("#input_nip").val(),
							nama: $("#input_nama").val(),
							id_departemen: $("#select_departemen").val(),
							id_jabatan: $("#select_jabatan").val(),
							provinsi: $("#province_id").val(),
							kabupaten: $("#regency_id").val(),
							kecamatan: $("#district_id").val(),
							desa: $("#village_id").val()
						},
						success: function(data) {
							tampilkan();
							alert("Data berhasil disimpan!");
						},
						error: function(xhr, status, error) {
							alert("Terjadi kesalahan: " + error);
						}
					});
				});
			});



		});
	</script>
