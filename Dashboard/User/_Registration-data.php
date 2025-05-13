<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('../../Include/_dbconnect.php');
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ph_no = $_POST['ph_no'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $add=$_POST['address'];
    $exists = false;
    $existsSql ="SELECT * FROM `members` WHERE username='$username'";
    $result=mysqli_query($conn,$existsSql);
    $numExistsRows =mysqli_num_rows($result);
    if($numExistsRows > 0)
    {
        echo"<html><head><script>alert('Username Already Exists Change ');</script></head></html>";
        echo "<script>window.history.back();</script>";
    }
    else if ($exists == false) 
    {
        $sql = "INSERT INTO `members` (`member_id`,`member_name`, `username`, `password`, `mobile_no`, `email`, `gender`, `dob`,`address`,`joining_date`) 
        VALUES (NULL, '$name', '$username', '$password', '$ph_no', '$email', '$gender', '$dob','$add', current_timestamp())";
        $result=mysqli_query($conn,$sql);
        if ($result) {
            echo"<script>alert('Registration Successful !!');</script>";
            echo "<script>window.location.href = 'User_login.php';</script>";
        } else if (!$result) {
            echo"<script>alert('Failed To Register !!');</script>";
        } 
    }
    mysqli_close($conn);
}
?>