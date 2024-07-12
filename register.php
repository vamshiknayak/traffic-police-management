
<html>
<title>register</title>
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
.button{
    align-items:"center";
}
</style>
</head>
<body><?php
include("Header.php");
?>
<form action="register.php" method="post">

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
<input type="text" class="textbox" name="AdminID" required placeholder="User ID"></input><br/><br/>
<input type="password" class="textbox" name="txtPassword" required placeholder="Password" ></input><br/><br/>
<button type="submit" name="register"  class="button">Register</button>
<br/><br/>
</form>
<?php
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  $username = $_POST["AdminID"];
  $password = $_POST["txtPassword"];
//   $password = password_hash($_POST["txtPassword"], PASSWORD_BCRYPT); 
        $insertQuery = "INSERT INTO `tbladminlogin`  VALUES ('$username','$password')";
        
        if ($conn->query($insertQuery) == TRUE) {
            echo "registered";
            header("Location: login.php");
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
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
</body>
</html>
