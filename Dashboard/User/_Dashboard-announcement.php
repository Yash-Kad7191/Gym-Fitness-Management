<?php

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    include('../../Include/_dbconnect.php');
    $sql = "SELECT `announcement_id`, `announcements`, `announcement_title`,`dt` FROM `announcement`";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) 
    {
        if($row){
        $an_title = $row['announcement_title'];
        echo"<div class='anouncement-main'>
        <div class='anouncement-content'>
        <div class='anouncement-content-left'>
        <img class='anouncement-left-img' src='../../assets/Img/admin.png' alt=''>
        </div>
            <div class='anouncement-content-right'>

                <span class='anounement-right-tittle'>$an_title</span>
            </div>
        </div>
    </div>";
        }
        else{
            echo"No announcements";
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

// Close the database connection (important to do this after fetching data)

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Announcement</title>
    <style>
        .anouncement-main {
            width:auto;
            margin:15px auto;
            padding:10px 5px;
            background-image: linear-gradient(to top, #ee821a, #ed8c17, #eb9615, #e9a015, #e78918);
            border-radius: 6px;
            box-shadow: 10px 10px 10px black;
        }


        .anouncement-content {
            display: flex;
            align-items: center;
            padding: 0px 20px;
            min-height:25px;
        }


        .anouncement-left-img {
            width: 25px;
            height: 25px;
            border-radius: 50%;
        }

        .anouncement-content-right {
            display: grid;
            flex-direction: row;
            margin-left: 50px;
        }

        .anounement-right-tittle {
            color: #fff;
            font-size: 15px;
        }

        .anounement-right-descri {
            text-align: justify;
            color: #fff;
            width: 100%;
            font-size: 23px;
            border-radius: 10px;
            line-height: 35px;
        }
    </style>

</head>
</html>