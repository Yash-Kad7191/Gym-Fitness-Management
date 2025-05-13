<?php
include('../../Include/_Session-admin.php');
 if(isset($_SESSION['logged'])||$_SESSION['logged']==TRUE)
 {
  include('../../Include/_dbconnect.php');
if(isset($_GET['an_id'])){
    $an_id = $_GET['an_id'];
    $sql = "DELETE FROM `announcement` WHERE `announcement_id` = '$an_id'";
    $result=mysqli_query($conn,$sql);

    if ($result === TRUE) {
        header("location:Admin_announcement.php");
        
    } else {
        echo "Error deleting announcement: " . $conn->error;
    }
}
$conn->close();
}
?>
