<?php
include '../../Include/_Session.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    include('../../Include/_dbconnect.php');
    $username = $_SESSION['username'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $gender=$_POST['gender'];
        $password=$_POST['password'];
        $dob=$_POST['dob'];
        $ph_no=$_POST['ph_no'];
        // $address=$_POST['address'];
        $sql="UPDATE members
        SET
            member_name = '$name',
            email = '$email',
            gender = '$gender',
            password = '$password',
            dob = '$dob',
            mobile_no = '$ph_no'
        WHERE
            username = '$username';
        ";//`address`='$address'
        $result=mysqli_query($conn,$sql);
        if ($result) {
            // echo "<html><head><script>
            // var a= document.getElementById('message');
            // a.innerHTML='';
            // a.innerHTML='Profile Updated Successfully';
            // return true;
            // </script></head></html>";
            echo "<script>alert('Profile data updated Sucessfully');</script>";
        } else {
            echo "<script>alert('Cannot Update Profile Information');</script>";
        }
        mysqli_close($conn);
    }
} 
else 
{
    echo "<script>alert('Invalid request.');</script>";
    echo "<script>window.location.href= User_login.php;</script>";
    exit();
}

?>
