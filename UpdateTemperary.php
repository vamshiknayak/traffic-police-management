

<?php
 	
 	session_start();
	if($_SESSION['uid'] == "")
		{
			header("Location:Login.php");
		}

	if(isset($_POST['GetValues']))	//search button
	{
		$UpdateTemperary_Sr_No= $_REQUEST['Sr_No'];
		if(empty($UpdateTemperary_Sr_No))
		{
			echo "<font style=\"margin-left:650px;color:red;\">Select Serial Number.</font>";
		}
		else
		{
			include 'conn.php';
			$query="Select * from tblTemperary where Sr_No='$UpdateTemperary_Sr_No'";
			if($QueryRetrive=mysqli_query($conn,$query))
			{
				while($result=mysqli_fetch_assoc($QueryRetrive))
				{
					$UpdateTemperary_Sr_No=$result['Sr_No'];
					$Name=$result['Name'];
					$Mobile=$result['Mobile'];
					$Address=$result['Address'];
					$Vehicle_Number=$result['Vehicle_Number'];
					$Challan_Date=$result['Challan_Date'];
					$Fine_Reason=$result['Fine_Reason'];
					$Fine_Amount=$result['Fine_Amount'];
					$Case_Status=$result['Case_Status'];
				}
			}
			else
			{
				echo mysqli_error($conn);
			}
		}
		
	}

	elseif(isset($_POST['Update'])) //update button
	{
	//	ini_set("display_errors", 0); //supress errors
					$UpdateTemperary_Sr_No=$_POST['SN'];
					$Name=$_POST['Name'];
					$Mobile=$_POST['Mobile'];
					$Address=$_POST['Address'];
					$Vehicle_Number=$_POST['Vehicle_Number'];
					$Challan_Date=$_POST['Challan_Date'];
					$Fine_Reason=$_POST['Fine_Reason'];
					$Fine_Amount=$_POST['Fine_Amount'];
					$Case_Status=$_POST['Case_Status'];
		if(empty($Name)||empty($Mobile)||empty($Address)||empty($Vehicle_Number)||empty($Fine_Amount)||empty($Case_Status))
		{
			echo"<font style=\"margin-left:650px;color:red;\">Enter all the values.</font><br>";
		}
		else
		{
			include 'conn.php';
	$query_update="Update tblTemperary set Name='$Name', Mobile='$Mobile', Address='$Address',Vehicle_Number='$Vehicle_Number',Challan_Date='$Challan_Date',
	Fine_Reason='$Fine_Reason', Fine_Amount='$Fine_Amount', Case_Status='$Case_Status' where Sr_No='$UpdateTemperary_Sr_No'";
			if(mysqli_query($conn,$query_update))
			{
				echo "<font style=\"margin-left:650px;color:green;\">Data Updated Successfully. </font></br>";
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
	<?php
	 include 'Adminheader.php';
?>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="AptiStyle.css" type="text/css">
			<title> Update Temporary </title>
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
					margin-left:280px;
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
			<div class="UpdateTemperary">
				<form method="Post" action="UpdateTemperary.php">
					<table>
						<tr> 
							<td>Select Serial Number </td>
							<td>:<select class="dropbtn" name="Sr_No">
								<option class="dropdown-content" value="">--Select Serial Number-- </option>
								<?php
									include 'class.php';
									getSr_No();
								?>
		                		</select>
							</td></tr>
						<tr><td> <input type="Submit" name="GetValues" class="button" value="GetValues"</td>
						</tr>
						<tr> 
						<td> Selected Serial Number</td>
							<td>:<input type="text" class="textbox" name="SN" value="<?php if(isset($UpdateTemperary_Sr_No)) {echo $UpdateTemperary_Sr_No;} ?>" readonly="true"> </td>
							</tr>
						<tr> 
							<td> Enter Name</td>
							<td>:<input type="text" class="textbox" name="Name" value="<?php if(isset($Name)) {echo $Name;} ?>"> </td>
							</tr>

							<tr>
							<td>Enter Mobile Number </td>
							<td>:<input type="text" class="textbox" name="Mobile" value="<?php if(isset($Mobile)) {echo $Mobile;} ?>"> </td>
							 </tr>

							 <tr> 
							 <td>Enter Address</td>
							<td>:<textarea style="width:300px"  name="Address"> <?php if(isset($Address)) {echo $Address;} ?></textarea> </td>
							</tr>

							<tr> 
							<td>Enter Vehicle Number </td>
							<td>:<input type="text" class="textbox" name="Vehicle_Number" value="<?php if(isset($Vehicle_Number)) {echo $Vehicle_Number;} ?>"> </td>
							</tr>

							<tr> 
							<td>Select Challan Date </td>
							<td>:<input type="Date" class="textbox" name="Challan_Date" value="<?php if(isset($Challan_Date)){echo $Challan_Date;} ?>" title="Enter in DD/MM/YYYY format" pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d"> </td>
							</tr>

							<tr>
							<td>Fine Reason</td>
							<td>: <input type="text" class ="textbox" name="Fine_Reason" value="<?php if(isset($Fine_Reason)){echo $Fine_Reason;} ?>">
							</td>
							</tr>

							<tr> 
							<td>Enter Fine Amount </td>
							<td>:<input type="text" class="textbox" name="Fine_Amount" value="<?php if(isset($Fine_Amount)){echo $Fine_Amount;} ?>"> </td>
							</tr>

							<tr>
							<td> Select Case Status</td>
							<td>:<Select class="dropbtn" name="Case_Status">
							<option class="dropdown-content" value="Pending" <?php if(isset($_POST['Case_Status']) && $_POST['Case_Status'] == "Pending") echo 'selected="selected"';?>> Pending</option>
							<option value="Solved" <?php if(isset($_POST['case_status']) && $_POST['case_status'] == "Solved") echo 'selected="selected"';?>>Solved </option>
							 </td>
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