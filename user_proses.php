<?php
require 'config.php';

$u_login = $_POST['u_login'];
$p_login = $_POST['p_login'];
$id_guru = $_POST['id_guru'];

$user = $u_login;
$sql_l = 'SELECT * FROM t_login WHERE u_login = ?';
$row_l = $config -> prepare($sql_l);
$row_l -> execute(array($u_login));
$jumRow_l = $row_l -> rowCount();

if($jumRow_l == 0){
    $data[] = $u_login;
    $data[] = $p_login;
    $data[] = $id_guru;
    $data[] = date("Y-m-d h:i:s");
    $sql = 'INSERT INTO t_login(u_login, p_login, id_guru, tgl_daftar)
            VALUES(?,MD5(?),?,?)';
    $row = $config -> prepare($sql);
    $row -> execute($data);
    echo '<script>alert("Tambah User Berhasil");window.location="guru.php";</script>';
}
else{
    echo '<script>alert("Nama User Sudah Ada");history.go(-1);</script>';
}
