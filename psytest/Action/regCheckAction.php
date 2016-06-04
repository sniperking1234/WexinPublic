<?php  
    include_once '../BLL/userBll.php';
    include_once '../validate.php';
    if(isset($_POST["Submit"]) && $_POST["Submit"] == "注册")  
    {  
        $user = $_POST["username"];  
        $psw = $_POST["password"];  
        $psw_confirm = $_POST["confirm"];  
        if($user == "" || $psw == "" || $psw_confirm == "")  
        {  
            echo "<script>alert('请检查输入的信息！'); history.go(-1);</script>";  
        }  
        else  
        {  
            if(pass_validate($psw)&&pass_validate($psw_confirm))
            {
            if($psw == $psw_confirm)  
            {  
                if(IsUserExists($user))    //如果已经存在该用户  
                {  
                    echo "<script>alert('该用户已存在'); history.go(-1);</script>";  
                }  
                else    //不存在当前注册用户名称  
                {  
                   $userName=$user;
                   $idNum='';
                   $authority=0;
                   
                    if(Insert($psw, $user, $userName, $idNum, $authority))  
                    {  
                        session_start();
                        $_SESSION["user"]=$user;
                        echo "<script>window.location.href = '../UIL/index.php?identify=0';</script>"; 
                       // echo "<a href=''>返回</a>";
                    }  
                    else  
                    {  
                        echo "<script>alert('System Busy'); history.go(-1);</script>";  
                    }  
                }  
            }  
            else  
            {  
                echo "<script>alert('两次输入的密码不同'); history.go(-1);</script>";  
            } 
            }
            else{
                echo "<script>alert('密码必须为6~20位!'); history.go(-1);</script>";
            }
        }  
    }  
    else  
    {  
        echo "<script>alert('push unsuccess'); history.go(-1);</script>";  
    }  
?> 