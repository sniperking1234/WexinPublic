<?php

/*
 * @chen
 * 操作score表，其中包含以下方法
 * FindScoreByScoreID($scoreID)   通过ScoreID（主键）找到相应评分标准
 * FindScoreByPaperID($paperID)   过PaperID找到该试卷的所有评分标准
 * FindScoreInfoByPaperScore($paperID, $score)  通过paperID和score查看该score落在哪一个得分区间中，该函数的返回值为ScoreInfo
 * FindScoreID($paperID, $LScore, $HScore)
 * InsertScore($paperID, $LScore, $HScore, $scoreInfo)  向score表插入一条数据
 * UpdateScore($scoreID, $paperID, $LScore, $HScore, $scoreInfo)   通过scoreID（主键）更新一条记录
 * DeleteScore($scoreID)   通过scoreID（主键）删除一条记录
 * DeleteScoreByPaperID($paperID)   通过paperID删除整个试卷的记录
 */

/*通过ScoreID（主键）找到相应评分标准*/
function FindScoreByScoreID($scoreID)
{
    //包含数据库操作文件
    include_once 'sqlQuery.php';
    //生成sql语句
    $query = "select * from score
        where ScoreID = $scoreID";
    //返回结果
    return selectQuery($query);
}

/*通过PaperID找到该试卷的所有评分标准*/
function FindScoreByPaperID($paperID)
{
    include_once 'sqlQuery.php';
    $query = "select * from score
        where PaperID = $paperID";
    return selectQuery($query);
}

/*向score表插入一条数据*/
function InsertScore($paperID, $LScore, $HScore, $scoreInfo)
{
    include_once 'sqlQuery.php';
    //$paperID,$LScore,$HScore为数字，不需要加单引号
    $query = "insert into score (PaperID,LScore,HScore,ScoreInfo)
        values($paperID,$LScore,$HScore,'$scoreInfo') ";
    return CommonQuery($query);
}

/*通过scoreID（主键）更新一条记录*/
function UpdateScore($scoreID, $paperID, $LScore, $HScore, $scoreInfo)
{
    include_once 'sqlQuery.php';
    //$paperID,$LScore,$HScore,$scoreID为数字，不需要加单引号
    $query="update score
        set PaperID = $paperID, LScore = $LScore, Hscore = $HScore, ScoreInfo = '$scoreInfo' 
        where scoreID = $scoreID";
    return CommonQuery($query);
}

/*通过scoreID（主键）删除一条记录*/
function DeleteScore($scoreID)
{
    include_once 'sqlQuery.php';
    $query="delete from score
        where ScoreID = $scoreID";
    return commonQuery($query);
}

/*通过paperID和score查看该score落在哪一个得分区间中，该函数的返回值为ScoreInfo*/
function FindScoreInfoByPaperScore($paperID, $score)
{
    include_once 'sqlQuery.php';
    $query = "select ScoreInfo from score 
        where PaperID = $paperID and LScore <= $score and HScore >= $score";
    return selectQuery($query);
}

/*通过paperID删除整个试卷的记录*/
function DeleteScoreByPaperID($paperID)
{
    include_once 'sqlQuery.php';
    $query="delete from score
        where PaperID = $paperID";
    return commonQuery($query);
}

function FindScoreID($paperID, $LScore, $HScore)
{
    include_once 'sqlQuery.php';
    $query = "select * from score
    where PaperID = $paperID and LScore = $LScore and HScore = $HScore";
    return selectQuery($query);
}