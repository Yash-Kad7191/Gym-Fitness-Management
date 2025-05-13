
<?php include('_Attendance-data.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Attendance</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <style>

        .attendance-main {
            box-sizing: border-box;
            margin:10px 80px;
            padding: 30px 0;
            background-color: #36383C;
            border-radius: 15px;
            box-shadow: 5px 5px 5px black;
        }

        .attendance-content {
            display: grid;
            justify-content: space-evenly;
            align-items: center;
            padding: 20px 50px;
        }
        .attendance-input-main{
            display:flex;
            justify-content: center;
            gap: 30px;

        }
        .attendance-input {
            text-align: justify;
            color: #000;
            width: 30%;
            padding: 15px 20px;
            font-size: 16px;
            border-radius: 10px;
            border: none;
        }
        .attendance-input:hover{
            border:2px soild black;
        }


        .attendance-select {
            text-align: justify;
            color: #000;
            width: 30%;
            padding: 15px 15px;
            font-size: 16px;
            border-radius: 10px;
        }

        .attendance-btn {
            background-image: linear-gradient(to top, #ee821a, #ed8c17, #eb9615, #e9a015, #e78918);
            color: #fff;
            border-radius: 10px;
            border: none;
            font-size: 13px;
            letter-spacing: 1.5px;
            padding: 15px 25px;
            transition: ease-in-out 0.1s;
        }


        .attendance-btn:hover {
            font-size: 14px;
            border:2px solid white;
        }

        .fa-plus {
            margin-left: 7px;
        }


        .attendance-para {
            display: flex;
            margin-left:20;
            width: 80%;
            text-align: justify;
            float:left;
            height: 300px;
            overflow: auto; 
            border:1px solid; 
            padding: 10px;
          /*property to hide scroll bar  */
                
        }
        a{
            text-decoration: none;
            color:white;
        }
        a:hover{
            color:orange;
        }
        center{
            width:100%;
        }
        .main{
            position:sticky;
            top:-15px;
            z-index:999;
            background-color: black;
        
        }
        ::-webkit-scrollbar{
    width: 7px;

}
::-webkit-scrollbar-thumb{
    background-image: linear-gradient(to top, #ee821a, #ed8c17, #eb9615, #e9a015, #e7a918);
}
::-webkit-scrollbar-track{
    background-color: none;
}
/* 
        .piechart{
            height: 500px;
            width: 400px;

        } */

        /* TABLE CSS STARTS FROM HERE */
        table {
            width:100%;
				border-collapse: collapse;
                
              }

			table,th,td {
				color: white;
				border: 1px solid #666;
                
			}

			th,td {
				padding: 10px;
				text-align: left;
			}

			td {
				font-size: 1.5rem;
				background: #555;
                text-align: center;
			}

			th{
				font-size: 1.8rem;
			}

			
			.btn {
				padding: 10px 20px;
				background-color: #007bff;
				margin: 10px 20px;
				color: white;
				font-size: 1.3rem;
				border: none;
				cursor: pointer;
				
			}
            .down{
                display:flex;
                justify-content: space-evenly;
                margin-top:20px;
            }
            
    </style>

</head>

<body>
	<?php include '_Uheader.php';?>
    <div class="attendance-main">
	<center><h2 style="color: #fff; letter-spacing: 2px; padding-bottom:20px;">ATTENDANCE</h2></center>
        <form method="POST" action="<?php ($_SERVER["PHP_SELF"]); ?>" class="attendance-content">
            <div class="attendance-input-main">
            <input class="attendance-input" placeholder="dd-mm-yy" type="date" name="date" required>

            <select name="status" id="status" class=" attendance-select"required>
                <option value="">Select status</option>
                <option value="present">Present</option>
                <option value="absent">Absent</option>
            </select>

            <button type=submit class="attendance-btn">Mark Attendance<i class="fa-solid fa-plus fa-fw"></i></button>
            </div>
        </from>
    </div>
    <div class="down">
        <div class="attendance-para">
            <?php include '_Attendance-data-show.php';?>

      

</body>

</html>
