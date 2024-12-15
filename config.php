<?php
session_start();
$con = mysqli_connect('localhost','root','','expense');
if (!$con) {
    echo 'Connection Failed';
}
?>