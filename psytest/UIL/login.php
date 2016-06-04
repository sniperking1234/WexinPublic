<!DOCTYPE html>
<html>
<head>
<title>Login Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="keywords"
	content="Ensaluto Login Form Responsive Templates, Iphone Widget Template, Smartphone login forms,Login form, Widget Template, Responsive Templates, a Ipad 404 Templates, Flat Responsive Templates" />
<link href="../CSS/style.css" rel='stylesheet' type='text/css' />
</head>
<body>
	<h1>心理测评系统 </h1>
	<div class="registration">
		<div class="form-info">
			<form action="../Action/loginCheckAction.php" method="post">
				<h2>登陆</h2>
				<p> 
				 <input class="text" name="username" required type="text" placeholder="请输入用户名"></input>
			</p>
	         <p>     
				<input name="password" class="Password" placeholder="请输入密码" required type="password"></input>
			</p>
				<div class="btn">
					<input type="submit" name="submit" value="登录"></input> 
				</div>
				<div class="roundedOne">
					<input type="checkbox" value="None" id="roundedOne" name="check" />
					<label for="roundedOne"> </label>
					<p>记住我</p>
				</div>
			</form>
			<div class="clear"></div>
		</div>
		<div class="strip">
			<span>OR</span>
		</div>
		<ul class="bottom-sc-icons">
			<li><a href="../UIL/register.php" class="facebook">   注册       </a></li>
			<li><a href="../UIL/userInfoModify.php?sid=1" class="twitter">忘记密码</a></li>
		</ul>
	</div>
	<div class="copy-rights">
		<p>
		</p>
	</div>
</body>
</html>
<!--<form action="../Action/loginCheckAction.php" method="post">
	<p>
		<label for="username">username:</label> <input name="username"
			required type="text" placeholder="please input the username"></input>
	</p>
	<p>
		<label for="password">password:</label> <input name="password"
			required type="password"></input>
	</p>
	<p>
		<input type="submit" name="submit" value="Login"></input> <input
			type="reset" value="reset"> <a href="../UIL/register.php">Register</a>

</form>-->
