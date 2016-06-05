   <!-- <form action="../Action/regCheckAction.php" method="post">  
        username:<input type="text" name="username"/>  
        <br/>  
        password:<input type="password" name="password"/>  
        <br/>  
        repeat password<input type="password" name="confirm"/>  
        <br/>  
        <input type="Submit" name="Submit" value="Register"/>  
    </form>  -->
    <!DOCTYPE HTML>
<html>
<head>
<title>心理测评系统</title>
<!-- Custom Theme files -->
<link href="../CSS/style1.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
</head>
<body>
<h1>心理测评系统</h1>
<div class="singup">
		<h3>注册</h3>
	<div class="signup-main">
	 <form action="../Action/regCheckAction.php" method="post">  
		<input type="text" name="username"  placeholder="请输入用户名"/>
		<input type="password" name="password"  placeholder="请输入密码"/>
		<input type="password" name="confirm" placeholder="请确认密码"/>
	  <div class="send-button">
	    <input type="Submit" name="Submit" value="注册"/>  
	  </div>
	    <p>你是否已注册?  <a href="../UIL/login.php">请登录</a></p>
	  </form>
	</div>
</div>	
<div class="copyright">
</div>
<!--sign up form end here-->
</body>
</html>