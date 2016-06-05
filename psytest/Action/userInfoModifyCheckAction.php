<?php
include_once '../BLL/userBll.php';
include_once '../validate.php';
if (isset($_POST["Submit"]) && $_POST["Submit"] == "修改") {
    session_start();
    $user = $_SESSION['user'];
    $sid = $_SESSION['sid'];
    $realname = $_POST["realname"];
    $psw = $_POST["password"];
    $psw_confirm = $_POST["confirm"];
   
    if ($sid == 0) {
        if ($psw == "" || $psw_confirm == "") {
            echo "<script>alert('请检查输入的信息!'); history.go(-1);</script>";
        } else {
            if (pass_validate($psw) && pass_validate($psw_confirm)) {
                if ($psw == $psw_confirm) {
                    $result = FindbyUserId($user);
                    $identify = $result[0][4];
                    
                    if ($realname == "") {
                        
                        if (ModifyPassword($user, $psw)) {
                            if ($identify == '') {
                                echo "<script>alert('Success,go to the index!');window.location.href = 'http://2.whoisyourdaddy.sinaapp.com/index.php?s=/addon/WeiSite/WeiSite/index/publicid/154.html';</script>";
                            } else
                                echo "<script>alert('Success,go to the index!');window.location.href = 'http://2.whoisyourdaddy.sinaapp.com/index.php?s=/addon/WeiSite/WeiSite/index/publicid/154.html';</script>";
                            // echo "<a href=''>返回</a>";
                        } else {
                            echo "<script>alert('System Busy'); history.go(-1);</script>";
                        }
                    } else {
                        
                        if (ModifyUserName($user, $realname, $psw)) {
                            if ($identify == '') {
                                echo "<script>alert('Success,go to the index!');window.location.href = 'http://2.whoisyourdaddy.sinaapp.com/index.php?s=/addon/WeiSite/WeiSite/index/publicid/154.html';</script>";
                            } else
                                echo "<script>alert('Success,go to the index!');window.location.href = 'http://2.whoisyourdaddy.sinaapp.com/index.php?s=/addon/WeiSite/WeiSite/index/publicid/154.html';</script>";
                            // echo "<a href=''>返回</a>";
                        } else {
                            echo "<script>alert('System Busy'); history.go(-1);</script>";
                        }
                    }
                } else {
                    echo "<script>alert('Different password'); history.go(-1);</script>";
                }
            } else {
                echo "<script>alert('password must be 6~20 bytes!'); history.go(-1);</script>";
            }
        }
    } else {
        if ($psw == "" || $psw_confirm == "" || $realname == "") {
            echo "<script>alert('please check the information!'); history.go(-1);</script>";
        } else {
            if (pass_validate($psw) && pass_validate($psw_confirm)) {
                if ($psw == $psw_confirm) {
                    
                    if (IsUserExists($realname)) {
                        
                        if (ModifyPassword($realname, $psw)) {
                            session_start();
                            $_SESSION['user'] = $realname;
                            $result = FindbyUserId($realname);
                            $identify = $result[0][4];
                            if ($identify == '') {
                                echo "<script>alert('Success,go to the index!');window.location.href = 'http://2.whoisyourdaddy.sinaapp.com/index.php?s=/addon/WeiSite/WeiSite/index/publicid/154.html';</script>";
                            } else
                                echo "<script>alert('Success,go to the index!');window.location.href = 'http://2.whoisyourdaddy.sinaapp.com/index.php?s=/addon/WeiSite/WeiSite/index/publicid/154.html';</script>";
                            // echo "<a href=''>返回</a>";
                        } else {
                            echo "<script>alert('System Busy'); history.go(-1);</script>";
                        }
                    } else {
                        echo "<script>alert('该用户不存在！'); history.go(-1);</script>";
                    }
                } else {
                    echo "<script>alert('两次输入的密码不同！'); history.go(-1);</script>";
                }
            } else {
                echo "<script>alert('密码必须为6~20位!'); history.go(-1);</script>";
            }
        }
    }
} else {
    echo "<script>alert('push unsuccess'); history.go(-1);</script>";
}
?> 