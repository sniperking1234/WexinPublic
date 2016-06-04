
<!DOCTYPE html>
<html>
<head>
<title>首页</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<style media="all" type="text/css">
@import "../css/all.css";
</style>
</head>
<body>
	<div id="main">
		<div id="header">
			<ul id="top-navigation">
				<li class="active"><span><span><strong class="h">首页</strong></span></span></li>
				<li><span><span><a href="#"><strong class="h">性格测试</strong></a></span></span></li>
				<li><span><span><a href="#"><strong class="h">情感测试</strong></a></span></span></li>
				<li><span><span><a href="#"><strong class="h">职场测试</strong></a></span></span></li>
				<li><span><span><a href="#"><strong class="h">趣味测试</strong></a></span></span></li>
				<li><span><span><a href="#"><strong class="h">专家咨询</strong></a></span></span></li>
			</ul>
			<span><span><a href="../UIL/login.php"><strong class="h">退出登录</strong></a></span></span>
		</div>
		<div id="middle">
		<div id="left-column">
			
		</div>
			<div id="center-column">
				<div class="top-bar">
					<a href="#" class="button">ADD NEW </a>
					<h1>板块</h1>
					<div class="breadcrumbs">
						<a href="#">主页</a> / <a href="#">板块</a>
					</div>
				</div>
				<br />
				<div class="select-bar">
					<label> <input type="text" name="textfield" />
					</label> <label> <input type="submit" name="Submit" value="搜索" />
					</label>
				</div>
				<br />
				<div class="table">
					<h3>欢迎!
<?php
session_start();
$user = $_SESSION['user'];
echo $user;
?></h3>
<?php
$identify = $_GET['identify'];
if ($identify != 1) {
    echo "<a href='../UIL/identify.php'>你还没有身份认证，请认证！</a>";
}
?>
<br> <a href='../UIL/userInfoModify.php?sid=0'>修改个人信息</a> <br>

				</div>
				<br />

			</div>
					<div id="right-column">
			
	  </div>
		</div>
	<div id="footer"></div>		
	</div>



</body>
</html>