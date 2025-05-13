<html>
    <head>
    <style>
        /* PROFILE PAGE USER CSS START FROM HERE*/

        .form-contanier {
            margin: 100px auto;
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
        }

        .goback-btn {
            border: none;
            background: none;
        }

        .goback-btn-anch {
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
            transition: ease-in-out 0.2s;
        }

        .goback-btn-anch:hover {
            font-size: 17px;
            box-shadow: 5px 5px 5px black;

     }

        /* PROFILE PAGE USER CSS ENDS HERE */
    </style>

</head>
</html>



<?php
 include '../../Include/_Session-admin.php';
 if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) 
 {
    include '_Aheader.php';
        include('../../Include/_dbconnect.php');

    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        $member_id = $_GET['id'];

        // Retrieve member details from database
        $sql = "SELECT * FROM members WHERE member_id = $member_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            echo"<div class='form-contanier'>
            <form action='User_profile.php' method='POST'>
            <br />
                <div class='form-content'>
                    
                    <div class='form-content-left'>
                    <div class='form-input-content'>
    
                    <span class='span-main'>
                        <span class='span-name'>Member ID:</span>
                        <b>{$row['member_id']}</b>
                    </span>
                </div>
                        <div class='form-input-content'>
    
                            <span class='span-main'>
                                <span class='span-name'>Name:</span>
                                <b>{$row['member_name']}</b>
                            </span>
                        </div>
                        <div class='form-input-content'>
    
                            <span class='span-main'>
                                <span class='span-name'> User-Name:</span>
                                <b>{$row['username']}</b>
                            </span>
                        </div>
                        <div class='form-input-content'>
                            <span class='span-main'>
                                <span class='span-name'>Password:</span>
                                <b>{$row['password']}</b>
                            </span>
                        </div>
    
                        <div class='form-input-content'>
                            <span class='span-main'>
                                <span class='span-name'>Date of Birth:</span>
                                <b>{$row['dob']}</b>
                            </span>
                        </div>
                    </div>
    
                    <div class='form-content-right'>
                        <div class='form-input-content'>
                            <span class='span-main'>
                                <span class='span-name'>Phone No:</span>
                                <b>{$row['mobile_no']}</b>
                            </span>
                        </div>
                        <div class='form-input-content'>
                            <span class='span-main'>
                                <span class='span-name'>Email:</span>
                                <b>{$row['email']}</b>
                            </span>
                        </div>
                        <div class='form-input-content'>
                            <span class='span-main'>
                                <span class='span-name'>Gender:</span>
                                <b>{$row['gender']}</b>
                            </span>
                        </div>
    
                        <div class='form-input-content'>
                            <span class='span-main'>
                                <span class='span-name'>Date of joining : </span>
                                <b>{$row['joining_date']}</b>
                            </span>
                        </div>
                        <div class='form-input-content'>
                            <span class='span-main'>
                                <span class='span-name'>Address:</span>
                                <b>{$row['address']}</b>
                            </span>
                        </div>
                    </div>
                </div>
    
    
                <div class='goback-main'>
                    <button class='goback-btn'>
                        <a href='Admin_member_management.php'class='goback-btn-anch' type='submit'>Go back</a>
                    </button>
                </div>
            </form>
        </div>";
            
        } else {
            echo "Member not found";
        }

    } else {
        echo "Invalid member ID";
    }
    $conn->close();
}
   
?>