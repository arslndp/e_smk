<?php
session_start();
UNSET($_SESSION['ADMIN']);
echo '<script>window.location="login.php";</script>';
