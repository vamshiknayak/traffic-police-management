<?php
  session_start();
	// rquiere 'Adminheader.php';
	if(!isset($_SESSION["uid"])) 
		{
			header("Location:Login.php");
		}
?>

<?php

  if($_SESSION['uid'] == "")
    {
      header("Location:Login.php");
    }
  
  
?>
<!DOCTYPE html>
  <head>
    <title> View Fine </title>
    <?php
	include 'Adminheader.php';?>
    <style>
    
  .contents
    {
    width:900px;
    margin-left:250px;
    padding:10px;
    }
    
    </style>
    <!--<link rel="stylesheet" type="text/css" href="boot.css">-->
	<link rel="stylesheet" type="text/css" href="AptiStyle.css">
  </head>

  <body>

    <div class="contents" >
      <div align="center">      <h2 ><u>View Fine</u></h2></div>
      <br>
        
        <?php
          include'class.php';
          viewFine();
          ?>

        
    </div>
  </body>
  
</html>




<?php
  include 'footer.php';
?>