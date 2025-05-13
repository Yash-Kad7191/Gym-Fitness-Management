<!DOCTYPE html>
<html lang="en">
    <head>
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
                display: grid;
                gap:5px;
                padding:10px 30px;

            }
        .btn1 {
            background-color: transparent; 
            text-decoration: none;
            border: 2px solid black;
            text-decoration: none;
            color: white;
            border: 1px solid white;
            
           
        } 
        .btn1:hover{
            transition: 0.2ms;
            background-image: linear-gradient(to top, #ee821a, #ed8c17, #eb9615, #e9a015, #e78918);

        }
        .btn2 {
            background-color: transparent; 
            text-decoration: none;
            border: 2px solid black;
            text-decoration: none;
            color: white;             
              border: 1px solid white;
        } 
        .btn2:hover{
            transition: 0.2ms;
            background-image: linear-gradient(to top, #ee821a, #ed8c17, #eb9615, #e9a015, #e78918);
        }
        .btn3 {
            background-color: transparent;
            border: 2px solid black;
            text-decoration: none;
            color: white;
                           border: 1px solid white;
        } 
        .btn3:hover{
            transition: 0.2ms;
            background-image: linear-gradient(to top, #ee821a, #ed8c17, #eb9615, #e9a015, #e78918);
        }
        h2{
            margin-top: 10px;
            text-align: center;
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
        </style>

    </head>
	<body>
        <div>
        <?php include("_Aheader.php")?>
        </div>
        <div>
        <h2><u>List of Members</u></h2>
        <?php include '_Member-data-show.php';
        // echo'<h3>Total Members : '.$total_user.'</h3>';
        ?>
        </div>
</body>
</html>