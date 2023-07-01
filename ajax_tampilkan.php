<?php
    include "koneksi.php";
    include "fungsi.php";
?>

<div class="mx-auto">
        <div class="card">
            <div class="card-header text-white bg-primary">
                Data Buku
            </div>
            <div class="card-body">
			<table class="table">
                    <thead>
					<tr>
                            <th scope="col">nip</th>
                            <th scope="col">nama</th>
                            <th scope="col">departemen</th>
                            <th scope="col">jabatan</th>
                            <th scope="col">provinsi</th>
                            <th scope="col">kabupaten</th>
                            <th scope="col">kecamatan</th>
                            <th scope="col">desa</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM tb_pegawai_2201010029");
    while ($tampilkan = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?php echo $tampilkan["nip"];?></td>
            <td><?php echo $tampilkan["nama"];?></td>
            <td><?php tampilkan_nama_departemen($tampilkan["id_departemen"]);?></td>
            <td><?php tampilkan_nama_jabatan($tampilkan["id_jabatan"]);?></td>
            <td><?php tampilkan_nama_provinsi($tampilkan["provinsi"]);?></td>
            <td><?php tampilkan_nama_kabupaten($tampilkan["kabupaten"]);?></td>
            <td><?php tampilkan_nama_kecamatan($tampilkan["kecamatan"]);?></td>
            <td><?php tampilkan_nama_desa($tampilkan["desa"]);?></td>
            <td>
                <button class="btn btn-danger tombol_hapus" value="<?php echo $tampilkan["nip"];?>">HAPUS</button>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<script type="text/javascript">
    $(document).ready(function() {
				$(".tombol_hapus").click(function() {
					$.ajax({
						url: "ajax_hapus.php",
						method: "POST",
						data: {
							nip: $(this).val()
						},
						success: function(data) {
							tampilkan();
							alert("Data berhasil dihapus!");
						},
						error: function(xhr, status, error) {
							alert("Terjadi kesalahan: " + error);
						}
					});
				});
			});

</script>





