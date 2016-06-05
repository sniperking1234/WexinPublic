<?php

// 通过Account查找
function findUsersByID($userName)
{
    // 包含数据库操作文件
    include_once 'sqlQuery.php';
    // 生成sql语句
    $query = "select * from userinfo
     where Account = '$userName'";
    // 返回结果
    return selectQuery($query);
}
// 通过userName查找
function findUsersByName($userName)
{
    // 包含数据库操作文件
    include_once 'sqlQuery.php';
    // 生成sql语句
    $query = "select * from userinfo
    where UserName = '$userName'";
    // 返回结果
    return selectQuery($query);
}
// 通过Account与password查找
function findUsersByNamePwd($userName, $psw)
{
    // 包含数据库操作文件
    include_once 'sqlQuery.php';
    // 生成sql语句
    $query = "select * from userinfo
        where Account = '$userName' and PWD = '$psw'";
    // 返回结果
    return selectQuery($query);
}
// 用户添加 
function InsertUser($userPwd, $account, $userName, $idNum, $authority)
{
    include_once 'sqlQuery.php';
    $query="insert into userinfo (PWD,Account,UserName,IDNumber,Authority) 
    values('$userPwd','$account','$userName','$idNum',$authority) ";
    return commonQuery($query);
}
/* 通过Account 删除一条信息 */
function DeleteUser($userID)
{
    include_once 'sqlQuery.php';
    $query = "delete from userinfo
         where Account = '$userID'";
    return commonQuery($query);
}
// 修改用户名和密码
function UpdateUserName($userID, $userName,$password)
{
    include_once 'sqlQuery.php';
    // $isPaperScore $paperID 是int类型，不需要加单引号
    $query = "update userinfo
             set UserName = '$userName',PWD = '$password'
         where Account = '$userID'";
    return commonQuery($query);
}
// 修改密码
function UpdatePassword($userID, $password)
{
    include_once 'sqlQuery.php';
    // $isPaperScore $paperID 是int类型，不需要加单引号
    $query = "update userinfo
    set PWD = '$password'
    where Account = '$userID'";
    return commonQuery($query);
}

// 实名认证并修改权限
function UpdateID($userID, $idNum, $authority)
{
    include_once 'sqlQuery.php';
    // $isPaperScore $paperID 是int类型，不需要加单引号
    $query = "update userinfo
    set IDNumber = '$idNum',Authority = $authority
    where Account = '$userID'";
    return commonQuery($query);
}
?>