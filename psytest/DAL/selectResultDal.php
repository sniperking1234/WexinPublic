<?php
/*yang
 * 操作selectResult表，其中包含以下方法：
 * FindSelectResultBySelectResultID($selectResultID)        通过selectResultID找到相应的SelectResult
 * FindSelectResultByUserID($userID)                        通过userID找到相应的SelectResult
 * FindSelectResultByPaperID($paperID)                      通过paperID找到相应的SelectResult
 * FindSelectResultByQuestionID($questionID)                通过questionID找到相应的SelectResult
 * FindSelectResultByUserPaper($userID,$paperID)            通过userID和paperID找到相应的SelectResult
 * InsertSelectResult($userID,$paperID,$questionID,$selectInfo,$selectScore)   增加一个SelectResult
 * UpdateSelectResult($selectResultID,$userID,$paperID,$questionID,$selectInfo,$selectScore)  更新一个SelectResult
 * DeleteSelectResult($selectResultID)                       通过selectResultID删除一个SelectResult
 * UpdateSelectScoreByID($selectResultID, $selectScore)  通过selectResultID更新selectScore
 */


function FindSelectResultBySelectResultID($selectResultID)
{
    //包含数据库操作文件
    include_once 'sqlQuery.php';
    //生成sql语句
    $query = "select * from selectresult
    where SelectResultID = $selectResultID";
    //返回结果
    return selectQuery($query);
}

function FindSelectResultByUserID($userID)
{
    //包含数据库操作文件
    include_once 'sqlQuery.php';
    //生成sql语句
    $query = "select * from selectresult
    where UserID = $userID";
    //返回结果
    return selectQuery($query);
}
function FindSelectResultByPaperID($paperID)
{
    //包含数据库操作文件
    include_once 'sqlQuery.php';
    //生成sql语句
    $query = "select * from selectresult
    where PaperID = $paperID";
    //返回结果
    return selectQuery($query);
}

function FindSelectResultByQuestionID($questionID)
{
    //包含数据库操作文件
    include_once 'sqlQuery.php';
    //生成sql语句
    $query = "select * from selectresult
    where QuestionID = $questionID";
    //返回结果
    return selectQuery($query);
}

function FindSelectResultByUserPaper($userID, $paperID)
{
    //包含数据库操作文件
    include_once 'sqlQuery.php';
    //生成sql语句
    $query = "select * from selectresult
    where UserID = $userID and  PaperID = $paperID" ;
    //返回结果
    return selectQuery($query);
}

function InsertSelectResult($userID,$paperID,$questionID,$selectInfo,$selectScore)
{
    //包含数据库操作文件
    include_once 'sqlQuery.php';
    //生成sql语句
    $query = "insert into selectresult (UserID,PaperID,QuestionID,SelectInfo,SelectScore)
    values($userID,$paperID,$questionID,'$selectInfo',$selectScore) ";
    //返回结果
    return commonQuery($query);
}

function UpdateSelectResult($selectResultID,$userID,$paperID,$questionID,$selectInfo,$selectScore)
{
    //包含数据库操作文件
    include_once 'sqlQuery.php';
    //生成sql语句
    $query = "update selectresult
    set UserID = $userID, PaperID = $paperID, QuestionID = $questionID,
    SelectInfo = '$selectInfo', SelcetScore = $selectScore
    where SelectResultID = $selectResultID";
    //返回结果
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
    //包含数据库操作文件
    include_once 'sqlQuery.php';
    //生成sql语句
    $query = "delete from selectresult
    where SelectResultID = $selectResultID";
    //返回结果
    return commonQuery($query);
}
?>