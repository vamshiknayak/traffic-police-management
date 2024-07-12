<?php
session_start();
session_destroy();
session_start();
if($_SESSION['uid'] == "")
{
	header("Location:Login.php");
}
?>