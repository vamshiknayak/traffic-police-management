<?php
// include 'Adminheader.php';
?>
<?php
	// include 'Adminheader.php';
	session_start();
	if($_SESSION['uid'] == "")
		{
			header("Location:Login.php");
		}
?>

<!DOCTYPE html>
<html>
<head>
<?php
include 'Adminheader.php';
?>
<style type="text/css">
.resultDiv
{
	margin-left:400px;
}
</style>
</head>
<body>
<div class="resultDiv">

<?php

	if(isset($_POST['Submit']))
	{
		$Name=$_POST['Name'];
		$Mobile=$_POST['Mobile'];
		$Address=$_POST['Address'];
		$Vehicle_Number=$_POST['Vehicle_Number'];
		$Challan_Date=$_POST['Challan_Date'];
		$Fine_Reason=$_POST['Fine_Reason'];
		$Fine_Amount=$_POST['Fine_Amount'];
		$Case_Status=$_POST['Case_Status'];

		include 'conn.php';
		
			$query="Insert into tbltemperary (Name,Mobile,Address,Vehicle_Number,Challan_Date,Fine_Reason,Fine_Amount,Case_Status) 
			values ('$Name','$Mobile','$Address','$Vehicle_Number','$Challan_Date','$Fine_Reason','$Fine_Amount','$Case_Status')";
			if(mysqli_query($conn,$query))
			{
				echo "Data inserted successfully.";

				$LastValue=mysqli_insert_Id($conn);
				$queryRetrive="select * from tbltemperary where SR_No=$LastValue";
				if($QueryResult=mysqli_query($conn,$queryRetrive))
				{
					
						while($result=mysqli_fetch_assoc($QueryResult))
						{
							?>
							<html>
									<head>
									<link rel="stylesheet" href="css/table.css">
									</head>
									<body>
										<table style="border: dotted;">
											<tr>
											<td> Sr_No </td>
											<td> Name </td>
											<td> Number </td>
											<td> Address </td>
											<td> Vehicle_Number </td>
											<td> Challan_Date </td>
											<td> Fine_Reason </td>
											<td> Fine_Amount </td>
											<td> Case_Status </td>
											</tr>

											<tr>
												<td><?php echo $result['Sr_No'];?></td>
												<td><?php echo $result['Name'];?></td>
												<td><?php echo $result['Mobile'];?></td>
												<td><?php echo $result['Address'];?></td>
												<td><?php echo $result['Vehicle_Number'];?></td>
												<td><?php echo $result['Challan_Date'];?></td>
												<td><?php echo $result['Fine_Reason'];?></td>
												<td><?php echo $result['Fine_Amount'];?></td>
												<td><?php echo $result['Case_Status'];?></td>
											</tr>
										</table>
									</body>
								</html>
							<?php
							echo "</br>";
						}
					
				}
				else
				{
					echo "Connot retrive last generted row."."<br>";
				}


			}

			else
			{
				echo mysqli_error($conn);
			}	
			mysqli_close($conn);
	  }
?>
</div>
</body>
</html>


<html>
	<head>
			<title> Add Temporary </title>
			<link rel="stylesheet" href="AptiStyle.css">
			<style>
				table, th, td 
				{
   					 border: 1px;
    				padding: 5px;
				}
				#contents
				{
					width:900px;
					margin-left:250px;
					padding:10px;
				}
				.textbox
				{
					margin-left:0px;
				}
				.AddTemperary{
					margin-left:130px;
				}
				.button{
				}
			</style>
	</head>

	<body>
		<div id="contents">
				<div class="AddTemperary">
					<form method="Post" action="Addtemperary.php">
						<table>
							
							<tr> 
							<td> Enter Name</td>
							<td>:<input type="text" class="textbox" name="Name" required="" value="<?php if(isset($Name)) {echo $Name;} ?>"> </td>
							</tr>

							<tr>
							<td>Enter Mobile Number </td>
							<td>:<input type="text" class="textbox" name="Mobile" value="<?php if(isset($Mobile)) {echo $Mobile;} ?>" required="" pattern="[0-9]{10,10}" title="Ten Digit Mobile Number"> </td>
							 </tr>

							 <tr> 
							 <td>Enter Address</td>
							<td>:<textarea style="width:300px" name="Address" required=""> <?php if(isset($Address)) {echo $Address;} ?></textarea required=""> </td>
							</tr>

							<tr> 
							<td>Enter Vehicle Number </td>
							<td>:<input type="text" class="textbox" name="Vehicle_Number" value="<?php if(isset($Vehicle_Number)) {echo $Vehicle_Number;} ?>" required=""> </td>
							</tr>

							<tr> 
							<td>Select Challan Date </td>
							<td>:<input type="Date" class="textbox" name="Challan_Date" value="<?php if(isset($Challan_Date)){echo $Challan_Date;} ?>" required="" title="Enter in DD/MM/YYYY format" pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d"> </td>
							</tr>

							<tr>
							<td>Fine Reason</td>
							<td>: <input type="text" class ="textbox" name="Fine_Reason" value="<?php if(isset($Fine_Reason)){echo $Fine_Reason;} ?>" required></td>
							</tr>

							<tr> 
							<td>Enter Fine Amount </td>
							<td>:<input type="text" class="textbox" name="Fine_Amount" value="<?php if(isset($Fine_Amount)){echo $Fine_Amount;} ?>" required="" pattern="[0-9]{0,10}" title="Numeric values only"> </td>
							</tr>

							<tr>
							<td> Select Case Status</td>
							<td>:<Select class="dropbtn" name="Case_Status">
							<option class="dropdown-content" value="Pending" <?php if(isset($_POST['Case_Status']) && $_POST['Case_Status'] == "Pending") echo 'selected="selected"';?>> Pending</option>
							<option value="Solved" <?php if(isset($_POST['case_status']) && $_POST['case_status'] == "Solved") echo 'selected="selected"';?>>Solved </option>
							 </td>
							 </tr>

							 <tr>
							<td colspan="2"> <input type="Submit" class="button" name="Submit" value="Insert"></td>
							 </tr>

						</table>
					</form>
				</div>
		</div>
	</body>
	
</html>

<?php
	include 'footer.php';
?>