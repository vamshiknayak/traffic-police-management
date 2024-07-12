<?php
	include 'header.php';
?>
<html>
	<head>
		<STyle>
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
		</STyle>
		<body>
			<div id="loginregister">
			<div id="divlogin">
			<h1>Contact</h1>
			<p>
			</p>
			<form action="contact.php" method="post" class="message">
				
				Name:<input type="text" name="Name" value="" onFocus="this.select();" onMouseOut="javascript:return false;"/>
				email:<input type="text" name="Email" value="" onFocus="this.select();" onMouseOut="javascript:return false;"/>
				subject:<input type="text" name="Subject" value="" onFocus="this.select();" onMouseOut="javascript:return false;"/>
				
				<input type="submit" class="button" value="Send"/>
			</form>
		<div class="section contact">
			<p>
				For Inquiries Please Call: <span>+91 8762616744</span>
			</p>
			<p>
				Or you can visit us at: <span>ckmpolice<br>AIT COLLEGE ,577102</span>
			</p>
		</div>
		</div>
	</div>
	</body>
	</head>
	<?php
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  $name = $_POST["Name"];
  $email = $_POST["Email"];
  $subject= $_POST["Subject"];
  
//   $password = password_hash($_POST["txtPassword"], PASSWORD_BCRYPT); 
        $insertQuery = "INSERT INTO `cust_info`  VALUES ('$name','$email','$subject')";
        
        if ($conn->query($insertQuery) == TRUE) {
            echo "submitted";
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
	</html>
<?php
	include 'footer.php';
?>