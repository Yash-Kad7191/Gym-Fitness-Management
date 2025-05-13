<?php
include '../../Include/_Session-admin.php';
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) 
{
  include('../../Include/_dbconnect.php');
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title=$_POST['title'];
    $des=$_POST['des'];

    $sql="INSERT INTO announcement(`announcement_title`,`announcements`,`dt`)VALUES('$title','$des',current_timestamp())";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        header('location:Admin_announcement.php');
    }
    else{
        echo"failed to add announcement :".mysqli_error($conn);
    }
  }
  mysqli_close($conn);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                border-radius: 10px;
            }
            .content {
            margin: 0 auto 0;
            display: flex;
            gap: 100px;
        }
    .des{
            font-size: x-large;
            display: grid;
            
        }
        .title{
            margin-top: 50px;
            text-align: center;
            padding: 20px 0px;
            font-size: x-large;
        }
     .addann{
        text-align: center;
        margin: 10px auto;
     }
    textarea{
        background-color: transparent;
        color: white;
        font-size:large;
        border: 1px solid white;
        border-radius: 5px;

     }
     .addann-btn {
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
        .addann-btn:hover {
            font-size: 17px;
            box-shadow: 3px 3px 3px black;
         }
         input{
            font-size: x-large;
            background-color: transparent;
            border-radius: 5px;
            border: 1px solid white;
            color: white;
         }
         </style>
</head>
<body>
<h2><u>Add New Announcement</u></h2>
    <form action="" method="POST">
    <div class='cwp'>
    <div class="content">
    <section class="title">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        </section>
        <section class="des">
        <label for="content">Content:</label><br>
        <textarea id="content" name="des" rows="5" cols="50" required></textarea><br><br>
    </div>
        </section>
        <section class="addann">
        <button class="addann-btn"type="submit">Add Announcement</button>
        </section>
        </form>
    </div>
    
</body>
</html>