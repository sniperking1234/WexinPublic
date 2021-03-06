<?php
//验证用户是否存在
function IsUserExists($userID)
{
    include_once '../DAL/userDal.php';
    if(isset($userID) && !$userID=='')
    {
        $userlist = findUsersByID($userID);
    }

    $result = count($userlist);
    if($result > 0)
    {
        return true;
    }
    return false;
}
//登录验证用户名和密码
function CheckUser($userID, $userPwd)
{
    include_once '../DAL/userDal.php';
   
        $userlist = findUsersByNamePwd($userID, $userPwd);
   
    
    $result = count($userlist);
    if($result > 0)
    {
        return true;
    }
    return false;
}
//用户注册
function Insert($userPwd, $account, $userName, $idNum, $authority)
{
    include_once '../DAL/userDal.php';
    $result = InsertUser($userPwd, $account, $userName, $idNum, $authority);
    if($result > 0)
    {
        return true;
    }
    return false;
}
//修改密码
function ModifyPassword($userID, $password)
{
    include_once '../DAL/userDal.php';
    if(isset($userID) && !$userID=='')
    {
        $result = UpdatePassword($userID, $password);
    }

  //  $= count($userlist);
    if($result > 0)
    {
        return true;
    }
    return false;
}
//修改用户名和密码
function ModifyUserName($userID, $userName,$password)
{
    include_once '../DAL/userDal.php';
    if(isset($userID) && !$userID=='')
    {
        $result = UpdateUserName($userID, $userName,$password);
    }

    //  $= count($userlist);
    if($result > 0)
    {
        return true;
    }
    return false;
}
//实名认证并修改权限
function Identify($userID, $idNum, $authority)
{
    include_once '../DAL/userDal.php';
    if(isset($userID) && !$userID=='')
    {
        $result = UpdateID($userID, $idNum, $authority);
    }
    if($result > 0)
    {
        return true;
    }
    return false;
}
//按账号查找用户
function FindbyUserId($userID)
{
    include_once '../DAL/userDal.php';
    if(isset($userID) && !$userID=='')
    {
        $userlist= findUsersByID($userID);
    }

    return $userlist;
}
//按用户名查找用户
function FindbyUserName($userName)
{
    include_once '../DAL/userDal.php';
    if(isset($userName) && !$userName=='')
    {
         $userlist= findUsersByName($userName);
    }

    return $userlist;
}
//按账号删除用户
function DeletebyUid($userID)
{
    include_once '../DAL/userDal.php';
    if(isset($userID) && !$userID=='')
    {
        $result = DeleteUser($userID);
    }
    if($result > 0)
    {
        return true;
    }
    return false;
}
?>