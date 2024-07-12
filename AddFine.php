<?php
	//include 'Adminheader.php';
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
include 'Adminheader.php';?>

<link rel="stylesheet" type="text/css" href="AptiStyle.css">
<style type="text/css">
.resultDiv
{
	margin-left:350px;
}
</style>
</head>
<body>

<div class="resultDiv">
<?php
   
	// session_start();
	// if($_SESSION['uid'] == "")
	// 	{
	// 		header("Location:Login.php");
	// 	}
	if(isset($_POST['Submit']))
	{
		$License_Number=$_POST['License_Number'];
		$Fine_Reason=$_POST['Fine_Reason'];
		$Fine_Amount=$_POST['Fine_Amount'];
		$Challan_Area=$_POST['Challan_Area'];
		$Challan_Date=$_POST['Challan_Date'];
		$Case_Status=$_POST['case_status'];
		if(empty($License_Number)||empty($Fine_Reason)||empty($Fine_Amount)||empty($Challan_Area)||empty($Challan_Area))
		{
			echo "Enter all the values.";
		}
		else
		{
			include 'conn.php';

				$query="Insert into tblfine (License_Number,Fine_Reason,Fine_Amount,Challan_Area,Challan_Date,Case_Status)
					values ('$License_Number','$Fine_Reason','$Fine_Amount','$Challan_Area','$Challan_Date','$Case_Status')";

					if(mysqli_query($conn,$query))
					{
						echo "<font style=\"color:green\">Data inserted successfully.</font></br>";
						$LastValue=mysqli_insert_id($conn);
						$QueryRetrive="select * from tblfine where Challan_Number=$LastValue";
						if($QueryResult=mysqli_query($conn,$QueryRetrive))
						{
							while($result=mysqli_fetch_assoc($QueryResult))
							{
								?>
									<html>
										<body>
											<table style="border: dotted;" class="tableFine">
												<tr>
													<td> License_Number</td>
													<td> Challan_Number</td>
													<td> Fine_Reason</td>
													<td> Fine_Amount</td>
													<td> Challan_Area</td>
													<td> Challan_Date</td>
													<td> Case_Status</td>
												</tr>

												<tr>
													<td><?php echo $result['License_Number']; ?></td>
													<td><?php echo $result['Challan_Number']; ?></td>
													<td><?php echo $result['Fine_Reason']; ?></td>
													<td><?php echo $result['Fine_Amount']; ?></td>
													<td><?php echo $result['Challan_Area']; ?></td>
													<td><?php echo $result['Challan_Date']; ?></td>
													<td><?php echo $result['Case_Status']; ?></td>
												</tr>
											</table>
										</body>
									</html>

								<?php
							}
						}
						{
							echo mysqli_error($conn);
						}
					}
					else
					{
						echo mysqli_error($conn);
					}
		}

	}

?>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
	<head>
			<title> Add Fine </title>

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
				.button{
					margin-left:250px;
				}
				.textbox
				{
					margin-left:0px;
				}
			</style>

	</head>

	<body>
	<div id="contents">
			<div class="AddFine">
				<form method="Post" action="AddFine.php">
						<table>
							<tr>
							<td>Enter License Number </td>
							<td>:<select class="dropbtn" name="License_Number" required="">
								<option class="dropdown-content" value="">--Select License Number-- </option>
								<?php
									include 'class.php';
									getLicenseNumber();
								?>
		                		</select>
							</td>
							</tr>

							<tr>
							<td> Select Fine Reason</td>
							<td>:<select class="dropbtn" name="Fine_Reason" value="<?php if(isset($Fine_Reason)){echo $Fine_Reason;} ?>" required="">
							<option class="dropdown-content" value="btr" <?php if(isset($_POST['Fine_Reason']) && $_POST['Fine_Reason'] == "btr") echo 'selected="selected"';?>> Breaking Traffic Rule</option>
							<option value="Without License/Paper" <?php if(isset($_POST['Fine_Reason']) && $_POST['Fine_Reason'] == "Without License/Paper") echo 'selected="selected"';?>>Without License/Paper </option>
							<option value="Drink and drive" <?php if(isset($_POST['Fine_Reason']) && $_POST['Fine_Reason'] == "Drink and drive") echo 'selected="selected"';?>> Drink and drive</option>
							</td>
							</tr>

							<tr>
							<td>Enter Fine Amount </td>
							<td>:<input type="text" class="textbox" name="Fine_Amount" value="<?php if(isset($Fine_Amount)){echo $Fine_Amount;} ?>" required="" pattern="[0-9]{0,10}" title="Digits Only"> </td>
							 </tr>

							 <tr>
							 <td>Enter Challan Area</td>
							<td>:<input type="text" class="textbox" name="Challan_Area" value="<?php if(isset($Challan_Area)){echo $Challan_Area;} ?>" required=""></td>
							</tr>

							<tr>
							<td>Select Challan Date </td>
							<td>:<input type="Date" class="textbox" name="Challan_Date" value="<?php if(isset($Challan_Date)){echo $Challan_Date;} ?>" required="" title="Enter in DD/MM/YYYY format" pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d"> </td>
							</tr>

							<tr>
							<td>Select Case Status </td>
							<td>:<select class="dropbtn" name="case_status" required="">
							<option class="dropdown-content" value="Pending" <?php if(isset($_POST['case_status']) && $_POST['case_status'] == "Pending") echo 'selected="selected"';?>> Pending</option>
							<option value="Solved" <?php if(isset($_POST['case_status']) && $_POST['case_status'] == "Solved") echo 'selected="selected"';?>>Solved </option>
							</select> </td>
							</tr>

							 <tr>
							<td colspan="2"> <input type="Submit" name="Submit" class="button" value="Insert"></td>
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