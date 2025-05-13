

<?php include '_Fitness-caculate.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fitness Report</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <style>

        .report-main {
            width: 1000px;
            box-sizing: border-box;
            margin: 3% auto 3%;
            padding: 30px 0;
            background-color:#36383C;
            border-radius: 15px;
            box-shadow: 5px 5px 5px black;
        }


        .report-content {
            display: flex;
            justify-content: center;
            gap: 20px;
            align-items: center;
            padding: 0px 50px;
        }

        .report-input {
            text-align: justify;
            color: #36383C;
            width: 17%;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 10px;
            border: 1px solid black;
        }



        .report-button {
            width: 20%;
            background-image: linear-gradient(to top, #ee821a, #ed8c17, #eb9615, #e9a015, #e78918);
            color: #fff;
            border-radius: 10px;
            border: none;
            font-size: 14px;
            letter-spacing: 1.5px;
            padding: 15px 25px;
            transition: ease-in-out 0.1s;
        }


        .report-button:hover {
            font-size: 15px;
            border:2px solid white;
        }
        .report-cal{
            display:flex;
            justify-content: center;
            gap:30px;
          
        }
        .reports{
            background-color: #36383C;
            height:200px;
            width:250px;
            border: 2px solid white;
            color: white;
            display: grid;
            justify-content: space-around;
            align-content: space-around;
            font-size: x-large;
        }
        select{
            font-size: x-large;
            border-radius: 7px;
        }
        
    </style>
</head>

<body>
<?php include("_Uheader.php")?>
    <div class="report-main">
        <center>
            <h1 style="color: #fff; letter-spacing: 2px; padding-bottom:20px;">Report</h1>
        </center>
        <form action="User_fitnessreport.php" method="POST">
            <div class="report-content">

                <input class="report-input" placeholder="Height in cm" type="number" name="height"required/>

                <input class="report-input" placeholder="Weight in kg" type="number" name="weight"required/>

                <input class="report-input" placeholder="Age in year" type="number" name="age"required/>

                <select name="gender">
                    <option> Select gender</option>
                   <option value="male">Male</option>
                   <option value="female">Female</option> 
                </select>

                <button type="submit" class="report-button">Calculate</button>
        
            </div>
        </form>
    </div>
   
    <div class="report-cal">
        <div class="reports" style="text-align:center";>
        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            echo"<b> BMI<br><br> $bmi</b>";
        }
            else{
                echo"<b>FIRST ENTER VALUES<br>
                To See Your BMI</b>";
            }?>
        </div>

        <div class="reports">
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo"<b>BMR<br> <br>$bmr cal</b>";}
            else{
                echo"<b>FIRST ENTER VALUES<br>
                To See Your BMR</b>";
            }?>
        </div>


        <!-- <div class="reports">

        </div> -->
    </div>
    
</body>

</html>