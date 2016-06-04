<!--<h1>Welcom!
<?php 
     session_start();
     $user=$_SESSION['user']; 
     echo $user;
?></h1>
    <form action="../Action/identifyCheckAction.php" method="post">  
        ID:<input type="text" name="idnum"/>  
        <br/>  
        <input type="Submit" name="Submit" value="Identify"/>  
    </form>  -->
     <!DOCTYPE HTML>
<html>
<head>
<title>实名认证 </title>
<!-- Custom Theme files -->
<link href="../css/style1.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
</head>
<body>
<h1>实名认证</h1>
<div class="singup">
		<h3>认证</h3>
	<div class="signup-main">
	 <form action="../Action/identifyCheckAction.php" method="post">   
		<input type="text" name="idnum"  placeholder="ID"/>
		
	  <div class="send-button">
	    <input type="Submit" name="Submit" value="认证"/>  
	  </div>
	   <a href="#" onClick="javascript:history.go(-1);">返回 !</a>
	  </form>
	</div>
</div>	
<div class="copyright">
</div>
<!--sign up form end here-->
</body>
</html>