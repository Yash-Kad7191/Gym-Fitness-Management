
<?php
// Include your database connection file
include '../../Include/_Session-admin.php';
if(isset($_SESSION['logged'])||$_SESSION['logged']==TRUE)
{
    include('../../Include/_dbconnect.php');
    if($_SERVER["REQUEST_METHOD"]=='GET'){
        $plan_id=$_GET['plan_id'];
        $sql="SELECT * FROM `workout_plans` WHERE `workout_plans`.`plan_id`='$plan_id'";
        $result=mysqli_query($conn,$sql);
    }
}
function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['plan_id'])) {
    $plan_id = sanitize($_POST['plan_id']);
    $description = sanitize($_POST['description']);

    $sql = "UPDATE workout_plans SET description ='$description' WHERE plan_id='$plan_id'";
    if ($conn->query($sql) === TRUE) {
        // Redirect to avoid form resubmission
            echo"<script>alert('Plan Updated Successfully');</script>";
            echo"<script>window.history.back();</script>";
        exit();
    } else {
        echo "Error updating plan: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Workout Plan</title>
<style>
    .form-contanier {
            margin: 50px auto;
            display: grid;
            align-content: center;
            min-height: 350px;
            background-color: #36383C;
            width: 60rem;
            box-shadow: -5px 5px 10px black;
            color: white;
        }

        .form-content {
            margin: 0 auto 0;
            display: flex;
            gap: 100px;
        }

        .form-input-content-left,span {
            display: grid;
            padding: 15px 10px;
            align-content: center;
            font-size: x-large;
        }
        .form-input-content-right{
            padding: 10px 10px;
            display: grid;
            gap: 15px;
            
        }

        h2{
            margin-top: 10px;
            text-align: center;
        }
        .form-input-content-bottom {
            padding-bottom: 15px;
        }
        .grp-btn{
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .goback-btn,.update-btn {
            border: none;
            background: none;
            text-decoration: none;
        }

        .goback-btn-anch,.update-btn-anch {
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

        .goback-btn-anch:hover,.update-btn-anch:hover {
            font-size: 17px;
            box-shadow: 3px 3px 3px black;

     }
     select{
        font-size:x-large;
        background-color:transparent;
        color:white;

     }
     option{
        background-color: #36383C;
     }
     textarea{
        background-color: transparent;
        color: white;
        font-size:large;
     }
        </style>
</head>
<body>
    <?php include '_Aheader.php';?>
    <h2><u>Edit Workout Plan</u></h2>
    <?php
    if(isset($_GET['plan_id'])) {
        $plan_id = sanitize($_GET['plan_id']);

        $sql= "SELECT * FROM workout_plans WHERE plan_id=$plan_id";
        $result= $conn->query($sql);
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class='form-contanier'>
            <div class='form-content'>
                <div class='form-input-content-left'><span>
                    <label><strong>Plan ID:</strong></label>
                    <input type="text" name="id" value="<?php echo $row['plan_id']; ?>" readonly style="background:none;border:none; color:white; font-size:x-large;outline:none;"><br></span>
                    <span class='span-main'>
                            <span class="span-name">Day</span>
                            <select class="span-select" name="day" id="" value="" required>
                                <option value="monday" >Monday</option>
                                <option value="tuesday" >Tuesday</option>
                                <option value="wednesday" >Wednesday</option>
                                <option value="thursday" >Thursday</option>
                                <option value="friday" >Friday</option>
                                <option value="satuarday" >Satuarday</option>
                            </select>
                        </span>
                    <!-- <span>
                    <label><strong>Day:</strong></label>
                    <?php echo $row['days']; ?><br><br></span> -->
                    </div>
                    <div class='form-input-content-right'><span>
                    <label for="description">Description:</label><br></span>
                    <span><textarea name="description" rows="10" cols="50" required><?php echo $row['description']; ?></textarea><span>
                    </div>
                 </div>
                    <div class='form-input-content-bottom'>
                        <div class="grp-btn">
                        <span>
                            <input type="hidden" name="plan_id" value="<?php echo $plan_id; ?>">
                            <input class="update-btn-anch" type="submit" value="Update Plan">
                        </span> 
                        
                        </form><br>
                        <span>
                            <a class='goback-btn-anch' href='Admin_workoutplan.php'>Go Back</a>
                        </span> 
                    </div>
                </div>
            
        </div>
            <?php
        } else {
            echo "Plan Not Found";
        }
    } else {
        echo "Invalid Plan ID";
    }

mysqli_close($conn);
?>
</body>
</html>
