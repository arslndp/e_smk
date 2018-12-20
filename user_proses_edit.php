<?php
require 'config.php';

//$u_login = $_POST['u_login'];
$p_login = $_POST['p_login'];
$id_login = $_POST['id_login'];

$password = $_POST['password'];
$sql_l = 'SELECT * FROM t_login WHERE p_login = MD5(?)';
$row_l = $config -> prepare($sql_l);
$row_l -> execute(array($password));
$jumRow_l = $row_l -> rowCount();

if($jumRow_l > 0){
    $sql = 'UPDATE t_login SET p_login = MD5(?) WHERE id_login = ?';
    $row = $config -> prepare($sql);
    $row -> execute(array($p_login,$id_login));
    echo '<script>alert("Ubah Password Berhasil");window.location="guru.php";</script>';
}
else{
    echo '<script>alert("Password Lama Salah");history.go(-1);</script>';
}
