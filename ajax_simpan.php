<?php
    include "koneksi.php";

    $query = mysqli_query($koneksi, "INSERT INTO tb_pegawai_2201010029
        (nip, nama, id_departemen, id_jabatan, provinsi, kabupaten, kecamatan, desa)
        VALUES (
            '$_POST[nip]',
            '$_POST[nama]',
            '$_POST[id_departemen]',
            '$_POST[id_jabatan]',
            '$_POST[provinsi]',
            '$_POST[kabupaten]',
            '$_POST[kecamatan]',
            '$_POST[desa]'
        )
    ")
?> 

