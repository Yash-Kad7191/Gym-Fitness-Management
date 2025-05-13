<?php include '_Registration-data.php';?>
<html>

<head lang="en">
    <link rel="stylesheet" href="../../css/Log-Reg.css">

    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            background-image: linear-gradient(to top,
                    rgba(0, 0, 0, 0),
                    rgb(0, 0, 0, 1)),
                url("../../assets/Img/login.jpg");
            background-repeat: no-repeat;
            background-position: 25% 75%;
            background-size: cover;

        }


        /* Register-form Css Start Here */
        .container {
            margin: 100px auto;
            width: fit-content;
            padding: 20px;
            background-color: #444;
            background: transparent;
            backdrop-filter: blur(6px);
            border: 1px solid #fff;
            border-radius: 20px;
        }

        option {
            background-color: grey;
        }

        h1 {
            color: white;
            text-align: center;
            font-size: 35px;
        }

        h4 {
            text-align: center;
        }

        .login-form {
            display: grid;
            gap: 50px;
            grid-template-columns: auto auto;
        }

        .login-form h2 {
            margin-bottom: 20px;
        }

        .ur-1 {
            display: grid;
            margin: 0 auto;
        }

        .ur-2 {
            display: grid;
            margin: 0 auto;
        }

        .login-form label {
            margin: 10px;
        }

        .login-form input,
        .login-form [number],
        .login-form select {
            background-color: rgba(255, 255, 255, 0.4);
            padding: 12px 8px;
            border-radius: 5px;
            font-size: 15px;
            letter-spacing: 1px;
            border: none;
            color: #dfdfdf;
            outline: none;
        }

        .login-form [type="number"] {
            color: black;
        }

        input::placeholder {
            color: #dfdfdf;
        }

        .gender-radio {
            display: flex;
        }

        p {
            margin: 10px 0 5px;
            
        }

        .ur-3 {
            grid-column: 1 / span 2;
            text-align: center;
            margin: -30px 0 0;
        }

        .register-btn {
            width: 50%;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #ff8c00;
            color: #fff;
            font-size: 1.5rem;
            letter-spacing: 2px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .register-btn:hover {
            background-color: orange;
        }

        .already {
            display: block;
            margin: 20px;
            text-decoration: none;
            color: #ff8c00;
            letter-spacing: 2px;
        }
        .goback{
            display: block;
            margin-top: -15px;
            text-decoration: none;
            color: #ff8c00;
            letter-spacing: 2px;
        }

        .already:hover {
            color: #ff6f00;
            text-decoration: underline;
        }
        .goback:hover {
            color: #ff6f00;
            text-decoration: underline;
        }
        .address{
            width: 200px;
        }
        .ur-4{
            grid-column: 1 / span 2;
            text-align: center;
            margin: -30px 0 0;
        }

    </style>


</head>

<body>



    <!-- /* Register-form HTML Start Here */ -->
    <div class="container">
        <h1>User Registration</h1>
        <form class="login-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validateForm()">

            <!-- make white 50% blur -->

            <div class="ur-1">
                <label for="mem_name">Member name</label>
                <input type="text" id="name" name="name" placeholder="eg. Yash kad" required />

                <label for="mem_name">Email</label>
                <input type="email" id="email" name="email" placeholder="eg. abc@gmail.com" required />

                <label for="mem_name">DOB</label>
                <input type="date" id="dob" name="dob" required />

                <label for="pass">Password:</label>
                <input type="password" id="password" name="password" required />
            </div>

            <div class="ur-2">
                <label for="mem_name">Phone no</label>
                <input type="number" id="ph_no" name="ph_no" placeholder="e.g. 1234567890" required />

                <p>Choose Gender</p>
                <span class="gender-radio">
                    <input type="radio" id="male" name="gender" value="Male">
                    <label> Male</label>
                    <input type="radio" id="female" name="gender" value="Female">
                    <label> Female</label>
                    <input type="radio" id="other" name="gender" value="Other">
                    <label>Other</label>
                </span>

                <label for="id">User id:</label>
                <input type="text" id="username" name="username" required />

                <!-- <span style="display: block; height: 85px;">
                </span> -->

                <label for="pass">Confirm Password:</label>
                <input type="password" id="cpassword" name="cpassword" required />
            </div>
            <label for="address" style="margin:-30px 10px">Current Address:</label><br>
            <div class="ur-4">
             
                <input type="text" name="address" class="address" style="width:500px ; margin-top:-30px">
            </div>

            <div class="ur-3">
                <button type="submit" class="register-btn">Register</button>
                <a href="User_login.php" class="already">Already a Member</a><br>
                <a href="../../index.php" class="goback">Go Back</a>
                
            </div>
        </form>
    </div>
    <!-- /* Register-form HTMl End Here */ -->


    <script>
       function validateForm() {
            var mem_name = document.getElementById("name").value.trim();
            var mem_ph_no = document.getElementById("ph_no").value.trim();
            var mem_email = document.getElementById("email").value.trim();
            var mem_gender = document.querySelector('input[name="gender"]:checked');
            var mem_dob = document.getElementById("dob").value.trim();
            var mem_userid = document.getElementById("username").value.trim();
            var mem_password = document.getElementById("password").value.trim();
            var mem_cpassword = document.getElementById("cpassword").value.trim();
            
            if (mem_name.length < 3) {
                alert('Enter a valid name (minimum 3 characters).');
                return false;
            }
            if (mem_ph_no.length !== 10) {
                alert('Contact number must be 10 digits.');
                return false;
            }
            if (!validateEmail(mem_email)) {
                alert('Please enter a valid email address.');
                return false;
            }
            if (!mem_gender) {
                alert('Please select your gender.');
                return false;
            }
            if (mem_password.length < 8) {
                alert('Password must be at least 8 characters long.');
                return false;
            }
            if (mem_cpassword !== mem_password) {
                alert('Passwords does not match.');
                return false;
            }

            return true;
        }

        function validateEmail(email) {
            var re = /\S+@\S+\.\S+/;
            return re.test(email);
        }
    </script>
</body>

</html>