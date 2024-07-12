<html>
<head>
<script src="JQuery Libraries/jquery.mobile-1.4.5.min.js"></script>
<script src="JQuery Libraries/jquery-1.11.3.min.js"></script>
<script>
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
});
</script>
</head>
<body>
<div align="center" id="flip" style="margin-left:150px;width:1100px;background-color:#28B291;padding:10px;color:white;font-weight:bold;font-size:20px;">SAFE DISCIPLINED JOURNEY….LIFE IS PRECIOUS</div>
<div id="panel" style="margin-left:150px;width:1100px;display:none;background-color:#66DFC2;padding:10px;color:white;font-weight:bold;">

</div>
</body>
</html>