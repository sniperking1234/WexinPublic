<?php  
    include_once '../BLL/userBll.php';
    include_once '../validate.php';
    if(isset($_POST["Submit"]) && $_POST["Submit"] == "认证")  
    {  
        $idNum = $_POST["idnum"];  
        $authority=1;
         session_start();
         $user=$_SESSION['user'];  
        if($idNum == "" || $user == "")  
        {  
            echo "<script>alert('请检查输入的信息!'); history.go(-1);</script>";  
        }  
        else  
        {  
            if(id_validate($idNum))
            {
                    if(Identify($user, $idNum, $authority))  
                    {  
                       // session_start();
                       // $_SESSION["user"]=$user;
                        echo "<script>alert('Success,go to the index!');window.location.href = '../UIL/index.php?identify=1';</script>"; 
                       // echo "<a href=''>返回</a>";
                    }  
                    else  
                    {  
                        echo "<script>alert('System Busy'); history.go(-1);</script>";  
                    }   
            }
            else 
            {
                echo "<script>alert('id 必须为 18或15位数字!'); history.go(-1);</script>";
            }

        }  
    }  
    else  
    {  
        echo "<script>alert('push unsuccess'); history.go(-1);</script>";  
    }  
?> 