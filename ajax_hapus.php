<?php
include "koneksi.php";

if (isset($_POST['nip'])) {
    $nip = $_POST['nip'];

    // Lakukan proses penghapusan data
    $query = mysqli_query($koneksi, "DELETE FROM tb_pegawai_2201010029 WHERE nip='$nip'");

    if ($query) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
}
?>
