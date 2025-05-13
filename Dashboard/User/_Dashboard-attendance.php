<?php
include('../../Include/_dbconnect.php');
	$present = $absent='0';
	$username = $_SESSION['username'];
	$sql1 = "SELECT `members`.`username`, `attendance`.`attendance_date`, `attendance`.`status`,`attendance`.`attendance_id`
	FROM `members`
	JOIN `attendance` ON `members`.`member_id` = `attendance`.`member_id`
	WHERE `members`.`username` = '$username'";
	$result = mysqli_query($conn,$sql1);
	if ($result) 
	{ 
        while ($row = mysqli_fetch_assoc($result)) 
		{
            if($row['status']=='Present')
			{
				$present++;
			}
			else if($row['status']=='Absent'){
				$absent++;
			}
		}
    }
mysqli_close($conn);
if($present==TRUE ||$absent== TRUE)
{
$total=$present+$absent;

$p1=($present/$total)*100;
$p2=($absent/$total)*100;
$dataPoints = array( 
	array("label"=>"Present", "y"=>$p1),
    array("label"=>"Absent", "y"=>$p2));
}
else{
	echo" <b>Mark Attendance First</b>";
}


 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
	var chart = new CanvasJS.Chart("chartContainer", {
		animationEnabled: true,
		backgroundColor: "#36383C", // Set chart background color to black
		title: {
			text: "Your Attendance of Month",
			fontColor: "white" // Change title color to yellow
		},
		data: [{
			type: "doughnut",
			yValueFormatString: "#,##0.00\"%\"",
			indexLabel: "{label} ({y})",
			dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>,
			indexLabelFontColor: "grey", // Change label color to grey
			indexLabelFontSize: 14
		}]
	});
	chart.render();
}
</script>
</head>
<body>
<div id="chartContainer" style="min-height: 220px;width:auto;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>