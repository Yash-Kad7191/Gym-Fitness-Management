
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Announcement</title>
    <style>
                /*  Announcement  Css Start Here */

                .accounment-main {
            display: grid;
            justify-content: start;
            grid-template-columns: auto 85% auto auto;
            grid-row-gap: 10px;
            background-color: #36383C;
            margin: 40px 100px 0;
            padding: 35px 20px;
            width: auto;
            border-radius: 20px;
        }

        .item1 {
            grid-row: 1 / span 3;
            width: 80px;
            margin: auto 20px auto 0;
        }

        img {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            padding: 0;
            border: 1px solid black;
        }


        .item2 {
            grid-row: 1 / span 1;
            grid-column: 2 / span 2;
            width: 100%;
            font-size: 20px;
        }

        .item2-sub {
            display: flex;
            justify-content: space-between;
        }


        .item2-sub2 {
            display: block;
            font-size:x-large;
        }

        .item4 {
            grid-row: 3 / span 1;
            width: 80%;
            font-size:x-large;
            text-align: justify;
            line-height: 25px;
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

        /*  Announcement  Css End Here */
    </style>

</head>

<body>
<?php include '_Uheader.php';?>
<div>
<?php
 include '../../Include/_Session.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    include('../../Include/_dbconnect.php');
    $sql = "SELECT * FROM `announcement`";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        if($row){
        $an_id = $row['announcement_id'];
		$an_title = $row['announcement_title'];
        $ann = $row['announcements'];
        $dt=$row['dt'];
		echo"<div class='accounment-main'>

        <div class='item1'><img class='anouncement-left-img' src='../../assets/Img/admin.png' alt=''></div>

        <div class='item2'>
            <div class='item2-sub'>
                $an_title
                <span class='item2-sub2'>$dt</span>
            </div>
        </div>

        <div class='item4'>$ann</div>
    </div>";
        }
        else{
            echo "No Announcements";
        }


        // Output the data (you can customize this part based on your needs)
    }
    mysqli_close($conn);
}
?>

<div>
</body>

</html>
