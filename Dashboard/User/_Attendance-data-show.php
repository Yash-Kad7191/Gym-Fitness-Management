<?php
// Start the session if not already started

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    include('../../Include/_dbconnect.php');
    $present = $absent = 0;
    $username = $_SESSION['username'];

    // Use prepared statements to prevent SQL injection
    $sql1 = "SELECT `members`.`username`, `attendance`.`attendance_date`, `attendance`.`status`,`attendance`.`attendance_id`
             FROM `members`
             JOIN `attendance` ON `members`.`member_id` = `attendance`.`member_id`
             WHERE `members`.`username` = '$username'";
	$result=mysqli_query($conn,$sql1);

    if ($result->num_rows > 0) {
        // Display attendance information in an HTML table
        echo '<html><body><center><table border="1">';
        echo '<tr class="main"><th>Date</th><th>Status</th><th>Action</th></tr>';
        
        while ($row = $result->fetch_assoc()) {
            $date = date('d-m-Y', strtotime($row['attendance_date'])); // Format date as desired
            echo '<tr>';
            echo '<td>' . $date . '</td>';
            echo '<td>' . $row['status'] . '</td>';
            echo "<td ><a href='_Attendance-delete.php?id=$row[attendance_id]' style='    background-color: transparent;
            text-decoration: none;
            border: 2px solid black;
            border: 1px solid white; padding:0px 5px;'>Delete</a>
            </td>";
            echo '</tr>';

            if ($row['status'] == 'Present') {
                $present++;
            } else if ($row['status'] == 'Absent') {
                $absent++;
            }
        }
        echo '</table></center></body></html>';
    } else {
        echo '<section style="font-size:x-large;margin:auto;">No attendance records found.</section>';
    }

    // $stmt->close();
    mysqli_close($conn);
}
?>
