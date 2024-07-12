<?php
    // include 'Adminheader.php';
     session_start();
     if(!isset($_SESSION["uid"])) 
     	{
    		header("Location:Login.php");
     	}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    <?php
include 'Adminheader.php';
?>
<div id="contents">
<?php
    
    // if($_SESSION['uid'] == "")
    // 	{
    // 		header("Location:Login.php");
    // 	}
    if(isset($_POST['Submit']))
    {
        $License_Number=$_POST['License_Number'];
        $Name=$_POST['Name'];
        $Mobile=$_POST['Mobile'];
        $Address=$_POST['Address'];
        if(empty($License_Number)||empty($Name)||empty($Mobile)||empty($Address))
        {
            echo"Enter all the values."."<br>";
        }
        else
        {
            include 'conn.php';
            $query = "Insert into `tbllicense` (License_Number,Name,Mobile,Address) values('$License_Number','$Name','$Mobile','$Address')";
            
            if(mysqli_query($conn,$query))
            {
                echo "Data inserted Successfully. ",mysqli_error($conn)."<br>";
                $LastValue=mysqli_insert_Id($conn);
                $queryRetrive="select * from tblLicense where SR_No=$LastValue";
                if($QueryResult=mysqli_query($conn,$queryRetrive))
                {
                    
                        while($result=mysqli_fetch_assoc($QueryResult))
                        {
                            ?>
                            <html>
                                <head><link rel="stylesheet" href="css/table.css"></head>
                                <body>
                                    <table style="border: dotted;">
                                        <tr>
                                        <td> Sr_No </td>
                                        <td> License_Number</td>
                                        <td> Name </td>
                                        <td> Number </td>
                                        <td> Address </td>
                                        </tr>

                                        <tr align="center">
                                            <td><?php echo $result['Sr_No'];?></td>
                                            <td><?php echo $result['License_Number'];?></td>
                                            <td><?php echo $result['Name'];?></td>
                                            <td><?php echo $result['Mobile'];?></td>
                                            <td><?php echo $result['Address'];?></td>
                                        </tr>
                                    </table>
                                </body>
                            </html>
                            <?php
                            echo "</br>";
                        }
                    
                }
                else
                {
                    echo "Connot retrive last generted row."."<br>";
                }
                
            }
            else
            {
                echo "Data connot be  inserted. ",(mysqli_error($conn)."<br>");
            }
            mysqli_close($conn);	
        }

    }
    
    
?>

</div>
</body>
</html>

<!DOCTYPE html>
<html>
    <head>
            <title> Add License </title>
            <link rel="stylesheet" type="text/css" href="AptiStyle.css">
            <style>
                table, th, td 
                {
                    border-radius: 10px;
                    padding: 5px;
                    align-items:center;
                }
                #contents {
                    width: 900px;
                    margin-left: 250px;
                    padding: 10px;
                }
                .textbox
                {
                    width:200px;
                    margin-left:0px;
                    height:20px;
                    border-radius:7px;
                    padding: 12px 20px;
                }
                .button
                {
                    width:250px;
                    margin-top:10px;
                    font-size:bold;
                    margin-left:175px;
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
                        <td>:<input type="text" class="textbox" name="License_Number" value="<?php if(isset($License_Number)) {echo  																						$License_Number;} ?>" required=""> </td>
                        </tr>

                        <tr> 
                        <td> Enter Name</td>
                        <td>:<input type="text" class="textbox" name="Name" required="" value="<?php if(isset($Name)) {echo $Name;} ?>"> </td>
                        </tr>

                        <tr>
                        <td>Enter Mobile Number </td>
                        <td>:<input type="text" class="textbox" pattern=".{10,10}" required title="invalid mobile number" name="Mobile" value="<?php if(isset($Mobile)) {echo $Mobile;} ?>" required="" pattern="[0-9]{0,10}"> </td>
                         </tr>

                         <tr> 
                         <td>Enter Address</td>
                        <td>:<textarea style="width:200px" name="Address" required> <?php if(isset($Address)) {echo $Address;} ?></textarea> </td>
                        </tr>

                         <tr>
                        <td colspan="4" > <input type="Submit" name="Submit" class="button" value="Insert"></td>
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
