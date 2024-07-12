<html>
<head>
</head>
</html>
<?php

function getLicenseNumber()
	{

			include "conn.php";
			 $QueryRetrive = "SELECT License_Number FROM tbllicense order by Sr_No desc";
			 if($QueryResult=mysqli_query($conn,$QueryRetrive))
				 {
					 while ($result = mysqli_fetch_array($QueryResult))
 							{
 								echo "<option value= '".$result['License_Number']."' >" . $result['License_Number'] . "</option>";
 							}
								
				 }
				 else
				 {
						echo mysqli_error($conn);
				 }
				 mysqli_close($conn);
								
	}

	function getChallanNumber()
	{

			include "conn.php";
			 $QueryRetrive = "SELECT Challan_Number FROM tblfine order by Challan_Number desc";
			 if($QueryResult=mysqli_query($conn,$QueryRetrive))
				 {
					 while ($result = mysqli_fetch_array($QueryResult))
 							{
 								echo "<option value= '".$result['Challan_Number']."' >" . $result['Challan_Number'] . "</option>";
 							}
								
				 }
				 else
				 {
						echo mysqli_error($conn);
				 }
				 mysqli_close($conn);
								
	}


	function viewLicense()
	{
		include 'conn.php';
		$queryRetrive="select * from tblLicense order by Sr_No desc";
				if($QueryResult=mysqli_query($conn,$queryRetrive))
				{
					?>
					<table class="table">
										<tr>
										<th> Sr_No </th>
										<th> License_Number</th>
										<th> Name </th>
										<th> Number </th>
										<th> Address </th>
										</tr>
					
										<?php
						while($result=mysqli_fetch_assoc($QueryResult))
						{
							?>
							
										<tr>
											<td><?php echo $result['Sr_No'];?></td>
											<td><?php echo $result['License_Number'];?></td>
											<td><?php echo $result['Name'];?></td>
											<td><?php echo $result['Mobile'];?></td>
											<td><?php echo $result['Address'];?></td>
										</tr>
									<?php
						}
						?> 
							
						
					</table>		
						<?php	
					
				}
				else
				{
					echo "Connot retrive table."."<br>";
				}

				
				
	}

	function getLicense()
	{
		include 'conn.php';
		$queryRetrive="select * from tblLicense order by Sr_No desc";
				if($QueryResult=mysqli_query($conn,$queryRetrive))
				{
					?>
					<table class="table">
										<tr>
										<th> Sr_No </th>
										<th> License_Number</th>
										<th> Name </th>
										<th> Number </th>
										<th> Address </th>
										</tr>
					
										<?php
						while($result=mysqli_fetch_assoc($QueryResult))
						{
							?>
							
										<tr>
											<td><?php echo $result['Sr_No'];?></td>
											<td><?php echo $result['License_Number'];?></td>
											<td><?php echo $result['Name'];?></td>
											<td><?php echo $result['Mobile'];?></td>
											<td><?php echo $result['Address'];?></td>
										</tr>
									<?php
						}
						?> 
							
						
					</table>		
						<?php	
					
				}
				else
				{
					echo "Connot retrive table."."<br>";
				}

				
				
	}
	
