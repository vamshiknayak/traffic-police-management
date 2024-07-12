<?php
    // include 'Adminheader.php';
    session_start();
    if($_SESSION['uid'] == "")
        {
            header("Location:Login.php");
        }
?>

<?php

    if($_SESSION['uid'] == "")
        {
            header("Location:Login.php");
        }
    
    if(isset($_POST['Delete']))
    {
        $Challan_Number=$_POST['Challan_Number'];
        if(empty($Challan_Number))
        {
            echo"Select Challan Number."."<br>";
        }
        else
        {
            include 'conn.php';
            $query =  "Delete from tblfine where Challan_Number='$Challan_Number'";
            // echo $License_Number;
            if(mysqli_query($conn,$query))
            {
                echo "<font style=\"margin-left:650px;color:green;\">Data Deleted Successfully.</font> ",mysqli_error($conn)."<br>";
                
            }
            else
            {
                echo "<font style=\"margin-left:650px;color:red;\">Data cannot be  deleted.</font> ",(mysqli_error($conn)."<br>");
            }
            mysqli_close($conn);	
        }

    }
    
    
?>
<!DOCTYPE>
<html>
    <head>
         <title> Delete Fine </title>
        <link rel="stylesheet" type="text/css" href="AptiStyle.css">
        <style>
        
    .contents
        {
        width:900px;
        margin-left:250px;
        padding:10px;
        }
        .button
        {
            margin-left:10px;
            width:80px;
        }
        </style>
        <!--<link rel="stylesheet" type="text/css" href="boot.css">-->
        
    </head>

    <body>
    <?php
    include 'Adminheader.php';
    ?>
        <div class="contents" >
            
                
                <form id="contents" method="Post" action="DeleteFine.php" align="center">
                <select class="dropbtn" name="Challan_Number" >
                <option class="dropdown-content"  value="" >--Select Challan Number-- </option>

                    <?php
                    include 'class.php';
                    getChallanNumber();
                    ?>
                    <input type="Submit" value="Delete" class="button" name="Delete"><br/><br/>
                    <?php
                    getFine();
                    ?>
</form>
</div>
    </body>
    
</html>
<?php
    include 'footer.php';
?>