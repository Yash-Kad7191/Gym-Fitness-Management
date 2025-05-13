
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <style>
                /* User Workout plan CSS Starts here  */

            
            .wpshow{
                display:grid;
                grid-template-rows:auto auto;
                grid-template-columns:auto auto auto;
                margin:15px;
                grid-gap:10px;

            }
            .workout-main {
            text-align: center;
            margin: 50px 0px 0px 0px;
            background-color:#36383C;
            min-height: 400px;
            border-radius: 10px;
            box-shadow: 5px 5px 5px black;
            }

            .workout-content {
                
                margin: auto;
                font-size: 40px;
                padding: 0px 20px;
            }

            .workout-label {
                color: #fff;
                font-weight: bolder;
            }

            .workout-label:nth-child(even) {

                font-size: 25px;
                margin: 30px 0px 20px 0px;
            }

            .workout-label:first-child {
                letter-spacing: 2px;
                padding: 25px 0px 0px 0px;
                margin: 0px 0px 20px 0px;
            }


            .workout-para {
                display: grid;
                justify-content: center;
                text-align: justify;
                color: #fff;
                width: 100%;
                margin: 40px 0px 40px;
                font-size: 23px;
                border-radius: 10px;
                line-height: 40px;
            }
            ::-webkit-scrollbar{
    width: 10px;

}
::-webkit-scrollbar-thumb{
    background-image: linear-gradient(to top, #ee821a, #ed8c17, #eb9615, #e9a015, #e7a918);
}
::-webkit-scrollbar-track{
    background-color: none;
}

            /* User Workout plan CSS Ends here  */
        </style>
    </head>
    <body>
        <?php include '_Uheader.php';?>
        <div  class="wpshow">
        <?php
            include '../../Include/_Session.php';
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
            {
                include('../../Include/_dbconnect.php');
                $sql = "SELECT `plan_id`, `day`, `description` FROM `workout_plans`";
                $result = mysqli_query($conn, $sql);

                // Initialize variables outside the loop
                $count = $plan_id = $days = $des = '';

                while ($row = mysqli_fetch_assoc($result)) {
                    if($row)
                    {
                    $plan_id = $row['plan_id'];
                    $days = $row['day'];
                    $des = nl2br($row['description']);
                    echo"<div class='workout-main'>
                            <div class='workout-content'>
                                <div class='workout-label'>
                                <span><a style='color:#e78918;'>$days<a></span>
                                </div>
                                <div class='workout-para'>$des</div>
                            </div>
                        </div>"; }
                    else{
                        echo"NO Workout Plans Yet";
                    } 
                
                } 
                mysqli_close($conn);   
            }
            else 
            {
                echo "<script>alert('Invalid request.');</script>";
                echo "<script>window.location.href= User_login.php;</script>";
                exit();
            }
            

?>