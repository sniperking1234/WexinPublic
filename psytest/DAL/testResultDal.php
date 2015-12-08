<?php
/*
 * @yang
 * 操作testresult表，其中包括以下方法 
 *function FindTestResultByTestResultID($testResultID)                           通过testResultID找到相应的TestResult
 *function FindTestResultByUserID($userID)                                       通过userID找到相应的TestResult
 *function FindTestResultByPaperID($paperID)                                     通过paperID找到相应的TestResult
 *function InsertTestResult($userID,$paperID,$testScore,$testInfo)               增加一个TestResult
 *function UpdateTestResult($testResultID,$userID,$paperID,$testScore,$testInfo) 更新一个TestResult
 *function DeleteTestResult($testResultID)                                       通过testResultID删除相应的TestResult
*/
function FindTestResultByTestResultID($testResultID)
{
    //包含数据库操作文件
    include_once 'sqlQuery.php';
    //生成sql语句
    $query = "select * from testresult
    where TestResultID = $testResultID";
    //返回结果
    return selectQuery($query);
}

function FindTestResultByUserID($userID)
{
    //包含数据库操作文件
    include_once 'sqlQuery.php';
    //生成sql语句
    $query = "select * from testresult
    where UserID = $userID";
    //返回结果
    return selectQuery($query);
}

function FindTestResultByPaperID($paperID)
{
    //包含数据库操作文件
    include_once 'sqlQuery.php';
    //生成sql语句
    $query = "select * from testresult
    where PaperID = $paperID";
    //返回结果
    return selectQuery($query);
}

function InsertTestResult($userID,$paperID,$testScore,$testInfo)
{
    //包含数据库操作文件
    include_once 'sqlQuery.php';
    //生成sql语句
    $query = "insert into testresult (UserID,PaperID,TestScore,TestInfo)
    values($userID,$paperID,$testScore,'$testInfo') ";
    //返回结果
    return commonQuery($query);
}
function UpdateTestResult($testResultID,$userID,$paperID,$testScore,$testInfo)
{
    //包含数据库操作文件
    include_once 'sqlQuery.php';
    //生成sql语句
    $query = "update testresult
    set UserID = $userID, PaperID = $paperID, 
    TestScore =$testScore, SelcetScore ='$testInfo'
    where TestResultID = $testResultID";
    //返回结果
    return commonQuery($query);
}

function DeleteTestResult($testResultID)
{
    //包含数据库操作文件
    include_once 'sqlQuery.php';
    //生成sql语句
    $query = "delete from testresult
    where TestResultID = $testResultID";
    //返回结果
    return commonQuery($query);
}
