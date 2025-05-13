<!DOCTYPE html>

<head>
    <style>
        .subshow {
            display: grid;
            grid-template-rows: auto auto;
            grid-template-columns: auto auto auto;
            margin: 15px;
            grid-gap: 30px;
            flex-direction: column-reverse;

        }

        .subscription-main {
            text-align: center;
            margin: 50px 0px 0px 0px;
            background-color: #36383C;
            min-height: 400px;
            border-radius: 20px;
            box-shadow: 5px 5px 5px black;
            border: 2px solid #333333;
        }

        .subscription-main:hover {
            transition: 0.1ms;
            border: 2px solid #ffff;

        }

        .subscription-content {

            margin: auto;
            font-size: 40px;
            padding: 20px 20px;
        }

        .subscription-label {
            color: #fff;
            font-weight: bolder;
        }

        .subscription-label:nth-child(even) {

            font-size: 25px;
            margin: 30px 0px 20px 0px;
        }

        .subscription-label:first-child {
            letter-spacing: 2px;
            padding: 25px 0px 0px 0px;
            margin: 0px 0px 20px 0px;
        }


        .subscription-para {
            display: grid;
            justify-content: center;
            text-align: justify;
            color: #ffff;
            width: 100%;
            margin: 40px 0px 40px;
            font-size: 23px;
            border-radius: 10px;
            line-height: 20px;
        }

        button {
            padding: 10px 20px;
            font-size: 15px;
            border-radius: 5px;
            border: none;
            background-image: linear-gradient(to top, #ee821a, #ed8c17, #eb9615, #e9a015, #e78918);
            transition: ease-in-out 0.1s;

        }

        button:hover {
            font-size: 20px;
            box-shadow: 5px 5px 5px black;

        }

        span {
            padding: 10px 0px 0px 0px;
            text-align: center;
            display: block;
            font-size: 25px;
        }
        .pur-plan{
            display: grid;
            grid-template-rows: auto auto;
            grid-template-columns: auto auto auto;
            margin: 15px;
            grid-gap: 30px;
            flex-direction: column-reverse;
        }
        
    </style>
</head>

<body>
    <?php include '_Uheader.php'; ?>
    <span><u>YOUR CURRENT PLAN</u></span>
    <div class="pur-plan">
        <?php include '_Subscription-plan-purchased.php'; ?>
    </div>
    <span><u>AVAILABLE PLANS</u></span>
    <div class="subshow">
    <?php
include('../../Include/_dbconnect.php'); // Include database connection file
$username = $_SESSION['username'];
$sql1 = "SELECT member_id FROM members WHERE username = '$username'";
$result1 = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($result1);
$member_id = $row['member_id'];

// Query to fetch subscription plans
$sql = "SELECT * FROM subscription_plan";
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $plan_id = $row['plan_id'];
        $pname = $row['plan_name'];
        $amount = $row['amount'];
        $validity = $row['validity'];
        $des = nl2br($row['description']);
        
        echo "<div class='subscription-main'>
                  <div class='subscription-content'>
                      <div class='subscription-label'>
                          <span>$pname</span>
                      </div>
                      <div class='subscription-label'>
                          <span>Rs $amount/-</span>
                      </div>
                      <div class='subscription-label'>
                          <span>$validity Months</span>
                      </div>
                      <div class='subscription-para'>$des</div>
                      <form method='POST' action='_User-buy.php?member_id=$member_id&plan_id=$plan_id'>
                          <button type='submit'>BUY NOW</button>
                      </form>
                  </div>
              </div>";
    }
} else {
    echo "Currently Plans Not Available ";
}

mysqli_close($conn);
?>

        <div>
</body>

</html>