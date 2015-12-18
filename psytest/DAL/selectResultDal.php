<?php
/*yang
 * ����selectResult�����а������·�����
 * FindSelectResultBySelectResultID($selectResultID)        ͨ��selectResultID�ҵ���Ӧ��SelectResult
 * FindSelectResultByUserID($userID)                        ͨ��userID�ҵ���Ӧ��SelectResult
 * FindSelectResultByPaperID($paperID)                      ͨ��paperID�ҵ���Ӧ��SelectResult
 * FindSelectResultByQuestionID($questionID)                ͨ��questionID�ҵ���Ӧ��SelectResult
 * FindSelectResultByUserPaper($userID,$paperID)            ͨ��userID��paperID�ҵ���Ӧ��SelectResult
 * InsertSelectResult($userID,$paperID,$questionID,$selectInfo,$selectScore)   ����һ��SelectResult
 * UpdateSelectResult($selectResultID,$userID,$paperID,$questionID,$selectInfo,$selectScore)  ����һ��SelectResult
 * DeleteSelectResult($selectResultID)                       ͨ��selectResultIDɾ��һ��SelectResult
 * UpdateSelectScoreByID($selectResultID, $selectScore)  ͨ��selectResultID����selectScore
 */


function FindSelectResultBySelectResultID($selectResultID)
{
    //�������ݿ�����ļ�
    include_once 'sqlQuery.php';
    //����sql���
    $query = "select * from selectresult
    where SelectResultID = $selectResultID";
    //���ؽ��
    return selectQuery($query);
}

function FindSelectResultByUserID($userID)
{
    //�������ݿ�����ļ�
    include_once 'sqlQuery.php';
    //����sql���
    $query = "select * from selectresult
    where UserID = $userID";
    //���ؽ��
    return selectQuery($query);
}
function FindSelectResultByPaperID($paperID)
{
    //�������ݿ�����ļ�
    include_once 'sqlQuery.php';
    //����sql���
    $query = "select * from selectresult
    where PaperID = $paperID";
    //���ؽ��
    return selectQuery($query);
}

function FindSelectResultByQuestionID($questionID)
{
    //�������ݿ�����ļ�
    include_once 'sqlQuery.php';
    //����sql���
    $query = "select * from selectresult
    where QuestionID = $questionID";
    //���ؽ��
    return selectQuery($query);
}

function FindSelectResultByUserPaper($userID, $paperID)
{
    //�������ݿ�����ļ�
    include_once 'sqlQuery.php';
    //����sql���
    $query = "select * from selectresult
    where UserID = $userID and  PaperID = $paperID" ;
    //���ؽ��
    return selectQuery($query);
}

function InsertSelectResult($userID,$paperID,$questionID,$selectInfo,$selectScore)
{
    //�������ݿ�����ļ�
    include_once 'sqlQuery.php';
    //����sql���
    $query = "insert into selectresult (UserID,PaperID,QuestionID,SelectInfo,SelectScore)
    values($userID,$paperID,$questionID,'$selectInfo',$selectScore) ";
    //���ؽ��
    return commonQuery($query);
}

function UpdateSelectResult($selectResultID,$userID,$paperID,$questionID,$selectInfo,$selectScore)
{
    //�������ݿ�����ļ�
    include_once 'sqlQuery.php';
    //����sql���
    $query = "update selectresult
    set UserID = $userID, PaperID = $paperID, QuestionID = $questionID,
    SelectInfo = '$selectInfo', SelcetScore = $selectScore
    where SelectResultID = $selectResultID";
    //���ؽ��
    return commonQuery($query);
}

function UpdateSelectScoreByID($selectResultID, $selectScore)
{
    include_once 'sqlQuery.php';
    $query = "update selectresult
    set SelectScore = $selectScore
    where SelectResultID = $selectResultID";
    return CommonQuery($query);
}

function DeleteSelectResult($selectResultID)
{
    //�������ݿ�����ļ�
    include_once 'sqlQuery.php';
    //����sql���
    $query = "delete from selectresult
    where SelectResultID = $selectResultID";
    //���ؽ��
    return commonQuery($query);
}
?>