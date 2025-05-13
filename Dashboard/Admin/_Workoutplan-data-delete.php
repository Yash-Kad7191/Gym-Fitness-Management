<?php
// Include your database connection file
include '../../Include/_Session-admin.php';
if(isset($_SESSION['logged'])||$_SESSION['logged']==TRUE)
{
include('../../Include/_dbconnect.php');
if(isset($_GET['plan_id']))
{
    $plan_id=$_GET['plan_id'];
    $sql="DELETE FROM `workout_plans` WHERE `plan_id`='$plan_id'";
    $result=mysqli_query($conn,$sql);
   
    echo"<script>alert('Workoutplan Deleted Successfully');</script>";
    echo"<script>window.history.back();</script>";
}
}

// Close the database connection
mysqli_close($conn);
?>