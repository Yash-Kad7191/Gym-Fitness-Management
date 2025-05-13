 <html>
	<head lang="en">
		<meta name="viewpoint" content="weight=device-weight" />
        <link rel="stylesheet" href="../../css/Log-Reg.css">
		<title>Gym And Fitness</title>
		<script>
			function validateForm() {
				var username = document.getElementById('ad_id').value;
				var password = document.getElementById('ad_password').value;
				if (username.trim() === '' && password.trim() === '') {
					alert('Please enter both AdminID and PASSWORD.');
					return false;
				}
				if (username.trim() === '')
				{
					alert('Please enter ADMIN ID.');
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
			<form action="_Admin-login-data.php" method="POST" onsubmit="return validateForm()">
				<h1>Admin Log In</h1>

				<center>
					<div class="input-box">
						<br />
						<input type="text" name="ad_id" id="ad_id" placeholder="Admin ID">
					</div>
					<div class="input-box">
						<br />
						<input type="password" name="ad_password" id="ad_password"  placeholder="Password">
					</div>
					<br />
					<button type="submit" class="btn">Login</button>
					<br />
				</center>
				<div id="signup">
					<a href="../../index.php"> Not a Admin?Sign Up</a><br><br>
					<a href="../../index.php"> Go Back</a>
				</div>
			</form>
		</div>
	</body>
</html>
