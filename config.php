<?php
    $u_mysql = 'root';
    $p_mysql = '';
    
    try{
        $config = new PDO('mysql:host=localhost;dbname=e_smk',$u_mysql,$p_mysql);
    } 
    catch (PDOException $salah) {
        echo $salah->getMessage();
    }
