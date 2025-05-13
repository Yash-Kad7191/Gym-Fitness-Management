<?php

include '../../Include/_dbconnect.php';
$user_id_auth = ltrim($_POST['username']);
$user_id_auth = rtrim($user_id_auth);

$pass_key = ltrim($_POST['password']);
$pass_key = rtrim($_POST['password']);

$user_id_auth = stripslashes($user_id_auth);//used to remove backslash
$pass_key     = stripslashes($pass_key);

    $user_id_auth = mysqli_real_escape_string($conn, $user_id_auth);
    $pass_key     = mysqli_real_escape_string($conn, $pass_key);
    $sql          = "SELECT * FROM members WHERE username='$user_id_auth' and password='$pass_key'";
    $result       = mysqli_query($conn, $sql);
    $count        = mysqli_num_rows($result);
    if ($count == 1) {
        $row = mysqli_fetch_assoc($result);
        session_start();
        // store session data
        $_SESSION['user_data']  = $user_id_auth;
        $_SESSION['loggedin']     = "start";
        header("location: \Gym-&-Fitness-Management\Dashboard\User\User_dashboard.php");
   }
    else 
    {
       echo"<script>alert('Invalid Username or Password');</script>";
       echo "<script>window.history.back();</script>";
     }
 
?>






<!-- <?php
if ($_SERVER["REQUEST_METHOD"]=='POST')
{
    include('../../Include/_dbconnect.php');
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT * from members where username='$username' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    
    if($num==1){
        echo"Login successful";
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$username;
        header("location: \Gym-&-Fitness-Management\Dashboard\User\User_dashboard.php");
    }
    else{
        echo"Invalid Credentials";
    }
}
?> -->