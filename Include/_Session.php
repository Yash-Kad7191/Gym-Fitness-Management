<?php
session_start();

if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!=true){
    header("location: index.php");
    exit;
}
$username=$_SESSION['username'];
?>