<?php
include '../../Include/_Session.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
{
    include('../../Include/_dbconnect.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {    // Retrieve form data
        $username=$_SESSION['username']; 
        $date = $_POST['date'];
        $status =$_POST['status'];

        $checkSql1 = "SELECT * FROM `attendance` WHERE `attendance_date` = '$date' AND `member_id` IN (SELECT `member_id` FROM `members` WHERE `username` = '$username')";
        $checkResult1 = mysqli_query($conn, $checkSql1);
        if (mysqli_num_rows($checkResult1) > 0) {
            // Entry already exists, show an error message
            echo "<script>alert('Already marked Attendance for DAY');</script>";
            echo "<script>window.location.href = 'User_attendance.php';</script>";
        }
        else 
        {
    
                $checkSql2 = "SELECT `members`.`username`, `attendance`.`attendance_date`, `attendance`.`status`
                FROM `members`
                JOIN `attendance` ON `members`.`member_id` = `attendance`.`member_id`
                WHERE `members`.`username` = '$username'";


                $checkResult2 = mysqli_query($conn, $checkSql2);
                if($checkResult2==True)
                    {
                        $sql2="INSERT INTO `attendance` (`attendance_date`, `status`, `member_id`)
                        SELECT '$date' as date, '$status' as status, `member_id`
                        FROM `members`
                        WHERE `username` = '$username'";

                        $result = mysqli_query($conn,$sql2);

                        // Check if the query was successful
                        if ($result) {
                            echo "<script>window.history.back();</script>";
                        } 
                        else 
                        {
                            echo "<html><head><script>alert('Failed to mark attendance: '. mysqli_error($conn));</script></head></html>";
                        }
                    }
        }
    }
    mysqli_close($conn);
}

?>