<?php include '_Profile-data.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
            height: 32px;
            font-size: x-large;
            text-align: center;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serifalibri;
        }

        .span-select {
            width: 206px;
            height: 32px;
            font-size: x-large;
            text-align: center;
            border-radius: 5px;
            background:#edede9;

        }



        .update-main {
            display: flex;
            justify-content: center;
        }

        .update-btn {
            border: none;
            background: none;
        }

        .update-btn-anch {
            margin: 10px auto;
            display: block;
            text-decoration: none;
            background-image: linear-gradient(to top, #ee821a, #ed8c17, #eb9615, #e9a015, #e78918);
            color: white;
            border: 2px solid black;
            padding: 10px 25px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: ease-in-out 0.1s;
        }

        .update-btn-anch:hover {
            font-size: 17px;
            box-shadow: 5px 5px 5px black;

     }
     #username{
        color: white;
        background: none;
        border: none;
        outline:none;
        padding-bottom:15px;
     }


        /* PROFILE PAGE USER CSS ENDS HERE */
    </style>
    <script>
        function yesno(){
            var c = confirm('Are You Sure To Update INFORMATION');
                if(c)
                {
                    return true;
                    
                }
                else{
                    return false;
                }
                location.reload();
        }
        </script>

</head>

<body>
    <?php include '_Uheader.php'; ?>
    <!-- <div id="message" style="text-align:center;"></div> -->
    <?php
    include('../../Include/_dbconnect.php');
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM members WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['member_name'];
        $ph_no=$row['mobile_no'];
        $username = $row['username'];
        $password = $row['password'];
        $email = $row['email'];
        $gender = $row['gender'];
        $dob = $row['dob'];
        $add=$row['address'];
        $dt = date($row['joining_date']);
    }
    else
    {
        echo"<script>alert('Data Not Retrived');</script>";
    }
    mysqli_close($conn);
    ?>
    <div class="form-contanier">
        <form action="<?php ($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return yesno()">
        <br>
            <div class="form-content">
                
                <div class="form-content-left">
                    <div class="form-input-content">

                        <span class="span-main">
                            <span class="span-name">Name :</span>
                            <b><input class="span-input" type="text" name="name" id="name" value="<?php echo "$name"; ?>"required></b>
                        </span>
                    </div>
                    <div class="form-input-content">
                        <span class="span-main">
                            <span class="span-name">Password :</span>
                            <b><input class="span-input" type="text" name="password" id=""value="<?php echo "$password"; ?>"required></b>
                        </span>
                    </div>
                    <div class="form-input-content">
                        <span class="span-main">
                            <span class="span-name">Email :</span>
                            <b><input class="span-input" type="text" name="email" id="" value="<?php echo "$email"; ?>"required></b>
                        </span>
                    </div>

                    <div class="form-input-content">
                        <span class="span-main">
                            <span class="span-name">Date of Birth :</span>
                            <b><input class="span-input" type="date" name="dob" id="" value="<?php echo $dob ?>"required></b>
                        </span>
                    </div>
                </div>

                <div class="form-content-right">
                <div class="form-input-content">
                    <span class="span-main">
                        <span class="span-name"> User-Name :</span>
                        <b><input class="span-input" type="text" name="username" id="username" value="<?php echo "$username"; ?>"required></b>
                    </span>
                    </div>
                    <div class="form-input-content">
                        <span class="span-main">
                            <span class="span-name">Phone No :</span>
                            <b><input class="span-input" type="number" name="ph_no" value="<?php echo "$ph_no" ?>"required></b>
                        </span>
                    </div>
                    
                    <div class="form-input-content">
                        <span class="span-main">
                            <span class="span-name">Gender :</span>
                            <select class="span-select" name="gender" id="" value="" required>
                                <option value="Male" <?php echo ($gender == "Male") ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?php echo ($gender == "Female") ? 'selected' : ''; ?>>Female
                                </option>
                                <option value="Other" <?php echo ($gender == "Other") ? 'selected' : ''; ?>>Other</option>
                            </select>
                        </span>
                    </div>

                    <div class="form-input-content">
                        <span class="span-main">
                            <span class="span-name">Date of joining :  <b>
                                    <?php $fd = date('d-m-Y');
                                    echo $fd; ?>
                                </b></span>

                        </span>
                    </div>
                </div>
            </div>
            <!-- <div style="padding:0px 80px; ">
                <label for="address" style="font-size: 20px;">Current Address: </label><br>
                <input type="text" class="span-input" name="address" style="width:800px;">
            </div> -->


            <div class="update-main">
                <button class="update-btn">
                    <a class="update-btn-anch" type="submit">Update</a>
                </button>
            </div>
        </form>
    </div>

</body>

</html>