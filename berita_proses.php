<?php
require 'config.php';
ini_set('date.timezone', 'Asia/Jakarta');
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$id_guru = $_POST['id_guru'];

$target_path = "assets/img/gallery/";

$target_path = $target_path . basename( $_FILES['gambar']['name']); 

if(move_uploaded_file($_FILES['gambar']['tmp_name'], $target_path)) {
   $data[] = $judul;
   $data[] = $isi;
   $data[] = $id_guru;
   $data[] = $_FILES['gambar']['name'];
   $data[] = date("Y-m-d h:i:s");
   $sql = 'INSERT INTO t_berita(judul,isi,id_guru,gambar,tgl_input)
           VALUES(?,?,?,?,?)';
   $row = $config -> prepare($sql);
   $row -> execute($data);
   echo '<script>alert("Tambah Data Berhasil");window.location="berita.php";</script>';
} 
else{
    echo '<script>alert("Proses Gagal");history.go(-1);</script>';
}


