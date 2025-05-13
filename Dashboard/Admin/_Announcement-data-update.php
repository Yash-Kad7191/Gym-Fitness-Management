<?php
include('../../Include/_Session-admin.php');
 if(isset($_SESSION['logged'])||$_SESSION['logged']==TRUE)
 {
  include('../../Include/_dbconnect.php');
	if(isset($_GET['an_id'])){
    $an_id = $_GET['an_id'];
    $sql = "SELECT `announcement_id`,`announcement_title`,`announcements` FROM `announcement` WHERE `announcement_id` = '$an_id'";
	$result = mysqli_query($conn,$sql);
    if ($result == TRUE) {
		$row = mysqli_fetch_assoc($result);
		$an_title=$row['announcement_title'];
		$ann=$row['announcements'];
    }

	else {
        echo "Error in Updating announcement: " . $conn->error;
    }
}

$conn->close();
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
        .uptann {
    display: flex;
    text-align: center;
    margin: 10px auto;
    gap: 20px;
}
    textarea{
        background-color: transparent;
        color: white;
        font-size:large;
        border: 2px solid black;
        border-radius: 5px;
     }
     .uptann-btn {
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
        .uptann-btn:hover {
            font-size: 17px;
            box-shadow: 3px 3px 3px black;
         }
         input{
            font-size: x-large;
            background-color: transparent;
            border-radius: 5px;
            border: 2px solid black;
            color: white;
         }
		 h2{
			text-align: center;
			color: white;
			margin-top: 10px;
		 }
         </style>
</head>
<body>
	<?php include '_Aheader.php';?>
<h2><u>Add New Announcement</u></h2>
<form action="_Announcement-update.php?an_id=<?php echo $row['announcement_id']; ?>" method="POST">
    <div class='cwp'>
    <div class="content">
    <section class="title">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo$an_title;?>"><br><br>
        </section>
        <section class="des">
        <label for="content">Content:</label><br>
        <textarea id="content" name="des" rows="5" cols="50"required><?php echo$ann;?></textarea><br><br>
    </div>
        </section>
        <section class="uptann">
        <button class="uptann-btn"type="submit">Update</button>
        <a class="uptann-btn" href="Admin_announcement.php">GO Back</a>
        </section>
        </form>
    </div>
    
</body>
</html>