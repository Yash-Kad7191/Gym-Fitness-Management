<?php
include '../../Include/_Session-admin.php';
if(!isset($_SESSION['logged'])|| $_SESSION['logged']!=true){
    header("location: Admin-login.php");
    exit;
}
?>
<?php
include('../../Include/_dbconnect.php');

function TotalMembers($conn){
    $sql= "SELECT COUNT(*) AS total_users FROM members";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total_users'];
    } else {
        return 0;
    }
}
function ActiveUsers($conn) {
    $sql = "SELECT COUNT(*) AS active_users FROM sales WHERE status = 'Active'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['active_users'];
    } else {
        return 0;
    }
}

function TotalSales($conn) {
    $sql = "SELECT SUM(amount) AS total_sales FROM sales";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total_sales'];
    } else {
        return 0;
    }
}

function TodaySales($conn) {
    $today = date("Y-m-d");
    $sql = "SELECT SUM(amount) AS today_sales FROM sales WHERE DATE(start_date) = '$today'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['today_sales'];
    } else {
        return 0;
    }
}

function MonthlySales($conn) {
    $current_month = date("m");
    $sql = "SELECT SUM(amount) AS monthly_sales FROM sales WHERE MONTH(start_date) = '$current_month'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['monthly_sales'];
    } else {
        return 0;
    }
}
function YearlySales($conn) {
    $current_year = date("Y");
    $sql = "SELECT SUM(amount) AS yearly_sales FROM sales WHERE YEAR(start_date) = '$current_year'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['yearly_sales'];
    } else {
        return 0;
    }
}
// users
$total_users = TotalMembers($conn);
$active_users_summary = ActiveUsers($conn);

// Calculate total sales
$total_sales = TotalSales($conn);
$today_sales = TodaySales($conn);
$monthly_sales = MonthlySales($conn);
$yearly_sales = YearlySales($conn);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        background-color: #222;
        color: #fff;
      }
      .dashboard {
        width: 80%;
        margin: 50px auto;
      }
      .top-half {
        display: flex;
        justify-content: space-between;
        border-radius: 10px;
      }
      
      .left-container,
      .right-container,
      .mid-container {
        display: flex;
        flex: 1;
        text-align: center;
        background-color: #333;
        margin: 10px 30px;
        padding: 10px;
        border-radius: 10px;
      }
      
      .left-half,
      .right-half,
      .mid {
        align-items: center;
        
        width: 100%;
      }
      .left-half h2,
      .right-half h2,
      .mid h2 {
        margin-bottom: 10px;
      }
      
      .bottom-half {
        margin-top: 20px;
        background-color: #333333;
        padding: 20px;
        border-radius: 10px;
      }

      .left-container,
      .right-container,
      .mid-container > p{
        font-weight: bolder;
      }

      h2{
        font-size:2rem;
      }

      .pfont{
        font-size:2rem;
      }

      p>a{
        color:yellow;
      }
      </style>
  </head>
  <body>
    <?php include("_Aheader.php");?>
    <div class="dashboard">
      <div class="top-half">
        <div class="left-container">
          <div class="left-half">
            <h2>Total Member</h2>
            <p class="pfont"><?php echo $total_users;?></p>
          </div>
        </div>
        <div class="mid-container">
          <div class="mid">
            <h2>Active Member</h2>
            <p class="pfont"><?php echo $active_users_summary; ?></p>
          </div>
        </div>
        <div class="right-container">
          <div class="right-half">
            <h2>Total Monthly Sales</h2>
            <p class="pfont">₹<?php echo $monthly_sales; ?></p>
            <p><a href="Admin_sales_management.php">Click for more Info</a></p>
          </div>
        </div>
      </div>

      <!-- <div class="bottom-half">
        <h2>Title</h2>
        <p>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt
          maxime laborum aliquam iure, dignissimos sequi sit aspernatur
          blanditiis vitae accusantium quasi odio enim id esse eos eligendi
          possimus explicabo provident.
        </p>
      </div> -->
    </div>
  </body>
</html>
