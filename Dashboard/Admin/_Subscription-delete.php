<?php
    include('../../Include/_dbconnect.php');
    if(isset($_GET['id']))
    {
    $plan_id = $_GET['id'];
            $sql1 = "DELETE FROM sales WHERE plan_id = '$plan_id'";
            $sql2 = "DELETE FROM subscription_plan WHERE plan_id = '$plan_id'";
    
    $result1=mysqli_query($conn,$sql1);
    $result2=mysqli_query($conn,$sql2);

    if ($result1 === TRUE && $result2 === TRUE) {
        echo "<script>alert('Plan deleted successfully.');</script>";
        echo "<script>window.location.href = 'Admin_subscription_management.php';</script>";
    } else {
        echo "<script>alert('Error deleting attendance record: " . mysqli_error($conn) . "');</script>"; // More specific error message
        echo "<script>window.location.href = 'Admin_subscription_management.php'';</script>";
        exit();
      }
} else {
    echo "<script>alert('Invalid request.');</script>";
    echo "<script>window.location.href = 'Admin_subscription_management.php'';</script>";
    exit();
}
$conn->close();
?>
