<?php
require 'config.php';
ini_set('date.timezone', 'Asia/Jakarta');
$nis = $_POST['nis'];
$nm_siswa = $_POST['nm_siswa'];
$id_kelas = $_POST['id_kelas'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];
$email = $_POST['email'];
$thn_masuk = $_POST['thn_masuk'];
$thn_keluar = $_POST['thn_keluar'];

$target_path = "assets/img/siswa/";
$id_input = $_POST['id_guru'];

$target_path = $target_path . basename( $_FILES['foto']['name']); 

if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_path)) {
   $data[] = $nis; //1
   $data[] = $nm_siswa; //2
   $data[] = $id_kelas; //3
   $data[] = $alamat; //4
   $data[] = $tlp; //5
   $data[] = $email; //6
   $data[] = $thn_masuk; //7
   $data[] = $thn_keluar; //8
   $data[] = $_FILES['foto']['name']; //9
   $data[] = $id_input; //10
   $sql = 'INSERT INTO t_siswa(nis,nm_siswa,id_kelas,alamat,tlp,email,thn_masuk,thn_keluar,foto,id_input)
           VALUES(?,?,?,?,?,?,?,?,?,?)';
   $row = $config -> prepare($sql);
   $row -> execute($data);
   echo '<script>alert("Tambah Data Berhasil");window.location="siswa.php";</script>';
} 
else{
    echo '<script>alert("Proses Gagal");history.go(-1);</script>';
}