function viewFine()
	{
		include 'conn.php';
		$queryRetrive="select * from tblFine order by Challan_Number desc";
				if($QueryResult=mysqli_query($conn,$queryRetrive))
				{
					?>

					<table class="table">
										<tr>
										<th> License Number </th>
										<th> Challan Number</th>
										<th> Challan Date </th>
										<th> Fine Reason </th>
										<th> Challan Area </th>
										<th> Fine Amount</th>
										<th> Case Status </th>
										</tr>
					
										<?php
						while($result=mysqli_fetch_assoc($QueryResult))
						{
							?>
							
									
										<tr>
											<td><?php echo $result['License_Number'];?></td>
											<td><?php echo $result['Challan_Number'];?></td>
											<td><?php echo $result['Challan_Date'];?></td>
											<td><?php echo $result['Fine_Reason'];?></td>
											<td><?php echo $result['Challan_Area'];?></td>
											<td><?php echo $result['Fine_Amount'];?></td>
											<td><?php echo $result['Case_Status'];?></td>
										</tr>
								

						<?php
						}
						?> 
							
						
					</table>		
						<?php	
					
				}
				else
				{
					echo "Connot retrive table."."<br>";
				}

	}


	function getFine()
	{
		include 'conn.php';
		$queryRetrive="select * from tblFine order by Challan_Number desc";
				if($QueryResult=mysqli_query($conn,$queryRetrive))
				{
					?>

					<table class="table" border="1">
										<tr>
										<th> License Number </th>
										<th> Challan Number</th>
										<th> Challan Date </th>
										<th> Fine Reason </th>
										<th> Challan Area </th>
										</tr>
					
										<?php
						while($result=mysqli_fetch_assoc($QueryResult))
						{
							?>
							
									
										<tr>
											<td><?php echo $result['License_Number'];?></td>
											<td><?php echo $result['Challan_Number'];?></td>
											<td><?php echo $result['Challan_Date'];?></td>
											<td><?php echo $result['Fine_Reason'];?></td>
											<td><?php echo $result['Challan_Area'];?></td>
										</tr>
								

						<?php
						}
						?> 
							
						
					</table>		
						<?php	
					
				}
				else
				{
					echo "Connot retrive table."."<br>";
				}

	}

	function getTempSrNo()
	{

			include "conn.php";
			 $QueryRetrive = "SELECT Sr_No FROM tblTemperary order by Sr_No desc";
			 if($QueryResult=mysqli_query($conn,$QueryRetrive))
				 {
					 while ($result = mysqli_fetch_array($QueryResult))
 							{
 								echo "<option value= '".$result['Sr_No']."' >" . $result['Sr_No'] . "</option>";
 							}
								
				 }
				 else
				 {
						echo mysqli_error($conn);
				 }
				 mysqli_close($conn);
								
	}

	function viewTemperary()
	{
		include 'conn.php';
		$queryRetrive="select * from tblTemperary order by Sr_No desc";
				if($QueryResult=mysqli_query($conn,$queryRetrive))
				{
					?>
					<table class="table" border="1">
										<tr>
										<th> Sr_No </th>
										<th> Name</th>
										<th> Case_Status </th>
										<th> Vehicle_Number </th>
										<th> Challan_Date </th>
										<th> Fine_Reason</th>
										<th> Fine Amount </th>
										<th> Mobile No. </th>
										<th> Address </th>

									
										</tr>
					
										<?php
						while($result=mysqli_fetch_assoc($QueryResult))
						{
							?>
							
										<tr>
											<td><?php echo $result['Sr_No'];?></td>
											<td><?php echo $result['Name'];?></td>
											<td><?php echo $result['Case_Status'];?></td>
											<td><?php echo $result['Vehicle_Number'];?></td>
											<td><?php echo $result['Challan_Date'];?></td>
											<td><?php echo $result['Fine_Reason'];?></td>
											<td><?php echo $result['Fine_Amount'];?></td>
											<td><?php echo $result['Mobile'];?></td>
											<td><?php echo $result['Address'];?></td>
										</tr>
									<?php
						}
						?> 
							
						
					</table>		
						<?php	
					
				}
				else
				{
					echo "Connot retrive table."."<br>";
				}

	}

	function getTemperary()
	{
		include 'conn.php';
		$queryRetrive="select Sr_No,Name,Case_Status,Vehicle_Number from tblTemperary order by Sr_No desc";
				if($QueryResult=mysqli_query($conn,$queryRetrive))
				{
					?>
					<table class="table" border="1">
										<tr>
										<th> Sr_No </th>
										<th> Name</th>
										<th> Case_Status </th>
										<th> Vehicle_Number </th>
									
										</tr>
					
										<?php
						while($result=mysqli_fetch_assoc($QueryResult))
						{
							?>
							
										<tr>
											<td><?php echo $result['Sr_No'];?></td>
											<td><?php echo $result['Name'];?></td>
											<td><?php echo $result['Case_Status'];?></td>
											<td><?php echo $result['Vehicle_Number'];?></td>
										</tr>
									<?php
						}
						?> 
							
						
					</table>		
						<?php	
					
				}
				else
				{
					echo "Connot retrive table."."<br>";
				}

	}

	function getSr_No()
	{

			include "conn.php";
			 $QueryRetrive = "SELECT SR_No FROM tblTemperary order by Sr_No desc";
			 if($QueryResult=mysqli_query($conn,$QueryRetrive))
				 {
					 while ($result = mysqli_fetch_array($QueryResult))
 							{
 								echo "<option value= '".$result['SR_No']."' >" . $result['SR_No'] ."</option>";
 							}
								
				 }
				 else
				 {
						echo mysqli_error($conn);
				 }
				 mysqli_close($conn);
								
	}


