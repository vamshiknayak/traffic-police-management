<?php
//   include 'Adminheader.php';
  session_start();
  if($_SESSION['uid'] == "")
    {
      header("Location:Login.php");
    }
?>

<?php
	if(isset($_POST['Search']))
	{
		$d1=$_POST['date1'];
		$d2=$_POST['date2'];	
	}

?>
<html>
	<head>
		<title>Seach By Date</title>
		<link rel="stylesheet" type="text/css" href="AptiStyle.css">
			<style>
				.textbox
				{
					margin-left:0px;
					height:35px;
				}
				.newButton
				{
					border-style:none;
					padding:5px;
					background-color:#28B291;
					color:White;
					height:30px;
					width:200px;
					margin-left:130px;
					font-weight:bold;
				}
				.newButton:hover
				{
					background-color:#F26D2B;
					transform:scale(1.3,1.3);
					box-shadow: 0 5px 15px rgba(255, 255, 255, .4);	
				}
				.table
				{
					margin-left:86px;
					width:850px;
				}
			</style>
	</head>

	<body>
	<?php
	 include 'Adminheader.php';
?>
		<form method="Post" action="SearchTemperaryByDate.php">
			<table class="table">
				<tr>
					<td>Select Dates</td>
				</tr>

				<tr>
				<td>From : <input type ="date" class="textbox" name="date1" value="<?php if(isset($d1)){echo $d1;} ?>" required=""> </td>
				<td> To : <input type ="date" class="textbox" name="date2" value="<?php if(isset($d2)){echo $d2;} ?>" required="" ></td>
				<td><input type="Submit" class="newButton" name="Search" value="Search"></td>
				</tr>
		</table>
		</form>
	</body>
</html>

<?php
	if(isset($_POST['Search']))
	{
		$d1=$_POST['date1'];
		$d2=$_POST['date2'];
		 include'class.php';
         viewSearchByDateTemperary($d1,$d2);
	}

?>

<?php
  include 'footer.php';
?>