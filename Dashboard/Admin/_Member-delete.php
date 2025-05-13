<?php
include('../../Include/_Session-admin.php');

if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    include('../../Include/_dbconnect.php');

    if (isset($_GET['id'])) {
        $member_id = $_GET['id'];

        // Begin a transaction
        $conn->begin_transaction();

        // Attempt to delete related attendance records
        $delete_attendance_sql = "DELETE FROM `attendance` WHERE `member_id` = $member_id";
        if ($conn->query($delete_attendance_sql) === TRUE) {
            // Now delete the member
            $delete_member_sql = "DELETE FROM `members` WHERE `member_id` = $member_id";

            if ($conn->query($delete_member_sql) === TRUE) {
                // Both operations succeeded, commit the transaction
                $conn->commit();
                header("location:Admin_member_management.php");
                exit; // Stop further execution after redirect
            } else {
                // Error deleting member, rollback the transaction
                $conn->rollback();
                echo "Error deleting member: " . $conn->error;
            }
        } else {
            // Error deleting attendance records, rollback the transaction
            $conn->rollback();
            echo "Error deleting attendance records: " . $conn->error;
        }
    }

    $conn->close();
}
?>
