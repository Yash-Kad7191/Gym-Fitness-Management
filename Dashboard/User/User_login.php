
 <html>
	<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../../css/Log-Reg.css">
		<script>
			function validateForm() {
				var username = document.getElementById('username').value;
				var password = document.getElementById('password').value;
				if (username.trim() === '' && password.trim() === '') {
					alert('Please enter both USERNAME and PASSWORD.');
					return false;
				}
				if (username.trim() === '')
				{
					alert('Please enter USERNAME.');
					return false;
				}
				if (password.trim() === '')
				{
					alert('Please enter PASSWORD.');
					return false;
				}

				// Additional validation logic if needed
				
				return true; // Submit the form if validation passes
			}
    	</script>
	</head>
	<body class="lbody">
		<div class="lcontainer">
			<form action="_Login-data.php" method="POST" onsubmit="return validateForm()">
				<h1>Member Log In</h1>

				<center>
					<div class="input-box">
						<br>
						<input type="text" id="username" name="username" placeholder="Username"/>
						
					</div>
					<div class="input-box">
						<br>
						<input type="password" id="password" name="password" placeholder="Password"/>
						
					</div>
					<br>
					<button type="submit" class="btn">Login</button>
					<br>
				</center>

				<div id="signup">
					<a href="User_registration.php"> Not a Member?Sign Up</a><br><br>
					<a href="../../index.php"> Go Back</a>
				</div>
			</form>
		</div>
	</body>
</html>

