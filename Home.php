<?php
include 'Adminheader.php';
?>

<?php

    if(isset($_SESSION['uid']) && $_SESSION['uid'] == "")
        {
            header("Location:Login.php");
        }
?>
<!DOCTYPE html>
<html>
<head>

    <style type="text/css">
    .mar
    {
        margin-left: 170px;
    margin-right: 40px;
    }
    #contents
        {
            width:900px;
            margin-left:250px;
            padding:10px;
        }	
    </style>
</head>
<body>
<div class="mar">
    <hr>
    <marquee>Welcome To Chikkamagalure Traffic Police !!! <i>Follow The Traffic Rules, Stay Safe</i> </marquee>
    <hr>
</div>


<div id="contents">
    <img src="1.jpg" width="950px">
</div>

</body>
</html>
<?php
include 'footer.php';
?>