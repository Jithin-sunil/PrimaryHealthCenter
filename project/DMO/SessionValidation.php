<?php
session_start();
if($_SESSION['did']==""){
    header('location:../Guest/Login.php');
}
?>