<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
{
	if($present == TRUE || $absent == TRUE)
	{
		$total=$present + $absent;

		$p1=($present/$total)*100;
		$p2=($absent/$total)*100;
		$dataPoints = array( 
			array("label"=>"Present", "y"=>$p1),
			array("label"=>"Absent", "y"=>$p2));
			echo"<html>
				<body>
				<div id='chartContainer' style='height: 370px;width:500px;'></div>
				<script src='https://cdn.canvasjs.com/canvasjs.min.js'></script>
				</body>
				</html>";
	}
	else if($present == FALSE && $absent == FALSE)
	{
		echo" <b>Add One Entry First</b>";

	}

	

}
?>
<html>
	<head>
<script>
			window.onload = function() {
			
			
			var chart = new CanvasJS.Chart('chartContainer', {
				animationEnabled: true,
				data: [{
					type: 'doughnut',
					yValueFormatString: '#,##0.00\'%\'',
					indexLabel: '{label} ({y})',
					indexLabelColor:'white',
					dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>,
					
				}],
				backgroundColor: '#36383C',
				
			});
			chart.render();
			
			}

</script>
</head>
</html>