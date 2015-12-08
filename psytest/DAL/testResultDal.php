<?php
/*
 * @yang
 * ����testresult�����а������·��� 
 *function FindTestResultByTestResultID($testResultID)                           ͨ��testResultID�ҵ���Ӧ��TestResult
 *function FindTestResultByUserID($userID)                                       ͨ��userID�ҵ���Ӧ��TestResult
 *function FindTestResultByPaperID($paperID)                                     ͨ��paperID�ҵ���Ӧ��TestResult
 *function InsertTestResult($userID,$paperID,$testScore,$testInfo)               ����һ��TestResult
 *function UpdateTestResult($testResultID,$userID,$paperID,$testScore,$testInfo) ����һ��TestResult
 *function DeleteTestResult($testResultID)                                       ͨ��testResultIDɾ����Ӧ��TestResult
*/
function FindTestResultByTestResultID($testResultID)
{
    //�������ݿ�����ļ�
    include_once 'sqlQuery.php';
    //����sql���
    $query = "select * from testresult
    where TestResultID = $testResultID";
    //���ؽ��
    return selectQuery($query);
}

function FindTestResultByUserID($userID)
{
    //�������ݿ�����ļ�
    include_once 'sqlQuery.php';
    //����sql���
    $query = "select * from testresult
    where UserID = $userID";
    //���ؽ��
    return selectQuery($query);
}

function FindTestResultByPaperID($paperID)
{
    //�������ݿ�����ļ�
    include_once 'sqlQuery.php';
    //����sql���
    $query = "select * from testresult
    where PaperID = $paperID";
    //���ؽ��
    return selectQuery($query);
}

function InsertTestResult($userID,$paperID,$testScore,$testInfo)
{
    //�������ݿ�����ļ�
    include_once 'sqlQuery.php';
    //����sql���
    $query = "insert into testresult (UserID,PaperID,TestScore,TestInfo)
    values($userID,$paperID,$testScore,'$testInfo') ";
    //���ؽ��
    return commonQuery($query);
}
function UpdateTestResult($testResultID,$userID,$paperID,$testScore,$testInfo)
{
    //�������ݿ�����ļ�
    include_once 'sqlQuery.php';
    //����sql���
    $query = "update testresult
    set UserID = $userID, PaperID = $paperID, 
    TestScore =$testScore, SelcetScore ='$testInfo'
    where TestResultID = $testResultID";
    //���ؽ��
    return commonQuery($query);
}

function DeleteTestResult($testResultID)
{
    //�������ݿ�����ļ�
    include_once 'sqlQuery.php';
    //����sql���
    $query = "delete from testresult
    where TestResultID = $testResultID";
    //���ؽ��
    return commonQuery($query);
}
