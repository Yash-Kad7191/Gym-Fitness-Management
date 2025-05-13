<?php
include '../../Include/_Session.php';

if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!=true){
    header("location: User-login.php");
    exit;
}
?>


<html>

<head>
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .user-dashboard-main {
            display: flex;
         
            margin: 10px;
            gap: 10px;
        }

        .user-dashboard-content {
            background-color: #36383C;
            text-align: center;
            font-size: 20px;
        }
        .item2{
            padding:30px;
            width: 100%;
            min-height: 400px;
        }
        .item1{
            width: 100%;
            min-height: 400px;
        }
        .item3 {
            width: 100%;
            height: 200px;
            
        }
    </style>
</head>

<body>
    <?php include("_Uheader.php")?>

    <div class="user-dashboard-main">
        <div class="user-dashboard-content item1">

                <?php include '_Dashboard-workoutplan.php';?>
            
        
        </div>
        <div class="user-dashboard-content item2">
                <?php include '_Dashboard-announcement.php';?>
        </div>

        <div class="user-dashboard-content item3">
                <?php include '_Dashboard-attendance.php';?>
        </div>

    </div>

</body>

</html>