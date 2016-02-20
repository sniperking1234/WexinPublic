<?php

/*
 * @Tien
 * 操作question表，其中包含以下方法
 * FindQuestionByQuestionID($questionID)   通过questionID（主键）找到相应问题
 * FindQuestionByQuestionNum($paperID,$questionNum)    通过问题编号questionNum找到相应问题
 * FindQuestionByPaperID($paperID)         通过试卷ID来找的该试卷的所有问题
 * FindQuestionByQuestionType($questionType)    通过问题类型来查找该类型的所有问题
 * InsertQuestion($paperID,$questionNum, $questionInfo, $questionType, $questionSelect, $questionScore) 向question表插入一条数据
 * DeleteQuestion($questionID) 通过questionID（主键）删除一条信息
 * UpdateQuestionNum($questionID,$questionNum)      更新questionNum
 * UpdateQuestion($questionID, $questionNum, $questionInfo, $questionType ,$questionSelect, $questionScore) 通过questionID（主键）更新一条记录
 */


/*通过QuestionID（主键）找到相应问题*/
function FindQuestionByQuestionID($questionID)
{
    //包含数据库操作文件
    include_once 'sqlQuery.php';
    //生成sql语句
    $query = "select * from question
    where QuestionID = $questionID";
    //返回结果
    return selectQuery($query);
}

/* 通过问题编号questionNum找到相应问题*/
function FindQuestionByQuestionNum($paperID,$questionNum)
{
    include_once 'sqlQuery.php';
    $query = "select * from question
    where PaperID = '$paperID and QuestionNum = $questionNum'";
    return selectQuery($query);
}

/* 通过paperID找出该试卷的所有问题*/
function FindQuestionByPaperID($paperID)
{
    include_once 'sqlQuery.php';
    $query = "select * from question
    where PaperID = $paperID";
    return selectQuery($query);
}

/*通过问题类型来查找该类型的所有问题*/
function  FindQuestionByQuestionType($questionType)
{
    include_once 'sqlQuery.php';
    $query = "select * from question
    where QuestionType = '$questionType'";
    return selectQuery($query);
}

/*向question表插入一条数据*/
function  InsertQuestion($paperID,$questionNum, $questionInfo, $questionType, $questionSelect, $questionScore)
{
    include_once 'sqlQuery.php';
    $query = "insert into question(PaperID,QuestionNum,QuestionInfo,QuestionType,QuestionSelect,QuestionScore)
    values($paperID,$questionNum,'$questionInfo',$questionType,'$questionSelect','$questionScore')";
    return commonQuery($query);
}

/*通过questionID（主键）删除一条信息*/
function   DeleteQuestion($questionID) 
{
    include_once 'sqlQuery.php';
    $query = "delete from question
    where QuestionID = $questionID";
    return commonQuery($query);
}

/* 通过questionID（主键）更新一条记录*/
function  UpdateQuestion($paperID,$questionID, $questionNum, $questionInfo, $questionType ,$questionSelect, $questionScore)
{
    include_once 'sqlQuery.php';
    $query = "update question
    set QuestionNum= $questionNum,QuestionInfo = '$questionInfo', QuestionType = $questionType,
    QuestionSelect = '$questionSelect',QuestionScore = '$questionScore'
    where QuestionID = $questionID";
    return commonQuery($query);
}

function UpdateQuestionNum($questionID,$questionNum)
{
    include_once 'sqlQuery.php';
    $query = "update question
    set QuestionNum= $questionNum 
    where QuestionID = $questionID";
    return commonQuery($query);
}