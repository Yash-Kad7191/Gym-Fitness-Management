
<?php
include '../../Include/_Session-admin.php';
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) 
{
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sales Report</title>
    <style>
        * {
            padding: 0;
        }

        .container {
            display: grid;
            justify-content: center;
            grid-template-columns: auto auto;
            grid-column-gap: 10%;
            background-color: #333;
            padding: 25px 0 50px 0;
            border-radius: 20px;
            width: 90%;
            margin: 20px auto;
        }


        .left-contanier {
            display: grid;
            justify-content: center;
            align-items: center;
            grid-template-columns: auto auto;
            grid-column-gap: 45px;
            text-align: center;
        }

        .left-sub-contnaier{
            margin: 10px;
            display: grid;
            gap:10px;
        }

        .right-sub-contnaier {
        display: grid;
        justify-content: center;
        align-items: center;
        align-content: center;
        /* margin-top: 20px; */
        grid-row-gap: 40px;
    }


        .customer-contanier {
            display: grid;
            justify-content: center;
            align-items: center;
            grid-template-columns: auto auto;
            grid-column-gap: 35px;
            text-align: center;
        }

        h1 {
            grid-column: 1 / span 2;
            letter-spacing: 1px;
            font-size: 32px;
        }

        .customer-sub-contnaier {
            display: grid;
            grid-row-gap: 15px;
            grid-template-columns: auto auto;
            grid-column-gap: 35px;
        }

        label {
            font-size: 20px;
        }

        .cust-report-subm {
            grid-column: 1 / span 2;
        }

        .cust-report-subm-btn {
            margin-top: 5px;
            width: 50%;
            height: 45px;
            font-size: 17px;
            letter-spacing: 2px;
        }


        .salescontainer {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #444;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            overflow-x: auto;
        }

        h1 {
            text-align: center;
        }

        form {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #666;
            padding: 8px;
            text-align: left;
        }

        select {
            font-size: 1rem;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #666;
            width: 100%;
            background-color: #fff;
            color: #333;
        }

        .rigt-cont-input {
            margin: auto;
            background: white;
            font-size: 1rem;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #666;
            height: 30px;
            width: 150px;
            background-color: #fff;
            color: #333;
        }

        th {
            background-color: #555;
        }

        input {
            letter-spacing: 1px;
            background-color: transparent;
            background-image: linear-gradient(to top, #ee821a, #ed8c17, #eb9615, #e9a015, #e78918);
            border: 2px solid black;
            text-decoration: none;
            color: black;
            width: 100px;
            height: 40px;
            font-size: 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
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
</head>

<body>
    <?php include '_Aheader.php';?>
    <form action="" method="get">
        <div class="container">

            <div class="left-contanier">

                <div class="left-sub-contnaier">
                    <h2>Today's Sales Report</h2><!-- today sales report> -->
                    <span></span>

                    <h2>Monthly Sales Report</h2> <!-- monthly sales report> -->
                    <select name="month" id="month">
                        <option value="">Select Month</option>
                        <?php
            for ($i = 1; $i <= 12; $i++) {
                echo "<option value='$i'>$i</option>";
            }?>

                    </select>

                    <h2>Yearly Sales Report</h2> <!-- yearly sales report> -->
                    <select name="year" id="year" >
                        <option value="">Select Year</option>
                        <?php
        $currentYear = date('Y');
        for ($i = $currentYear; $i >= $currentYear - 2; $i--) {
            echo "<option value='$i'>$i</option>";
        }
        ?>

                    </select>
                </div>


                <div class="right-sub-contnaier">

                    <input type="submit" name="today" id="today" value="Get" > <!-- today sales report> -->

                    <input type="submit" value="Get "> <!-- monthly sales report> -->

                    <input type="submit" value="Get"> <!-- yearly sales report> -->
                </div>
            </div>


            <div class="customer-contanier">
                <h1 style="margin-bottom: 0;">Overall Sales</h1>
                <!-- <label for="startDate">Start Date:</label>
                <label for="endDate">End Date:</label> -->
                
                <!-- <input class="rigt-cont-input" type="date" id="start_date" name="start_date">
                <input class="rigt-cont-input" type="date" id="end_date" name="end_date"> -->


                <div class="cust-report-subm" style="margin-top:-100px;">
                    <input class="cust-report-subm-btn" type="submit" value="Get">
                </div>
            </div>
        </div>

    </form>

    <div class="salescontainer">
    <?php
  include('../../Include/_dbconnect.php');

    //this fn changes status to inactive if plan is expired.
    function MembershipStatus($conn) {
        $current_date = date('Y-m-d');

        // query to select membernships that are expired
        $sql = "SELECT sales_id FROM sales WHERE end_date < '$current_date' AND status = 'Active'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Update status to 'inactive' for expired memberships
                $membership_id = $row['sale_id'];
                $update_sql = "UPDATE sales SET status = 'Inactive' WHERE sale_id = '$membership_id'";
                $conn->query($update_sql);
            }
        }
    }
    //fn call.
    MembershipStatus($conn);
    //query forsales data
    $sql = "SELECT sales.member_id, members.member_name, subscription_plan.plan_name, sales.start_date, sales.end_date, subscription_plan.amount, subscription_plan.validity, sales.status
            FROM sales
            INNER JOIN members ON sales.member_id = members.member_id
            INNER JOIN subscription_plan ON sales.plan_id = subscription_plan.plan_id";

    // date filtetr
    if(isset($_GET['today'])) {
        $date = date('Y-m-d');
        $sql .= " WHERE DATE(sales.start_date) = '$date'";
    } elseif(isset($_GET['month']) && !empty($_GET['month'])) {
        $month = $_GET['month'];
        $sql .= " WHERE MONTH(sales.start_date) = '$month'";
    } elseif(isset($_GET['year']) && !empty($_GET['year'])) {
        $year = $_GET['year'];
        $sql .= " WHERE YEAR(sales.start_date) = '$year'";
    }
    if(isset($_GET['get_custom']) && !empty($_GET['start_date']) && !empty($_GET['end_date'])) {
        $start_date = $_GET['start_date'];
        $end_date = $_GET['end_date'];
        $sql .= " WHERE sales.start_date BETWEEN '$start_date' AND '$end_date'";
    }
    


    $result = $conn->query($sql);
    $result2= $conn->query($sql);

    
        $t_sale=0;
        $i=0;
        echo "<h2>Sales History</h2>";
        
        while($row2 = $result2->fetch_assoc()) {
            $t_sale = $t_sale+$row2["amount"];
            $i++;
        }
        echo "<h4>Total Sales :".$t_sale."<br>
            Total Members :".$i."<br></h4>";
        
        echo "<table border='1'>
                <tr>
                    <th>Member ID</th>
                    <th>Member Name</th>
                    <th>Plan</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Validity (Months)</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>";
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>".$row["member_id"]."</td>
                <td>".$row["member_name"]."</td>
                <td>".$row["plan_name"]."</td>
                <td>".$row["start_date"]."</td>
                <td>".$row["end_date"]."</td>
                <td>".$row["validity"]."</td>
                <td>".$row["amount"]."</td>
                <td>".$row["status"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<tr><td colspan=8>No Sales Record!</td></tr>
    </table>";
}
$conn->close();
?>
    </div>

</body>

</html>
<?php
}
?>