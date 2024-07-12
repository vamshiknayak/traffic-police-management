<?php
    // include 'Adminheader.php';
    session_start();
    // include 'Adminheader.php';
      // require 'Adminheader.php';
    if(!isset($_SESSION["uid"])) 
        {
            header("Location:Login.php");
        }
?>

<?php


 if(isset($_REQUEST['LN'])) {
     $License_Number_Update=$_REQUEST['LN'];
 }
 
if(isset($_POST['GetValues']))	//search button
    {
        if(empty($License_Number_Update))
        {
            echo "Select License Number.";
        }
        else
        {
            include 'conn.php';
            $query="Select License_Number,Name,Mobile,Address from `tbllicense` where License_Number='$License_Number_Update'";
            if($QueryRetrive=mysqli_query($conn,$query))
            {
                while($result=mysqli_fetch_assoc($QueryRetrive))
                {
                    $License_Number=$result['License_Number'];
                    $Name=$result['Name'];
                    $Mobile=$result['Mobile'];
                    $Address=$result['Address'];
                }
            }
            else
            {
                echo mysqli_error($conn);
            }
        }
        
    }

    if(isset($_POST['Submit'])) //update button
    {
    //	ini_set("display_errors", 0); //supress errors
        $LN=$_REQUEST['License_Number'];
        $Name=$_POST['Name'];
        $Mobile=$_POST['Mobile'];
        $Address=$_POST['Address'];

        if(empty($LN)||empty($Name)||empty($Mobile)||empty($Address))
        {
            echo "<font style=\"margin-left:650px;color:red\">Enter all the values.</font><br>";
        }
        else
        {
            include 'conn.php';
    $query_update="Update tblLicense set License_Number='$LN',Name='$Name', Mobile='$Mobile', Address='$Address' where 
                    License_Number='$LN'";
            if(mysqli_query($conn,$query_update))
            {
                echo "<font style=\"margin-left:650px;color:green\">Data Updated Successfully.</font> </br>";
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
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="AptiStyle.css">
            <title> Update License </title>
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
                    margin-left:2 50px;
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
    <?php
include 'Adminheader.php';
?>
        <div id="contents">
            <div class="UpdateLicense">
                <form method="Post" action="UpdateLicense.php">
                    <table>
                        <tr> 
                            <td>Select License Number </td>
                            <td>:<select class="dropbtn" name="LN">
                                <option class="dropdown-content" value="">--Select License Number-- </option>
                                <?php
                                    include 'class.php';
                                    getLicenseNumber();
                                ?>
                                </select>
                            </td>
                        </tr>
                        <tr> <td><input type="Submit" name="GetValues" class="button" value="Get Values"></td></tr>
                        
                        <tr> 
                        <td>Enter License Number </td>
                        <td>:<input type="text" class="textbox" name="License_Number" value="<?php if(isset($License_Number)) {echo  																						$License_Number;} ?>"> </td>
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
                        <td>:<textarea  name="Address" style="width:300px"> <?php if(isset($Address)) {echo $Address;} ?></textarea> </td>
                        </tr>

                         <tr>
                        <td colspan="2"> <input type="Submit" name="Submit" class="newButton" value="Update"></td>
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