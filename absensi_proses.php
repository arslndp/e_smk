<?php
require 'config.php';

$id_siswa = $_POST['id_siswa'];
$id_status = $_POST['id_status'];
$keterangan = $_POST['keterangan'];
$tgl_absen = date("Y-m-d h:i:s");
$id_guru = $_POST['id_guru'];

$proses = $_POST['proses'];

if($proses == 'Tambah Absen'){
    $data[] = $id_siswa; //1
    $data[] = $id_status; //2
    $data[] = $keterangan; //3
    $data[] = $tgl_absen; // 4
    $data[] = $id_guru; //5
    $sql = 'INSERT INTO t_absensi(id_siswa, id_status, keterangan, tgl_absen, id_guru)
            VALUES(?,?,?,?,?)';
    $row = $config -> prepare($sql);
    $row -> execute($data);
    echo '<script>alert("Berhasil Simpan");window.location="absensi.php";</script>';
}
else if($proses == 'Ubah Absen'){
    $id_absensi = $_POST['id_absensi'];
    $data[] = $id_siswa; //1
    $data[] = $id_status; //2
    $data[] = $keterangan; //3
    $data[] = $tgl_absen; // 4
    $data[] = $id_guru; //5
    $data[] = $id_absensi; //5
    $sql = 'UPDATE t_absensi SET id_siswa=?, id_status=?, keterangan=?, tgl_absen=?, id_guru=?
            WHERE id_absensi = ?';
    $row = $config -> prepare($sql);
    $row -> execute($data);
    echo '<script>alert("Berhasil Ubah");window.location="absensi.php";</script>';
}
else{
    echo '<script>alert("Gagal Simpan");history.go(-1);</script>';
}

