<?php
session_start();
if(isset($_SESSION['uid']) && !$_SESSION['uid'] == "")
		{
			header("Location:Home.php");
		}
?>
<html>
<title>Login</title>
<head>
<link rel="stylesheet" type="text/css" href="AptiStyle.css">
<style type="text/css">
#divLoginRegister
{
	background-image:url('img1.jpg');
	width:1100px;
	margin-left:150px;
	padding:10px;
}
.button:hover
{
background-color:#F26D2B;
transform:scale(1.3,1.3);
box-shadow: 0 5px 15px rgba(255, 255, 255, .4);	

}
#divLogin{
	margin-left:300px;
}
a{
	text-decoration:none;
	color:white;
	font-weight:bold;
}
a : hover
{
	background-color:white;	
}
</style>
</head>
<body>
<form method="post">
<?php
include("Header.php");
?>
<div id="divLoginRegister">
<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div id="divLogin">
<br/><br/>
<input type="text" class="textbox" name="AdminID" placeholder="Email Address" value="<?php if(isset($_REQUEST['AdminID'])){ echo $_REQUEST['AdminID'];} ?>"></input><br/><br/>
<input type="password" class="textbox" name="txtPassword" placeholder="Password" value="<?php if(isset($_REQUEST['txtPassword'])){ echo $_REQUEST['txtPassword'];} ?>"></input><br/><br/>
<input type="submit" class="button" name="btnLogin" value="Login"></input><br/><br/>
<?php
if(isset($_REQUEST['btnLogin']))
{
	$AdminID=$_REQUEST['AdminID'];
	$password=$_REQUEST['txtPassword'];
	if($AdminID=="" || $password=="")
	{
		echo "<font color='red' style=\"margin-left:160px\">Invalid Credentials</font>";
	}
	else
	{
			$sqlQuery="select Password,AdminID from tblAdminLogin where AdminID='$AdminID'";
			include 'conn.php';
			$execute=mysqli_query($conn,$sqlQuery);
			if($execute)
			{				
				$count=mysqli_num_rows($execute);
				if($count!=1)
				{
					echo "<font color='red' style=\"margin-left:160px\">Invalid Credentials</font>";
				}
				else
				{
					//$value = mysqli_fetch_object($execute);
					while($result=mysqli_fetch_assoc($execute))
					{
					$passwd = $result['Password'];
					$uid = $result['AdminID'];
					}
					$_SESSION['uid']=$uid;
					
						if($passwd==$_REQUEST['txtPassword'])
						{
							header("Location:Home.php");
							exit();
						}
						else
						{
							echo "<font color='red' style=\"margin-left:160px\">Invalid Password</font>";
						}
				}
					
				
			}
	}
}
?>
</div>
<br/><br/><br/><br/>
</div>
<br/>
<?php
include("Footer.php");
?>
</form>
</body>
</html>