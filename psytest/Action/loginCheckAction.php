<?php
    include_once '../BLL/userBll.php';
	if(isset($_POST["submit"]) && $_POST["submit"] == "登录")
	{
		$user = $_POST["username"];
		$psw = $_POST["password"];

		if($user == "" || $psw == "")
		{
			echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";
		}
		else
		{
			if(CheckUser($user, $psw))
			{	
			    $result = FindbyUserId($user);
			    $authority = $result[0][5];
			    $userId = $result[0][0];
			    session_start();
				$_SESSION['userID']=$userId;
				//echo "success!!";
				if($authority==2)
				{
				    echo "<script>window.location.href = '../UIL/ManageIndex.php';</script>";
				}
				else
				{
				    $identify = $result[0][4];
				    if($identify=='')
				    {
				       echo "<script>window.location.href = 'http://2.whoisyourdaddy.sinaapp.com/index.php?s=/addon/WeiSite/WeiSite/index/publicid/154.html';</script>"; 
				    }
				    else
				      echo "<script>window.location.href = 'http://2.whoisyourdaddy.sinaapp.com/index.php?s=/addon/WeiSite/WeiSite/index/publicid/154.html';</script>";
				}
			}
			else
			{
				echo "<script>alert('wrong password!');history.go(-1);</script>";
			}
		}
	}
	else
	{
		echo "<script>alert('unsuccess!'); history.go(-1);</script>";
	}

?>