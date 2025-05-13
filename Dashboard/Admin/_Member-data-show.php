<?php
include '../../Include/_Session-admin.php';

if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    include('../../Include/_dbconnect.php');

    $sql = "SELECT * FROM members";
    $result = $conn->query($sql);
    $total_user = 0;

    echo "<html><body><table border='1'>
            <tr>
                <th>Member ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Subscription Status</th>
                <th>Actions</th>
            </tr>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $total_user++;

            // Fetch membership status for each member
            $sql2 = "SELECT status FROM sales WHERE member_id = '{$row['member_id']}'";
            $result2 = $conn->query($sql2);
            $status = ($result2->num_rows > 0) ? $result2->fetch_assoc()['status'] : 'InActive';

            echo "<tbody><tr>";
            echo "<td>{$row['member_id']}</td>";
            echo "<td>{$row['member_name']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['mobile_no']}</td>";
            echo "<td>$status</td>";
            echo "<td class='grp-btn'>
                    <a class='btn1' href='_Member-view.php?id={$row['member_id']}'>View</a>
                    <a class='btn2' href='_Member-edit.php?id={$row['member_id']}'>Edit</a>
                    <a class='btn3' href='_Member-delete.php?id={$row['member_id']}' onclick='return yesno();'>Delete</a>
                  </td>";
            echo "</tr></tbody>";
        }
    } else {
        echo "<tr><td colspan='6'>No members found</td></tr>";
    }
    echo "</table></body></html>";

    $conn->close();
}

?>

<html>
<head>
    <script>
        function yesno() {
            const confirmDelete = confirm('Are You Sure To Delete this Profile?');

            if (confirmDelete) {
                return true; // The confirmation will proceed with deletion
            } else {
                return false; // The confirmation is canceled
            }
        }
    </script>
</head>
</html>