function viewSearchByDateFine($d1,$d2)
	{
		include 'conn.php';
		$queryRetrive="SELECT * FROM `tblfine` WHERE `Challan_Date` BETWEEN '$d1' AND '$d2' AND `Case_Status` = 'Pending' ";
				if($QueryResult=mysqli_query($conn,$queryRetrive))
				{
					?>

					<table class="table">
										<tr>
										<th> License Number </th>
										<th> Challan Number</th>
										<th> Challan Date </th>
										<th> Fine Reason </th>
										<th> Challan Area </th>
										<th> Fine Amount</th>
										<th> Case Status </th>
										</tr>
					
										<?php
						while($result=mysqli_fetch_assoc($QueryResult))
						{
							?>
							
									
										<tr>
											<td><?php echo $result['License_Number'];?></td>
											<td><?php echo $result['Challan_Number'];?></td>
											<td><?php echo $result['Challan_Date'];?></td>
											<td><?php echo $result['Fine_Reason'];?></td>
											<td><?php echo $result['Challan_Area'];?></td>
											<td><?php echo $result['Fine_Amount'];?></td>
											<td><?php echo $result['Case_Status'];?></td>
										</tr>
								

						<?php
						}
						?> 
							
						
					</table>
						<br/>
						<?php	
					
				}
				else
				{
					echo "No data Found"."<br>";
				}

	}

	function viewSearchByDateTemperary($d1,$d2)
	{
		include 'conn.php';
		$queryRetrive="SELECT * FROM `tblTemperary` WHERE `Challan_Date` BETWEEN '$d1' AND '$d2' AND `Case_Status` = 'Pending'";
				if($QueryResult=mysqli_query($conn,$queryRetrive))
				{
					?>
					<table class="table" border="1">
										<tr>
										<th> Sr_No </th>
										<th> Name</th>
										<th> Case_Status </th>
										<th> Vehicle_Number </th>
										<th> Challan_Date </th>
										<th> Fine_Reason</th>
										<th> Fine Amount </th>
										<th> Mobile No. </th>
										<th> Address </th>

									
										</tr>
					
										<?php
						while($result=mysqli_fetch_assoc($QueryResult))
						{
							?>
							
										<tr>
											<td><?php echo $result['Sr_No'];?></td>
											<td><?php echo $result['Name'];?></td>
											<td><?php echo $result['Case_Status'];?></td>
											<td><?php echo $result['Vehicle_Number'];?></td>
											<td><?php echo $result['Challan_Date'];?></td>
											<td><?php echo $result['Fine_Reason'];?></td>
											<td><?php echo $result['Fine_Amount'];?></td>
											<td><?php echo $result['Mobile'];?></td>
											<td><?php echo $result['Address'];?></td>
										</tr>
									<?php
						}
						?> 
							
						
					</table>		
					</br>
						<?php	
					
				}
				else
				{
					echo "Connot retrive table."."<br>";
				}

	}

?>