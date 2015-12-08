<?php

/*
 * function findUsersByName($userName)
 * {
 * //���������ļ�
 * include '../config.php';
 * //�������ݿ�����
 * $conn=mysqli_connect($mysql_server_name,$mysql_username,$mysql_password);
 * mysqli_select_db($mysql_database);
 * //����sql��䲢���в�ѯ
 * $query="select * from userinfo ";
 * if(isset($userName)&&!$userName=='')
 * {
 * $query = $query."where UserID = '".$userName."'";
 * }
 * $result=mysqli_query($query,$conn);
 * //������ֵ��������
 * $array = array();
 * while($row=mysql_fetch_row($result))
 * {
 * $array[] = $row;
 * }
 *
 * //�ͷ���Դ,�ر�����
 * mysqli_free_result($result);
 * mysqli_close();
 *
 * //���ؽ��
 * return $array;
 * }
 *
 * function findUsersByNamePwd($userName, $psw)
 * {
 * //���������ļ�
 * include '../config.php';
 * //�������ݿ�����
 * $conn=mysqli_connect($mysql_server_name,$mysql_username,$mysql_password);
 * mysqli_select_db($mysql_database);
 * //����sql��䲢���в�ѯ
 * $query="select * from userinfo ";
 * if(isset($userName)&&!$userName=='')
 * {
 * $query = $query."where UserID = '".$userName."' and PWD = '$psw'";
 * }
 * $result=mysqli_query($query,$conn);
 * //������ֵ��������
 * $array = array();
 * while($row=mysql_fetch_row($result))
 * {
 * $array[] = $row;
 * }
 *
 * //�ͷ���Դ,�ر�����
 * mysqli_free_result($result);
 * mysqli_close();
 *
 * //���ؽ��
 * return $array;
 * }
 *
 * function insertUser($userName, $userPwd)
 * {
 * //���������ļ�
 * include '../config.php';
 * //�������ݿ�����
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
// ͨ��userId����
function findUsersByID($userName)
{
    // �������ݿ�����ļ�
    include_once 'sqlQuery.php';
    // ����sql���
    $query = "select * from userinfo
     where UserID = $userName";
    // ���ؽ��
    return selectQuery($query);
}
// ͨ��userName����
function findUsersByName($userName)
{
    // �������ݿ�����ļ�
    include_once 'sqlQuery.php';
    // ����sql���
    $query = "select * from userinfo
    where UserName = '$userName'";
    // ���ؽ��
    return selectQuery($query);
}
// ͨ��userId��password����
function findUsersByNamePwd($userName, $psw)
{
    // �������ݿ�����ļ�
    include_once 'sqlQuery.php';
    // ����sql���
    $query = "select * from userinfo
        where UserID = $userName and PWD = '$psw'";
    // ���ؽ��
    return selectQuery($query);
}
// �û���� 
function InsertUser($userId, $userPwd, $account, $userName, $idNum, $authority)
{
    include_once 'sqlQuery.php';
    $query="insert into userinfo (UserID,PWD,Account,UserName,IDNumber,Authority) 
    values($userId,'$userPwd','$account','$userName','$idNum',$authority) ";
    return commonQuery($query);
}
/* ͨ��UserID��������ɾ��һ����Ϣ */
function DeleteUser($userID)
{
    include_once 'sqlQuery.php';
    $query = "delete from userinfo
         where UserID = $userID";
    return commonQuery($query);
}
// �޸��û���
function UpdateUserName($userID, $userName)
{
    include_once 'sqlQuery.php';
    // $isPaperScore $paperID ��int���ͣ�����Ҫ�ӵ�����
    $query = "update userinfo
             set UserName = '$userName'
         where UserID = $userID";
    return commonQuery($query);
}
// ʵ����֤���޸�Ȩ��
function UpdateID($userID, $idNum, $authority)
{
    include_once 'sqlQuery.php';
    // $isPaperScore $paperID ��int���ͣ�����Ҫ�ӵ�����
    $query = "update userinfo
    set IDNumber = '$idNum',Authority = $authority
    where UserID = $userID";
    return commonQuery($query);
}
?>