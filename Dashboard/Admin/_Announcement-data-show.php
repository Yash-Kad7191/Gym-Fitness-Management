<?php
  if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) 
 {
    include('../../Include/_dbconnect.php');

        // Your SQL query to fetch announcements from the database
        $sql = "SELECT * FROM announcement";
        $result = mysqli_query($conn, $sql);
        echo"<html><body><table border=1;>";
        // Check if there are any announcements
    if (mysqli_num_rows($result) > 0) {
        echo '<html>';
        echo '<head>';
        echo '<title>Announcements</title>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '</head>';
        echo '<body ">';
        echo '<h2>Available Announcements</h2>';
        echo '<table border="1">';
        echo '<tr><th>A_Id</th><th>Title</th><th>Announcements</th><th>Date&Time</th><th>Operations</th></tr>';
          while ($row = mysqli_fetch_assoc($result)) 
          {
            $an_id=$row['announcement_id'];
            echo"
                <tr>
                    <td>" . $row['announcement_id'] . "</td>
                    <td>". $row['announcement_title'] . "</td>
                    <td>" . nl2br($row['announcements']) . "</td><!--Use nl2br() to display line breaks-->
                    <td>" . $row['dt'] . "</td>   
                    <td class='grp-btn'>
                        <a class='btn1' href='_Announcement-data-update.php?an_id=$row[announcement_id]'>Edit</a>
                        <a class='btn2'  href='_Announcement-data-delete.php?an_id=$an_id'>Delete</a>
                    </td>
                </tr>";
            }
          echo '</table>';
          echo '</body>';
          echo '</html>';
     }
    else 
     {
     echo '<tr><td colspan="4">No announcements available</td></tr>';
     }
     // Close the database connection
     mysqli_close($conn);
    }

?>