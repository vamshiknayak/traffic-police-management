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
    width:900px;
    margin-left:250px;
    padding:10px;
}
.button:hover
{
background-color:#F26D2B;
transform:scale(1.3,1.3);
box-shadow: 0 5px 15px rgba(255, 255, 255, .4);	

}
#divLogin{
    margin-left:350px;
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
#button1{
    padding-left: 70px;
    text-align: "center";
    padding-right: 61px;

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
<input type="text" class="textbox" name="AdminID" required placeholder="User ID" value="<?php if(isset($_REQUEST['AdminID'])){ echo $_REQUEST['AdminID'];} ?>"></input><br/><br/>
<input type="password" class="textbox" name="txtPassword" required placeholder="Password" value="<?php if(isset($_REQUEST['txtPassword'])){ echo $_REQUEST['txtPassword'];} ?>"></input><br/><br/>
<input type="submit" class="button" name="btnLogin" value="Login"></input><br/><br/>
<a class="button" id="button1" href="register.php" placeholder="register">Register</a>
<br/><br/>
</div>
</div>

            
<?php
$login=false;
$showerror=false;

 include("conn.php");
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
      $AdminID=$_REQUEST['AdminID'];
      $password=$_REQUEST['txtPassword'];
      $sqlQuery="select * from `tblAdminLogin` where AdminID='$AdminID'";
      $result = $conn->query($sqlQuery);
         if($result->num_rows > 0)
                {
                  $row = $result->fetch_assoc();
                      // $passwd = $result['Password'];
                      // $uid = $result['AdminID'];
                    if($password==$row["Password"])
                          {
                                $_SESSION['uid']=$AdminID;
                                $login=true;
                                header("Location:Home.php");
                                 exit();
                           }
                          else
                           {
                            $showerror = "Invalid password";;
                           }
                          } else {
                            $showerror = "User not found";
                        }
                   
               $conn->close();                                    
                  }       
                  if($login)
                    {
                     echo '
                     <div  role="alert">
                     <strong>Success!</strong> you are logged in
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>';
                   }
                  
                   if($showerror)
                     {
                     echo '
                     <div role="alert">
                     <strong>Error!</strong> '.$showerror. '
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
                   </div>';
                   }
?>
<?php
include("Footer.php");
?>
</form>
</body>
</html>