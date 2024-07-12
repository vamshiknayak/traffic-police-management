<?php
// include "Adminheader.php";
?>
<?php
    session_start();
    // require 'Adminheader.php';
    if(!isset($_SESSION["uid"])) 
    {
        header("Location:Login.php");
    }
    // else{
    //     exit();
    // }
?>

<?php

    
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
                echo "Data Deleted Successfully. ",mysqli_error($conn)."<br>";
                
            }
            else
            {
                echo "Data cannot be  deleted. ",(mysqli_error($conn)."<br>");
            }
            mysqli_close($conn);	
        }

    }
    
    
?>
<!DOCTYPE html>
    <head>
         <title> View License </title>
        <link rel="stylesheet" type="text/css" href="AptiStyle.css">
        <?php
include 'Adminheader.php';
?>
        <style>
        
    .licenseContents
        {
        width:900px;
        margin-left:250px;
        padding:10px;
        }
        </style>
        <!--<link rel="stylesheet" type="text/css" href="boot.css">-->
    </head>

    <body>

        <div class="licenseContents" >
            <!-- <div align="center"><h2 ><u>View License</u></h2></div> -->
            <br>
                <?php
                    include 'class.php';
                    viewLicense();
                    ?>
                </div>
    </body>
    
</html>
<?php
    include 'footer.php';
?>