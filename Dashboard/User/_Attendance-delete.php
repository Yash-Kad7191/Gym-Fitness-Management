<?php

  include('../../Include/_dbconnect.php');

  if (isset($_GET['id'])) {
    $attendance_id =$_GET['id']; // Sanitize input

    // Use prepared statement with parameter binding to prevent SQL injection
    $sql = "DELETE FROM `attendance` WHERE `attendance_id` = '$attendance_id'";
    $result=mysqli_query($conn,$sql);

    if ($result) {
      if ($result) {
         echo "<script>alert('Attendance record deleted successfully.');</script>";
         echo "<script>window.location.href = 'User_attendance.php';</script>";
          exit();
      } else {
        echo "<script>alert('Error deleting attendance record: " . mysqli_error($conn) . "');</script>"; // More specific error message
        echo "<script>window.location.href = 'User_attendance.php'';</script>";
        exit();
      }
    //   mysqli_stmt_close($stmt);
    } else {
      echo "<script>alert('Error preparing statement: " . mysqli_error($conn) . "');</script>";
      echo "<script>window.location.href = 'User_attendance.php'';</script>";
      exit();
    }
  } else {
    echo "<script>alert('Invalid request.');</script>";
    echo "<script>window.location.href = 'User_attendance.php'';</script>";
    exit();
  }

?>
