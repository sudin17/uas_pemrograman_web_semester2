<script type="text/javascript">
    // FUNGSI MENAMPILKAN DATA DALAM table
    function tampilkan() {
        $.ajax({
            url: "ajax_tampilkan.php",
            method: "POST",
            data: "",
            success: function(data) {
                $("#table_pegawai").html(data); // Tambahkan "#" di depan "table_pegawai"
            },
            error: function(xhr, status, error) {
                console.log("Terjadi kesalahan: " + error);
            }
        });
    }
</script>

<?php
    include "koneksi.php";

    function tampilkan_nama_departemen($id_departemen) {
        global $koneksi;
        $query = mysqli_query($koneksi, "SELECT nama_departemen FROM tb_departemen_2201010029 WHERE id_departemen='$id_departemen'");
        while ($tampilkan = mysqli_fetch_array($query)) {
            $nama_departemen = $tampilkan['nama_departemen'];
        }
        echo $nama_departemen;
    }

    function tampilkan_nama_jabatan($id_jabatan) {
        global $koneksi;
        $query = mysqli_query($koneksi, "SELECT nama_jabatan FROM tb_jabatan_2201010029 WHERE id_jabatan='$id_jabatan'");
        while ($tampilkan = mysqli_fetch_array($query)) {
            $nama_jabatan = $tampilkan['nama_jabatan'];
        }
        echo $nama_jabatan;
    }

    function tampilkan_nama_provinsi($id) {
        // 1. MENGAMBIL DATA JSON DARI FILE
        $data = file_get_contents("data/provinsi.json");
    
        // 2. KONVERSIKAN DATA JSON MENJADI ARRAY
        $provinsi = json_decode($data, true);
    
        // 3. MENAMPILKAN NAMA PROVINSI BERDASARKAN ID
        foreach ($provinsi as $item) {
            if ($item['id'] == $id) {
                echo $item['name'];
                break; // Hentikan loop setelah ditemukan ID yang sesuai
            }
        }
    }

    function tampilkan_nama_kabupaten($id) {
        // 1. MENGAMBIL DATA JSON DARI FILE
        $data = file_get_contents("data/kabupaten.json");
    
        // 2. KONVERSIKAN DATA JSON MENJADI ARRAY
        $kabupaten = json_decode($data, true);
    
        // 3. MENAMPILKAN NAMA kabupaten BERDASARKAN ID
        foreach ($kabupaten as $item) {
            if ($item['id'] == $id) {
                echo $item['name'];
                break; // Hentikan loop setelah ditemukan ID yang sesuai
            }
        }
    }

    function tampilkan_nama_kecamatan($id) {
        // 1. MENGAMBIL DATA JSON DARI FILE
        $data = file_get_contents("data/kecamatan.json");
    
        // 2. KONVERSIKAN DATA JSON MENJADI ARRAY
        $kecamatan = json_decode($data, true);
    
        // 3. MENAMPILKAN NAMA kecamatan BERDASARKAN ID
        foreach ($kecamatan as $item) {
            if ($item['id'] == $id) {
                echo $item['name'];
                break; // Hentikan loop setelah ditemukan ID yang sesuai
            }
        }
    }

    function tampilkan_nama_desa($id) {
        // 1. MENGAMBIL DATA JSON DARI FILE
        $data = file_get_contents("data/desa.json");
    
        // 2. KONVERSIKAN DATA JSON MENJADI ARRAY
        $desa = json_decode($data, true);
    
        // 3. MENAMPILKAN NAMA desa BERDASARKAN ID
        foreach ($desa as $item) {
            if ($item['id'] == $id) {
                echo $item['name'];
                break; // Hentikan loop setelah ditemukan ID yang sesuai
            }
        }
    }
    
?>
