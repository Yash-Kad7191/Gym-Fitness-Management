<?php 
 include '../../Include/_Session-admin.php';
 if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) 
 {
    include('../../Include/_dbconnect.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['create_plan'])) {
            $plan_name = $_POST['plan_name'];
            $amount = $_POST['amount'];
            $validity = $_POST['validity'];
            $description = nl2br($_POST['description']); // Corrected attribute name

            // Sanitize data and insert into database using prepared statement
            $sql = "INSERT INTO `subscription_plan` (`plan_name`, `amount`, `validity`, `description`) VALUES ('$plan_name', '$amount', '$validity', '$description')";
            $result=mysqli_query($conn,$sql);

            
            if ($result) {
                echo"<script>alert('Subscription plan Added Successfully');</script>";
                echo "<script>window.location.href='Admin_subscription_management.php';</script>";
            } else {
                echo "Error creating subscription plan: " . $conn->error;
            }
            //connection closed add
        }
        else{
            exit();
        }
    }
}
else {
    echo "<script>alert('Invalid request.');</script>";
    echo "<script>window.location.href = 'User_attendance.php'';</script>";
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #222;
                color: #fff;
            }
            .container {
                max-width: 60%;
                margin: 20px auto;
                padding: 20px;
                background-color: #333;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                min-height: 250px;
            }
            .inputdiv{
                display: flex;
                width: 100%;
                padding:5px;
                margin: 10px 0px;
                justify-content: space-between;
            }
            .leftdiv{
                flex:1;
                padding:10px;
            }
            .rightdiv{
                flex:2;
                padding:10px;
            }
            
            form {
                margin-bottom: 20px;
            }
            label {
                font-weight: bold;
                
            }
            input[type="text"],
            input[type="number"],
            textarea {
                width: 100%;
                padding: 8px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                background-color: #444;
                color: #fff;
            }
            input[type="submit"] {
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
            input[type="submit"]:hover {
                font-size: 20px;
            box-shadow: 3px 3px 3px black;
            }

            h2{
                text-align:center;
            }

            .tablediv{
                display: flex;
                flex-direction: column;
                margin: 0 auto;
                width: 90%;                
            }


            table {
				border-collapse: collapse;
				margin: 30px auto 0px auto;
                width: 65%;  
                
              }

			table,th,td {
				color: white;
				border: 1px solid #666;
			}

			th,td {
				text-align: center;
			}

			td {
				font-size: 1rem;
				background: #555;
			}

			th{
				font-size: 1.5rem;
            }
				
            .down{
                display:flex;
                justify-content: space-evenly;
                margin-top:20px;
            }
            .grp-btn{

padding:10px 30px;
gap: 15px;

}
.btn1 {
background-color: transparent; 
text-decoration: none;
border: 2px solid black;
text-decoration: none;
color: white;             
              border: 1px solid white;
display: block;



} 
.btn1:hover{
transition: 0.2ms;
background-image: linear-gradient(to top, #ee821a, #ed8c17, #eb9615, #e9a015, #e78918);

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
        </style>
    <script>
            function yesno(){
                const confirmDelete = confirm('Are you sure you want to delete This Plan ?');

                if (confirmDelete) {
                    window.location.href = "_Subscription-delete.php?id={$row['plan_id']}";
                    return true;
                } else {
                    window.location.href = '<?php echo $_SERVER['PHP_SELF']; ?>';
                    return false;
                }
            }
            </script>

</head>
<body>
    <?php include '_Aheader.php';?>
    <div class="container">
        <!--create new subscription plan -->
        <h2>Create New Plan</h2>
        <div class="inputdiv">
            <div class="leftdiv">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <label>Plan Name:</label>
                    <input type="text" name="plan_name" required>
                    <label>Plan Price:</label>
                    <input type="number" name="amount" required>
                    <label>Plan Duration (in months):</label>
                    <input type="number" name="validity" required>
                </div>
                <div class="rightdiv">
                    <label>Plan Description:</label><br>
                    <textarea name="description" id="" cols="50" rows="10"></textarea>
                    <input type="submit" name="create_plan" value="Create Plan">
                </form>
            </div>
        </div>
    </div>
    <div id="res">
    </div>

    <div class="tablediv">    
        <!-- Display all subscription plans in a table -->
        <h2>All Subscription Plans</h2>
        <div class="table-container">
                <table border="1">
                    <thead>
                        <tr>
                            <th>Sr.no</th>
                            <th>Plan Name</th>
                            <th>Amount</th>
                            <th>Duration(months)</th>
                            <th>Discription</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php
                    include('../../Include/_dbconnect.php');
                    // Retrieve all subscription plans from database
                    $sql = "SELECT * FROM subscription_plan";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $i = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$i}</td>";
                            echo "<td>{$row['plan_name']}</td>";
                            echo "<td>{$row['amount']}</td>";
                            echo "<td>{$row['validity']}</td>";
                            echo "<td>{$row['description']}</td>";
                            echo "<td class='grp-btn'><a class='btn1' href='_Subscription-delete.php?id={$row['plan_id']}' onclick='return yesno();'>Delete</a></td>";
                            echo "</tr>";
                            $i++;
                        }
                    } else {
                        echo "<tr><td colspan='6'>No plans found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
