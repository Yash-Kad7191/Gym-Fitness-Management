<?php
include '../../Include/_Session.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    include('../../Include/_dbconnect.php');
    $username = $_SESSION['username'];

    $sql = "SELECT 
                sales.member_id, 
                members.member_name, 
                sales.plan_id, 
                subscription_plan.plan_name, 
                subscription_plan.amount, 
                subscription_plan.validity, 
                subscription_plan.description
            FROM 
                sales
            JOIN 
                members ON sales.member_id = members.member_id
            JOIN 
                subscription_plan ON sales.plan_id = subscription_plan.plan_id
            WHERE 
                members.username = '$username'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $found_plans = false; // Initialize a flag to track if plans are found

        while ($row = mysqli_fetch_assoc($result)) {
            $found_plans = true; // Set the flag to true if a plan is found
            $plan_id = $row['plan_id'];
            $plan_name = $row['plan_name'];
            $amount = $row['amount'];
            $validity = $row['validity'];
            $des = nl2br($row['description']);

            echo "<div class='subscription-main'>
                    <div class='subscription-content'>
                        <div class='subscription-label'>
                            <span>$plan_name</span>
                        </div>
                        <div class='subscription-label'>
                            <span>Rs $amount/-</span>
                        </div>
                        <div class='subscription-label'>
                            <span>$validity Month</span>
                        </div>
                        <div class='subscription-para'>$des</div>
                    </div>
                </div>";
        }

        // Check if no plans are found and display message accordingly
        if (!$found_plans) {
            echo "<div class='subscription-main' style='display:grid;justify-content:center;'>
                    <div class='subscription-content'>
                        <div class='subscription-label'>
                            <span>No Plan Purchased</span>
                        </div>
                    </div>
                </div>";
        }
    } else {
        echo "Error executing SQL query: " . mysqli_error($conn);
    }
}
?>
