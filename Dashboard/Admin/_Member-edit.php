
<?php
 include '../../Include/_Session-admin.php';
 if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
     include('../../Include/_dbconnect.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
        $member_id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $gender= $_POST['gender'];
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        $username= $_POST['username'];
        $password = $_POST['password'];

        // Update member data
        $sql = "UPDATE members SET member_name='$name', email='$email', mobile_no='$contact', gender='$gender', address='$address', dob='$dob', username='$username', password='$password' WHERE member_id=$member_id";

        if ($conn->query($sql) === TRUE) {
            
            $member_id = $_POST['id'];
            echo "<script>alert('member Information Updated')</script>";
            echo "<script>window.location.href= User_login.php;</script>";
        } else {
            echo "Error updating member: " . $conn->error;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
    <style>
        /* PROFILE PAGE USER CSS START FROM HERE*/

        .form-contanier {
            margin: 50px auto;
            display: grid;
            align-content: center;
            min-height: 400px;
            background-color: #36383C;
            width: 60rem;
            box-shadow: -5px 5px 10px black;
            color: white;
        }

        .form-content {
            margin: 0 auto 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-input-content {
            padding: 20px 60px;
        }

        .span-main {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .span-name {
            font-size: 20px;
        }

        .span-input {
            border-radius: 5px;
            background:#edede9;
            width: 206px;
            height: 26px;
            font-size: 18px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serifalibri;
        }

        .span-select {
            width: 60%;
            height: 33px;
        }



        .goback-main {
            display: flex;
            justify-content: center;
            gap: 10px;
            padding-bottom: 15px;
        }

        .goback-btn,.update-btn {
            border: none;
            background: none;
            text-decoration: none;
            padding:10px;
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
        }

        .goback-btn-anch:hover,.update-btn-anch:hover {
            font-size: 17px;
            box-shadow: 3px 3px 3px black;

     }
     input,select{
            padding:8px;
            border-radius: 8px;
        }

        /* PROFILE PAGE USER CSS ENDS HERE */
    </style>

</head>
<body>

    <?php
    include '_Aheader.php';
    if(isset($_GET['id'])) {
        $member_id = $_GET['id'];

        // Retrieve member details from database
        $sql = "SELECT * FROM members WHERE member_id = $member_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $gender = $row['gender'];
            ?>
            <form action="<?php ($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class='form-contanier'>

            <br>
                <div class='form-content'>
                    
                    <div class='form-content-left'>
                    <div class='form-input-content'>
    
                    <span class='span-main'>
                        <span class='span-name'>Member ID:</span>
                        <b><input type="text" name="id" value="<?php echo$row['member_id'];?>" readonly style="color:white;background:none;outline:none;border:none;"></b>
                    </span>
                </div>
                        <div class='form-input-content'>
    
                            <span class='span-main'>
                                <span class='span-name'>Name:</span>
                                <b><input type="text" name="name" value="<?php echo $row['member_name']; ?>"></b>
                            </span>
                        </div>
                        <div class='form-input-content'>
    
                            <span class='span-main'>
                                <span class='span-name'> User-Name:</span>
                                <b><input type="text" name="username" value="<?php echo $row['username']; ?>"></b>
                            </span>
                        </div>
                        <div class='form-input-content'>
                            <span class='span-main'>
                                <span class='span-name'>Password:</span>
                                <b><input type="text" name="password" value="<?php echo $row['password']; ?>"></b>
                            </span>
                        </div>
    
                        <div class='form-input-content'>
                            <span class='span-main'>
                                <span class='span-name'>Date of Birth:</span>
                                <b><input type="date" name="dob" value="<?php echo $row['dob'];?>"></b>
                            </span>
                        </div>
                    </div>
    
                    <div class='form-content-right'>
                        <div class='form-input-content'>
                            <span class='span-main'>
                                <span class='span-name'>Phone No:</span>
                                <b><input type="text" name="contact" value="<?php echo $row['mobile_no']; ?>"></b>
                            </span>
                        </div>
                        <div class='form-input-content'>
                            <span class='span-main'>
                                <span class='span-name'>Email:</span>
                                <b><input type="email" name="email" value="<?php echo $row['email']; ?>"></b>
                            </span>
                        </div>
                        <div class='form-input-content'>
                            <span class='span-main'>
                            <span class="span-name">Gender:</span>
                            <select class="span-select" name="gender" id="" value="" required>
                                <option value="Male" <?php echo ($gender == "Male") ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?php echo ($gender == "Female") ? 'selected' : ''; ?>>Female
                                </option>
                                <option value="Other" <?php echo ($gender == "Other") ? 'selected' : ''; ?>>Other</option>
                            </select>
                        </span>
                        </div>
                        <div class='form-input-content'>
                            <span class='span-main'>
                                <span class='span-name'>Address:</span>
                                <b><input type="textarea" name="address" value="<?php echo $row['address'];?>"></b>
                            </span>
                        </div>
                        <div class='form-input-content'>
                            <span class='span-main'>
                                <span class='span-name'>Date of joining : </span>
                                <b><?php echo$row['joining_date']; ?></b>
                            </span>
                        </div>
                        
                    </div>
                </div>
    
    
                <div class='goback-main'>
                    <div class='goback-btn'>
                    <a  href='Admin_member_management.php'class='goback-btn-anch' type='submit'>Go back</a>
                    </div>
                    <button class="update-btn">
                    <a class="update-btn-anch" type="submit">Update</a>
                    </button>             
                </div>
                </form>
        </div>



            <?php
        } else {
            echo "Member not found";
        }
    } else {
        echo "Invalid member ID";
    }
    $conn->close();
    ?>
</body>
</html>
