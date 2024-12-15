<?php
include('config.php');
unset($_SESSION['UID']);
unset($_SESSION['UNAME']);
echo "<script> window.location.href = 'index.php' </script>";
?>