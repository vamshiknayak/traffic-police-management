<?php
	// include 'Adminheader.php';
?>

<?php
session_start();
		if($_SESSION['uid'] == "")
		{
			header("Location:Login.php");
		}

if(isset($_REQUEST['C_N'])) {$Challan_Number=$_REQUEST['C_N'];}
 
	if(isset($_POST['GetData']))	//search button
	{
		
		if(empty($Challan_Number))
		{
			echo "Select License Number.";
		}
		else
		{
			include 'conn.php';
			$query="Select * from tblfine where Challan_Number='$Challan_Number'";
			if($QueryRetrive=mysqli_query($conn,$query))
			{
				while($result=mysqli_fetch_assoc($QueryRetrive))
				{
					$Challan_Number=$result['Challan_Number'];
					$Fine_Reason=$result['Fine_Reason'];
					$Fine_Amount=$result['Fine_Amount'];
					$Challan_Area=$result['Challan_Area'];
					$Challan_Date=$result['Challan_Date'];
					$Case_Status=$result['Case_Status'];
				}
				$_REQUEST['LicNum']=$Challan_Number;
			}
			else	
			{
				echo mysqli_error($conn);
			}
		}
		
	}


	if(isset($_POST['Update'])) // Update button
	{
		
		$Fine_Reason=$_POST['Fine_Reason'];
		$Fine_Amount=$_POST['Fine_Amount'];
		$Challan_Area=$_POST['Challan_Area'];
		$Challan_Date=$_POST['Challan_Date'];
		$Case_Status=$_POST['case_status'];
		$Challan_Number=$_REQUEST['LicNum'];

		if(empty($Fine_Reason)||empty($Fine_Amount)||empty($Challan_Area)||empty($Challan_Date))
		{
			echo "Enter all the values.";
		}
		else
		{
			include 'conn.php';
				$query_update="update tblfine set Fine_Reason='$Fine_Reason',Fine_Amount=$Fine_Amount,Challan_Area='$Challan_Area',
				Challan_Date='$Challan_Date',Case_Status='$Case_Status' where Challan_Number='$Challan_Number'";
					if(mysqli_query($conn,$query_update))
					{
						echo "<font style=\"margin-left:650px;color:green;\">Data Updated successfully.</font></br>";
						
					}
					
					else
					{
						echo mysqli_error($conn);
					}
		}
		
	}

?>

<html>
	<head>
			<title> Update Fine </title>
			<?php
			 include 'Adminheader.php';
?>
			<link rel="stylesheet" type="text/css" href="AptiStyle.css">
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
				.button
				{
					margin-left:0px;
					width:80px;
				}
				.newButton
				{
					border-style:none;
					padding:5px;
					background-color:#28B291;
					color:White;
					height:30px;
					width:200px;
					margin-left:250px;
					font-weight:bold;
				}
				.newButton:hover
				{
					background-color:#F26D2B;
					transform:scale(1.3,1.3);
					box-shadow: 0 5px 15px rgba(255, 255, 255, .4);	
				}
			</style>
	</head>

	<body>
	<div id="contents">
			<div class="AddFine">
				<form method="Post" action="UpdateFine.php">
						<table>
							<tr> 
							<td>Select Challan Number </td>
							<td>:<select class="dropbtn" name="C_N">
								<option class="dropdown-content" value="">--Select Challan Number-- </option>
								<?php
									include 'class.php';
									getChallanNumber();
								?>
		                		</select>
							</td></tr>
							<tr>
							<td><input type="Submit" name="GetData" class="button" value="GetData"</td>
							</tr>

							<tr>
							<td>Selected Challan Number </td>
							<!--<td>:<input type="text" name="LicNum" value="<?php// if(isset($License_Number)){echo $License_Number;} ?>" disabled > </td>  -->
							<td>:<input type="text" class="textbox" name="LicNum" value="<?php if(isset($_REQUEST['LicNum'])){echo $_REQUEST['LicNum'];} ?>" readonly="true" > </td>
							 </tr>
							 <tr>
							

							<tr> 
							<td> Select Fine Reason</td>
							<td>:<select class="dropbtn" name="Fine_Reason" value="<?php if(isset($Fine_Reason)){echo $Fine_Reason;} ?>"> 
							<option class="dropdown-content" value="btr" <?php if(isset($_POST['Fine_Reason']) && $_POST['Fine_Reason'] == "btr") echo 'selected="selected"';?>> Breaking Traffic Rule</option>
							<option value="wlp" <?php if(isset($_POST['Fine_Reason']) && $_POST['Fine_Reason'] == "wlp") echo 'selected="selected"';?>>Without License/Paper </option>
							<option value="dad" <?php if(isset($_POST['Fine_Reason']) && $_POST['Fine_Reason'] == "dad") echo 'selected="selected"';?>> Drink and drive</option>
							</td>
							</tr>

							
							<tr>
							<td>Enter Fine Amount </td>
							<td>:<input type="text" class="textbox" name="Fine_Amount" value="<?php if(isset($Fine_Amount)){echo $Fine_Amount;} ?>"> </td>
							 </tr>

							 <tr> 
							 <td>Enter Challan Area</td>
							<td>:<input type="text" class="textbox" name="Challan_Area" value="<?php if(isset($Challan_Area)){echo $Challan_Area;} ?>"></td>
							</tr>

							<tr> 
							<td>Select Challan Date </td>
							<td>:<input type="Date" class="textbox" name="Challan_Date" value="<?php if(isset($Challan_Date)){echo $Challan_Date;} ?>" title="Enter in DD/MM/YYYY format" pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d"> </td>
							</tr>

							<tr> 
							<td>Select Case Status </td>
							<td>:<select class="dropbtn" name="case_status">
							<option class="dropdown-content" value="Pending" <?php if(isset($_POST['case_status']) && $_POST['case_status'] == "Pending") echo 'selected="selected"';?>> Pending</option>
							<option  value="Solved" <?php if(isset($_POST['case_status']) && $_POST['case_status'] == "Solved") echo 'selected="selected"';?>>Solved </option>
							</select> </td>
							</tr>

							 <tr>
							<td colspan="2"> <input type="Submit" class="newButton" name="Update" value="Update"></td>
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