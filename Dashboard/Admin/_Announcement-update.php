<?php
include('../../Include/_Session-admin.php');
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    include('../../Include/_dbconnect.php');
    if (isset($_GET['an_id'])) {
        $an_id = $_GET['an_id'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $an_title = $_POST['title'];
            $ann = $_POST['des'];
            $sql1 = "UPDATE `announcement` SET `announcement_title`='$an_title', `announcements`='$ann' WHERE `announcement_id`='$an_id'";
            $result = mysqli_query($conn, $sql1);
            if ($result) {
                echo "<script>alert('Announcement Updated Successfully');</script>";
                // Redirect to another page after updating
                echo "<script>window.history.back();</script>";
                exit(); // Stop further execution
            } else {
                echo "Error updating announcement: " . mysqli_error($conn);
            }
        }
    }
}
?>
