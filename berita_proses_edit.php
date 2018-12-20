<?php
require 'config.php';
ini_set('date.timezone', 'Asia/Jakarta');
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$id_guru = $_POST['id_guru'];

$target_path = "assets/img/gallery/";

$target_path = $target_path . basename($_FILES['gambar']['name']); 

if(move_uploaded_file($_FILES['gambar']['tmp_name'], $target_path)) {
   $id_berita = $_POST['id_berita'];
   $data[] = $judul;
   $data[] = $isi;
   $data[] = $id_guru;
   $data[] = $_FILES['gambar']['name'];
   $data[] = date("Y-m-d h:i:s");
   $data[] = $id_berita;
   $sql = 'UPDATE t_berita SET judul=?,isi=?,id_guru=?,gambar=?,tgl_update=?
           WHERE id_berita=?';
   $row = $config -> prepare($sql);
   $row -> execute($data);
   echo '<script>alert("Ubah Data Berhasil");window.location="berita.php";</script>';
} 
else{
   $id_berita = $_POST['id_berita'];
   $data[] = $judul;
   $data[] = $isi;
   $data[] = $id_guru;
   $data[] = date("Y-m-d h:i:s");
   $data[] = $id_berita;
   $sql = 'UPDATE t_berita SET judul=?,isi=?,id_guru=?,tgl_update=?
           WHERE id_berita=?';
   $row = $config -> prepare($sql);
   $row -> execute($data);
   echo '<script>alert("Ubah Data Berhasil");window.location="berita.php";</script>';
}


