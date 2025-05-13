<?php
  if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) 
 {
         include('../../Include/_dbconnect.php');

        // Retrieve all workout plans from the 'workout_plans' table
        $sql = "SELECT * FROM workout_plans";
        $result = mysqli_query($conn, $sql);

        // Check if there are any workout plans
        if (mysqli_num_rows($result) > 0) {
            echo '<html>';
            echo '<head>';
            echo '<title>Workout Plans</title>';
            echo '<meta charset="UTF-8">';
            echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
            echo '</head>';
            echo '<body ">';
            echo '<h2><u>Available Workout Plans</u></h2>';
            echo '<table border="1">';
            echo '<tr><th>Plan_Id</th><th>Days</th><th>Description</th><th>Date&Time</th><th>Actions</th></tr>';

            // Loop through each row of the result set
            while ($row = $result->fetch_assoc()) {
                echo"
                <tr>
                    <td>" . $row['plan_id'] . "</td>
                    <td>". $row['day'] . "</td>
                    <td>" . nl2br($row['description']) . "</td>
                    <td>" . $row['dt'] . "</td>   <!--Use nl2br() to display line breaks-->
                    <td class='grp-btn'>
                        <a class='btn1' href='_Workoutplan-data-update.php?plan_id=$row[plan_id]'>Edit</a><br>
                        <a class='btn2'  href='_Workoutplan-data-delete.php?plan_id=$row[plan_id]' onclick='return yesno();'>Delete</a>
                    </td>
                </tr>";
            }

            echo '</table>';
            echo '</body>';
            echo '</html>';
        } else {
            echo "No workout plans available.";
        }
        mysqli_close($conn);
}

// Close the database connection

?>

<html>
    <head>
<script>
            function yesno(){
                const confirmDelete = confirm('Are you sure you want to delete This Plan ?');

                if (confirmDelete) {
                    window.location.href = '_Workout-data-delete.php?plan_id=$row[plan_id]';
                    return true;
                } else {
                    window.location.href = '<?php echo $_SERVER['PHP_SELF']; ?>';
                    return false;
                }
            }
 </script>
 </head>
</html>