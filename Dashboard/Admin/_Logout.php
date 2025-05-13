<?php
session_start();

// Check if the user has confirmed logout
if (isset($_POST['confirm_logout'])) {
    if ($_POST['confirm_logout'] === 'ok') {
        // Destroy the session
        session_destroy();
        header("location: ../../index.php");
        exit(); // Ensure no further code execution after logout
    } else {
        // Handle 'No' confirmation here (if needed)
        // For example, you can redirect back to the previous page
        echo"<script>window.history.back();</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Confirmation</title>
    <style>
        body{
            background-color: black;
        }
    </style>
    <script>
        function confirmLogout() {
            // Display confirmation box
            var confirmLogout = confirm("Are you sure you want to logout?");
            if (confirmLogout) {
                // If user confirms, set the hidden input value to 'yes' and submit the form
                document.getElementById('confirm_logout_input').value = 'ok';
                document.getElementById('confirm_logout_form').submit();
            } else {
                // If user cancels, set the hidden input value to 'no' and submit the form
                document.getElementById('confirm_logout_input').value = 'cancel';
                document.getElementById('confirm_logout_form').submit();
            }
        }
    </script>
</head>
<body  onload="confirmLogout()">
    <!-- Confirmation form -->
    <form id="confirm_logout_form" method="POST" action="">
        <input type="hidden" id="confirm_logout_input" name="confirm_logout" value="">
    </form>
</body>
</html>
