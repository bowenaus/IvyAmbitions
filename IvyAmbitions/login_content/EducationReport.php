<?php
session_start();
if (!isset($_SESSION['user_id']))
{
	header('Location:'.$_SERVER['HTTP_REFERER']);
}

$userId = $_SESSION['user_id'];

?>

<script src="javascript.js"></script>


<script>
function updateAge(){
	if (formatDate('dob')){
		var dob = document.getElementById('dob').value;
		var parts = dob.split('/');
		var bd = new Date(dob);
		document.getElementById('age').value =  Math.floor((Date.now()-bd)/31556952000) ;
	} else
	{
		document.getElementById('age').value= "";
	}	
}
</script>
<html>
<form action="EducationReport.php" method="post">

	<table>
		<tr>
			<td>
		<?php  echo 'First Name: ';?>
		
		<td>My First Name</td>
	
	
		</td>
			<td>
		<?php  echo 'Last Name: ';?>
			</td>
		 
		
		<td>My Last Name</td>
		
		
		</tr>
		<tr>
			<td>
				<?php  echo 'Date of Birth: ';?>
	
			</td>
			
			<td><input type="textbox" id="dob" onblur="updateAge();"></input></td>
			
			<td>
				<?php  echo 'Age: ';?>
	
			</td>
			
			<td><input type="textbox" id="age" disabled="true"></input></td>
			
		</tr>
		<tr>
			<td>
				<?php  echo 'Grad Year: ';?>
			</td>	
			<td>
				<?php  echo 'Class: ';?>
			</td>
		</tr>

		<tr>
			<td>
				<?php  echo 'Major: ';?>
			</td>
			<td>
				<?php  echo 'GPA: ';?>
			</td>
		</tr>

	</table>

<script>
updateAge();
</script>
</form>
</html>