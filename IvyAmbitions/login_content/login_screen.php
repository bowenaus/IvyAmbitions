<html>
<head>
	<!-- META -->
	<title>Ivy Ambitions - Login</title> 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../css/kickstart.css" media="all" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" media="all" /> 
	<link rel="stylesheet" type="text/css" href="../css/home.css" media="all" /> 
	<link rel="stylesheet" type="text/css" href="../css/ivy-ambitions.css" media="all" /> 
	<link rel="stylesheet" type="text/css" href="../css/secondary-page-styles.css" media="all" />
	
	
	<!-- Javascript -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/kickstart.js"></script>
	<script type="text/javascript" src="../js/page-events.js"></script>
</head>
<body>

	<div class="page-wrapper">
				<?php  include '../header.php' ?>
						
				<div class="main-content-wrapper">
					<form action="login.php" method="post">
					<label for="username">Username: </label>
					<input type="text" name="username" />
					<label for="password">Password: </label>
					<input type="password" name="password" />
					
					<input type="submit" ></input>
					
					</form>
					
				
				</div>
			
			</div>
	

</body>
</html>