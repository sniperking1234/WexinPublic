<!-- 
    <form action="../Action/userInfoModifyCheckAction.php" method="post">  
    
        <input type="text" name="realname"/>  
    
        <br/>  
        password:<input type="password" name="password"/>(**)
        <br/>  
        repeat password<input type="password" name="confirm"/>(**) 
        <br/>  
        <input type="Submit" name="Submit" value="Modify"/>  
    </form>  -->
     <!DOCTYPE HTML>
<html>
<head>
<title>心理测评系统 </title>
<!-- Custom Theme files -->
<link href="../CSS/style1.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
</head>
<?php 
  $sid = $_GET['sid'];
  ?>
<body>
<h1>修改</h1>
<div class="singup">
		<h3>修改</h3>
	<div class="signup-main">
	  <form action="../Action/userInfoModifyCheckAction.php" method="post">      
		<input type="text" name="realname"  placeholder="用户名"/>         
		<?php 
              if($sid ==0)
              {
               echo "";
               session_start();
               $_SESSION["sid"]=$sid;
              }
              else 
              {
               echo "(**)";
               session_start();
               $_SESSION["sid"]=$sid;
              }
      ?>
	    <input type="password" name="password"  placeholder="密码"/>(**)
		<input type="password" name="confirm" placeholder="密码确认"/>(**)
		
	  <div class="send-button">
	    <input type="Submit" name="Submit" value="修改"/>  
	  </div>
	    <p>
	    <a href="#" onClick="javascript:history.go(-1);">返回 !</a>
	    </p>
	  </form>
	</div>
</div>	
<div class="copyright">
</div>
<!--sign up form end here-->
</body>
</html>