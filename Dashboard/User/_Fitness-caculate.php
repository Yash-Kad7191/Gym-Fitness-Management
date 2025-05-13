<?php
include '../../Include/_Session.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
{
    include('../../Include/_dbconnect.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];

        // Calculate BMI
        $bmi = ($weight / ($height * $height))*10000;

        // Calculate BMR
        if ($gender == "male") {
            $bmr = 66 + (13.75 * $weight) + (5.003 * $height) - (6.755 * $age);
        } elseif ($gender == "female") {
            $bmr = 655 + (9.563 * $weight) + (1.850 * $height * 100) - (4.676 * $age);
        } else {
            $bmr = "Gender not selected";
        }
    }
}
?>
</body>
</html>
