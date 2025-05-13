<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Workout plans</title>
         <style>
             table {
				border-collapse: collapse;
				margin: 30px auto 0px auto;
                width: 65%;
                
              }

			table,th,td {
				color: white;
				border: 1px solid #666;
			}

			th,td {
				text-align: center;
			}

			td {
				font-size: 1rem;
				background: #555;
			}

			th{
				font-size: 1.5rem;
            }
				
            .down{
                display:flex;
                justify-content: space-evenly;
                margin-top:20px;
            }



        .grp-btn{
            padding:10px 30px;
            gap: 15px;

            }
        .btn1 {
            background-color: transparent; 
            text-decoration: none;
            border: 1px solid white;
            text-decoration: none;
            color: white;
            display: block;

            
           
        } 
        .btn1:hover{
            transition: 0.2ms;
            background-image: linear-gradient(to top, #ee821a, #ed8c17, #eb9615, #e9a015, #e78918);

        }
        .btn2 {
            background-color: transparent; 
            text-decoration: none;
            border: 1px solid white;
            text-decoration: none;
                color: white;
                display: block;
        } 
        .btn2:hover{
            transition: 0.2ms;
            background-image: linear-gradient(to top, #ee821a, #ed8c17, #eb9615, #e9a015, #e78918);
        }
        h2{
            margin-top: 10px;
            text-align: center;
        }
        </style>

    </head>
    <body>
        <div> <?php include '_Aheader.php';?></div>
        <div> <?php include '_Add-workoutplan.php';?></div>
        <div><?php include("_Workoutplan-data-show.php")?></div>
    </body>
</html> 

