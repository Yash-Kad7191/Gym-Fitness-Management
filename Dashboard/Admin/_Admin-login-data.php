<?php

include '../../Include/_dbconnect.php';
$admin_id_auth = ltrim($_POST['ad_id']);
$admin_id_auth = rtrim($admin_id_auth);

$pass_key = ltrim($_POST['ad_password']);
$pass_key = rtrim($_POST['ad_password']);

$admin_id_auth = stripslashes($admin_id_auth);
$pass_key     = stripslashes($pass_key);

if($pass_key=="" &&  $admin_id_auth==""){
    echo "<head><script>alert('adminname and Password cannot be empty');</script></head></html>";
                echo "<meta http-equiv='refresh' content='0; url=index.php'>";
   
 }
 else if($pass_key=="" ){
    echo "<head><script>alert('Password cannot be empty');</script></head></html>";
                echo "<meta http-equiv='refresh' content='0; url=index.php'>";
   
 }
 else if($admin_id_auth=="" ){
    echo "<head><script>alert('adminname cannot be empty');</script></head></html>";
                echo "<meta http-equiv='refresh' content='0; url=index.php'>";
   
 }
 else
 {

    $admin_id_auth = mysqli_real_escape_string($conn, $admin_id_auth);
    $pass_key     = mysqli_real_escape_string($conn, $pass_key);
    $sql          = "SELECT * FROM admin WHERE admin_username='$admin_id_auth' and admin_password='$pass_key'";
    $result       = mysqli_query($conn, $sql);
    $count        = mysqli_num_rows($result);
    if ($count == 1) {
        $row = mysqli_fetch_assoc($result);
        session_start();
        // store session data
        $_SESSION['admin_data']  = $admin_id_auth;
        $_SESSION['logged']     = "start";
        header("location: \Gym-&-Fitness-Management\Dashboard\Admin\Admin_dashboard.php");
    } else {
        echo "<script>alert('Admin-Id OR Password is Invalid');</script>";
        echo "<script>window.history.back();</script>";
    }
}
 
?>















































<!-- <?php
session_start();
if ($_SERVER["REQUEST_METHOD"]=='POST')
{
    include('../../Include/_dbconnect.php');
    $ad_id=$_POST['ad_id'];
    $ad_password=$_POST['ad_password'];

    $sql="SELECT * FROM admin WHERE ad_id='$ad_id' AND ad_password='$ad_password'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    
    if($num==1){
        echo"Login successful";
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['ad_id']=$ad_id;
        header("location: Admin_dashboard.php");
    }
    else{
        echo"Invalid Credentials";
    }
}
?> -->