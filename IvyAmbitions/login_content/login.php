<?php
require('PasswordHash.php');
require('../dbUtilities.php');

$mysqli = getDbConnection();
$pwdHasher = new PasswordHash(8, FALSE);

if (isset($_POST["username"], $_POST['password']))
{
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
}


header('Location:'.$_SERVER['HTTP_REFERER']);
//header('Location:'.'../index.php');
?>

