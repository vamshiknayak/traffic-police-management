<?php
// session_start();
// 	include 'Adminheader.php';
// 	session_abort();
	session_start();
	if($_SESSION['uid'] == "")
		{
			header("Location:Login.php");
		}
	
?>

<?php
	
	if(isset($_POST['Delete']))
	{
		$License_Number=$_POST['License_Number'];
		if(empty($License_Number))
		{
			echo"Select License Number."."<br>";
		}
		else
		{
			include 'conn.php';
			$query =  "Delete from tbllicense where License_Number='$License_Number'";
			// echo $License_Number;
			if(mysqli_query($conn,$query))
			{
				echo "<font style=\"margin-left:650px;color:green\">Data Deleted Successfully.</font> ",mysqli_error($conn)."<br>";
				
			}
			else
			{
				echo "<font style=\"margin-left:600px;color:red\">Data cannot be  deleted. It is referred by another module</font><br>";
			}
			mysqli_close($conn);	
		}

	}
	
	
?>

<!DOCTYPE html>
	<head>
	<link rel="stylesheet" type="text/css" href="AptiStyle.css">
	<?php
	include 'Adminheader.php';?>
	<style>
		
		.contents
		{
		width:600px;
		margin-left:400px;
		padding:10px;
		}
		.table
		{
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}
		.button
		{
			margin-left:10px;
			width:80px;
		}
		</style>

			<title> Delete License</title>
			<!--<link rel="stylesheet" type="text/css" href="boot.css">-->
	</head>

	<body>

		<div class="contents" align="center">
			<div id="contents"  class="AddLicense">
				<form id="contents" method="Post" action="DeleteLicense.php">
				<select name="License_Number" class="dropbtn">
				<option class="dropdown-content" value="" >--Select License Number-- </option>

					<?php
					include'class.php';
					getlicenseNumber();
					?>
					<input type="Submit" value="Delete" class="button" name="Delete">
					<br/><br/>
					<?php
					//include'class.php';
					getlicense();
					?>


				</form>
			</div>
		</div>
	</body>
	
</html>




<?php
	include 'footer.php';
?>