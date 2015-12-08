<?php
//��֤�û��Ƿ����
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
//��¼��֤�û���������
function CheckUser($userID, $userPwd)
{
    include_once '../DAL/userDal.php';
    $result = findUsersByNamePwd($userID, $userPwd);
    if($result > 0)
    {
        return true;
    }
    return false;
}
//�û�ע��
function Insert($userId, $userPwd, $account, $userName, $idNum, $authority)
{
    include_once '../DAL/userDal.php';
    $result = InsertUser($userId, $userPwd, $account, $userName, $idNum, $authority);
    if($result > 0)
    {
        return true;
    }
    return false;
}
//�޸��û���
function ModifyUserName($userID, $userName)
{
    include_once '../DAL/userDal.php';
    if(isset($userID) && !$userID=='')
    {
        $result = UpdateUserName($userID, $userName);
    }

  //  $= count($userlist);
    if($result > 0)
    {
        return true;
    }
    return false;
}
//ʵ����֤���޸�Ȩ��
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
//���˺Ų����û�
function FindbyUserId($userID)
{
    include_once '../DAL/userDal.php';
    if(isset($userID) && !$userID=='')
    {
        $userlist= findUsersByID($userID);
    }

    return $userlist;
}
//���û��������û�
function FindbyUserName($userName)
{
    include_once '../DAL/userDal.php';
    if(isset($userName) && !$userName=='')
    {
         $userlist= findUsersByName($userName);
    }

    return $userlist;
}
//���˺�ɾ���û�
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