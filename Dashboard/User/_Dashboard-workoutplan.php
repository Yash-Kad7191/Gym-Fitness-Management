<?php
// Include database connection file
include('../../Include/_dbconnect.php');

// Get the current day in string format (e.g., 'Monday', 'Tuesday', etc.)
$current_day = date('l');

// Initialize variable to store workout plans
$workout_plans = '';

// Query to retrieve workout plans for the current day
$sql = "SELECT `plan_id`, `description`,`day` FROM `workout_plans` WHERE `day` = '$current_day'";
$result = mysqli_query($conn, $sql);

// Check if there are workout plans available for the current day
if ($result && mysqli_num_rows($result) > 0) {
    // Display workout plans
    while ($row = mysqli_fetch_assoc($result)) {
        $plan_id = $row['plan_id'];
        $day=$row['day'];
        $description = nl2br($row['description']);
        
        $workout_plans .= "<div class='workout-plan'>
                                <h3>$day</h3><br><br>
                                <p> $description</p>
                            </div>";
    }
} else {
    $workout_plans = "No workout plans available for today.";
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Workout Plans</title>
    <style>
        .workout-plan {

            border: 1px solid #ccc;
            padding: 10px;
            width:300px;
            margin:auto;
        }
    </style>
</head>
<body>
    <h2>Workout Plans for Today (<?php echo $current_day; ?>)</h2><br><br>
    <?php echo $workout_plans; ?>
</body>
</html>
