<?php
include '../../Include/_Session.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    include('../../Include/_dbconnect.php');

    // Check if member_id and plan_id are set in the URL
    if (isset($_GET['member_id']) && isset($_GET['plan_id'])) {
        // Assuming $_GET['member_id'] is the actual member_id, not the username
        $member_id = $_GET['member_id'];
        $plan_id = $_GET['plan_id'];

        // Function to check if the member has already purchased the plan
        function hasPurchasedPlan($conn, $member_id, $plan_id)
        {
            $sql_check = "SELECT * FROM sales WHERE member_id = '$member_id' AND plan_id = '$plan_id' AND status = 'Active'";
            $result_check = $conn->query($sql_check);
            return ($result_check->num_rows > 0);
        }

        // Check if the member has already purchased the plan
        if (hasPurchasedPlan($conn, $member_id, $plan_id)) {
            echo "<script>alert('You have already purchased this plan.');</script>";
            echo "<script>window.history.back();</script>"; // Go back to the previous page
            exit(); // Stop further execution
        }

        // Function to insert user purchase
        function insert_userPurchase($conn, $member_id, $plan_id)
        {
            $sql = "SELECT validity, amount FROM subscription_plan WHERE plan_id = $plan_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $validity = $row['validity'];
                $amount = $row['amount'];
                $start_date = date('Y-m-d');

                // Calculate end date
                $end_date = date('Y-m-d', strtotime($start_date . ' + ' . $validity . ' months'));

                // Insert into sales table
                $sql_insert = "INSERT INTO sales (member_id, plan_id, start_date, end_date, amount, status) 
                    VALUES ('$member_id', '$plan_id', '$start_date', '$end_date', '$amount', 'Active')";

                if ($conn->query($sql_insert) === TRUE) {
                    echo "<script>alert('Plan Purchased Successfully');</script>";
                    echo "<script>window.location.href='User_subscription.php';</script>";
                    exit(); // Stop further execution
                } else {
                    echo "Error: " . $sql_insert . "<br>" . $conn->error;
                }
            } else {
                echo "No subscription plan found for plan_id: $plan_id";
            }
        }

        // Call the function to insert user purchase
        insert_userPurchase($conn, $member_id, $plan_id);

    } else {
        echo "Values Not Received"; // If member_id and plan_id are not set in the URL
    }
} else {
    echo "Session not set"; // If user is not logged in
}
?>
