<?php

/*
 * function findUsersByName($userName)
 * {
 * //包含配置文件
 * include '../config.php';
 * //创建数据库连接
 * $conn=mysqli_connect($mysql_server_name,$mysql_username,$mysql_password);
 * mysqli_select_db($mysql_database);
 * //创建sql语句并进行查询
 * $query="select * from userinfo ";
 * if(isset($userName)&&!$userName=='')
 * {
 * $query = $query."where UserID = '".$userName."'";
 * }
 * $result=mysqli_query($query,$conn);
 * //将返回值放入数组
 * $array = array();
 * while($row=mysql_fetch_row($result))
 * {
 * $array[] = $row;
 * }
 *
 * //释放资源,关闭连接
 * mysqli_free_result($result);
 * mysqli_close();
 *
 * //返回结果
 * return $array;
 * }
 *
 * function findUsersByNamePwd($userName, $psw)
 * {
 * //包含配置文件
 * include '../config.php';
 * //创建数据库连接
 * $conn=mysqli_connect($mysql_server_name,$mysql_username,$mysql_password);
 * mysqli_select_db($mysql_database);
 * //创建sql语句并进行查询
 * $query="select * from userinfo ";
 * if(isset($userName)&&!$userName=='')
 * {
 * $query = $query."where UserID = '".$userName."' and PWD = '$psw'";
 * }
 * $result=mysqli_query($query,$conn);
 * //将返回值放入数组
 * $array = array();
 * while($row=mysql_fetch_row($result))
 * {
 * $array[] = $row;
 * }
 *
 * //释放资源,关闭连接
 * mysqli_free_result($result);
 * mysqli_close();
 *
 * //返回结果
 * return $array;
 * }
 *
 * function insertUser($userName, $userPwd)
 * {
 * //包含配置文件
 * include '../config.php';
 * //创建数据库连接
 * $conn=mysqli_connect($mysql_server_name,$mysql_username,$mysql_password);
 * mysqli_select_db($mysql_database);
 *
 * $query="insert into user_info (user_name,user_passwd) values('$userName','$userPwd') ";
 * $result=mysqli_query($query,$conn);
 * if($result)
 * {
 * mysqli_free_result($result);
 * mysqli_close();
 * return 1;
 * }
 * mysqli_free_result($result);
 * mysqli_close();
 * return 0;
 * }
 */
// 通过userId查找
function findUsersByID($userName)
{
    // 包含数据库操作文件
    include_once 'sqlQuery.php';
    // 生成sql语句
    $query = "select * from userinfo
     where UserID = $userName";
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
// 通过userId与password查找
function findUsersByNamePwd($userName, $psw)
{
    // 包含数据库操作文件
    include_once 'sqlQuery.php';
    // 生成sql语句
    $query = "select * from userinfo
        where UserID = $userName and PWD = '$psw'";
    // 返回结果
    return selectQuery($query);
}
// 用户添加 
function InsertUser($userId, $userPwd, $account, $userName, $idNum, $authority)
{
    include_once 'sqlQuery.php';
    $query="insert into userinfo (UserID,PWD,Account,UserName,IDNumber,Authority) 
    values($userId,'$userPwd','$account','$userName','$idNum',$authority) ";
    return commonQuery($query);
}
/* 通过UserID（主键）删除一条信息 */
function DeleteUser($userID)
{
    include_once 'sqlQuery.php';
    $query = "delete from userinfo
         where UserID = $userID";
    return commonQuery($query);
}
// 修改用户名
function UpdateUserName($userID, $userName)
{
    include_once 'sqlQuery.php';
    // $isPaperScore $paperID 是int类型，不需要加单引号
    $query = "update userinfo
             set UserName = '$userName'
         where UserID = $userID";
    return commonQuery($query);
}
// 实名认证并修改权限
function UpdateID($userID, $idNum, $authority)
{
    include_once 'sqlQuery.php';
    // $isPaperScore $paperID 是int类型，不需要加单引号
    $query = "update userinfo
    set IDNumber = '$idNum',Authority = $authority
    where UserID = $userID";
    return commonQuery($query);
}
?>