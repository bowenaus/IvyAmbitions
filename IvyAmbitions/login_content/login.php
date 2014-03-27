<?php
require('PasswordHash.php');
require('../dbUtilities.php');

$mysqli = getDbConnection();
$pwdHasher = new PasswordHash(8, FALSE);


if ($mysqli->connect_error){
	  echo "Failed to connect to MySQL: " . $mysqli->connect_errno;
}

$password = $_POST["password"];

$loginId = null;

$query = "SELECT PASSWORD,USER_ID FROM SECURITY_USER WHERE USER_NAME=? ";
$stmt = $mysqli->stmt_init();
if ($stmt->prepare($query)){
	$stmt->bind_param("s", $username);
	
	$username = $_POST["username"];
	
	// Query the database for the hashed password
	
	$stmt->execute();
	$stmt->bind_result($hash, $userId);
	while ($row = $stmt->fetch()){
		$checked = $pwdHasher->CheckPassword($password, $hash);
			if ($checked){
				$loginId = $userId;
				break;
			}
			
		}
	}

$stmt->close();

session_start();
if (isset($loginId)){
	$_SESSION['user_id'] = $loginId;	
}


//header('Location:'.$_SERVER['HTTP_REFERER']);
?>

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