<?php
	// include 'Adminheader.php';
	session_start();
	if($_SESSION['uid'] == "")
		{
			header("Location:Login.php");
		}
?>

<?php
		if($_SESSION['uid'] == "")
		{
			header("Location:Login.php");
		}
	
	if(isset($_POST['Delete']))
	{
		$Sr_No=$_POST['Sr_No'];
		if(empty($Sr_No))
		{
			echo"Select Challan Number."."<br>";
		}
		else
		{
			include 'conn.php';
			$query =  "Delete from tbltemperary where Sr_No='$Sr_No'";
			// echo $License_Number;
			if(mysqli_query($conn,$query))
			{
				echo "<font style=\"margin-left:650px;color:green\">Data Deleted Successfully.</font> ",mysqli_error($conn)."<br>";
				
			}
			else
			{
				echo "<font style=\"margin-left:650px;color:red\">Data cannot be  deleted.</font> ",(mysqli_error($conn)."<br>");
			}
			mysqli_close($conn);	
		}

	}
	
	
?>

<!DOCTYPE html>
	<head>
	<?php
	 include 'Adminheader.php';
?>
	<link rel="stylesheet" type="text/css" href="AptiStyle.css">
	<style>
		
		.contents
		{
		width:600px;
		margin-left:400px;
		padding:10px;
		}
		.button
		{
			margin-left:10px;
			width:80px;
		}
		</style>
	
			<title> Delete Temporary </title>
			<!--<link rel="stylesheet" type="text/css" href="boot.css">-->
	</head>

	<body>

		<div class="contents" align="center">
			<div id="contents" class="DeleteFine">
				<form id="contents" method="Post" action="DeleteTemperary.php">
				<select class="dropbtn" name="Sr_No">
				<option class="dropdown-content" value="" >--Select Temporary SR Number-- </option>

					<?php
					include 'class.php';
					getTempSrNo();
					?>
					<input type="Submit" value="Delete" class="button" name="Delete"><br/><br/>
					<?php
					getTemperary();
					?>


				</form>
			</div>
		</div>
	</body>
	
</html>




<?php
	include 'footer.php';
?>