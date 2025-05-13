<?php
include '../../Include/_Session-admin.php';

if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    include('../../Include/_dbconnect.php');

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $days = $_POST['days'];
        $description = $_POST['description'];

        // Check if the day already exists in the database
        $check_sql = "SELECT * FROM workout_plans WHERE `day` = '$days'";
        $check_result = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {
            // Redirect back with a query parameter to indicate the existing day
            header("Location: {$_SERVER['PHP_SELF']}?exists=true");
            exit();
        } else {
            // Insert data into the 'workout_plans' table
            $sql = "INSERT INTO workout_plans (`day`, `description`, `dt`) VALUES ('$days','$description',current_timestamp())";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script>alert('Workout-Plan Added Successfully');</script>";
                echo "<script>window.history.back();</script>";
                exit(); // Exit after displaying the alert and going back
            } else {
                echo "Failed to create workout plan: " . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }
}

// Check if the 'exists' query parameter is set in the URL to display the alert
if (isset($_GET['exists']) && $_GET['exists'] == 'true') {
    echo "<script>alert('Workout plan with the same day already exists.');</script>";
}
?>


<html>
    <head>
        <style>
            .cwp{
                margin: 20px auto;
                display: grid;
                align-content: center;
                min-height: 300px;
                background-color: #36383C;
                width: 65rem;
                box-shadow: -5px 5px 10px black;
                color: white;
            }
            .content {
            margin: 0 auto 0;
            display: flex;
            gap: 100px;
        }
        .selday{
            margin-top: 110px;
            text-align: center;
            padding: 20px 0px;
            font-size: x-large;
        }
        .des{
            font-size: x-large;
            display: grid;
        }
        select{
        font-size:x-large;
        background-color:transparent;
        color:white;

     }
     .addplan{
        text-align: center;
        margin: 10px auto;
     }
     option{
        background-color: #36383C;
     }
     textarea{
        background-color: transparent;
        color: white;
        font-size:large;
     }
     .addplan-btn {
        margin: 10px auto;
            display: block;
            text-decoration: none;
            background-image: linear-gradient(to top, #ee821a, #ed8c17, #eb9615, #e9a015, #e78918);
            color: white;
            border: 2px solid black;
            padding: 8px 18px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: ease-in-out 0.1s;
            border:none;
        }
        .addplan-btn:hover {
            font-size: 18px;
            box-shadow: 3px 3px 3px black;
         }
            </style>
    </head>
    <body>
        <div>
            <h2><u>Create Workout Plan</u></h2>
            
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" > 
            <div class='cwp'>
                <div class="content">
                <section class="selday">
                <label for="days">Day : </label>
                <select name="days" >
                    <option>Monday</option>  
                    <option>Tuesday</option>
                    <option>Wednesday</option>
                    <option>Thursday</option>
                    <option>Friday</option> 
                    <option>Saturday</option>
                </select><br>
                </section>
                <section class="des">
                <label for="description">Description:</label><br>
                <textarea id="description" name="description" rows="10" cols="50"required></textarea><br>
                </section>
        </div>
        <section class="addplan">
                <input class="addplan-btn" type="submit" value="Add Plan">
                </section>
            </div>
            
            </form>
        </div>
    </body>
</html>