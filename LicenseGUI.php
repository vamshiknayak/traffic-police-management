<html>
	<head>
	<link rel="stylesheet" href="css/style.css" type="text/css">
			<title> Add License </title>
			<style>
				table, th, td 
				{
   					 border: 1px;
    				padding: 5px;
				}
			</style>
	</head>

	<body>
		<div id="contents">
			<div class="AddLicense">
				<form method="Post" action="AddLicense.php">
					<table>
						<tr> 
						<td>Enter License Number </td>
						<td>:<input type="text" name="License_Number" value="<?php if(isset($License_Number)) {echo  																						$License_Number;} ?>"> </td>
						</tr>

						<tr> 
						<td> Enter Name</td>
						<td>:<input type="text" name="Name" value="<?php if(isset($Name)) {echo $Name;} ?>"> </td>
						</tr>

						<tr>
						<td>Enter Mobile Number </td>
						<td>:<input type="text" name="Mobile" value="<?php if(isset($Mobile)) {echo $Mobile;} ?>"> </td>
						 </tr>

						 <tr> 
						 <td>Enter Address</td>
						<td>:<textarea  name="Address"> <?php if(isset($Address)) {echo $Address;} ?></textarea> </td>
						</tr>

						 <tr>
						 <td> </td>
						<td> <input type="Submit" name="Submit" value="Insert"></td>
						 </tr>

					</table>
				</form>
			</div>
		</div>
	</body>
	
</html>
