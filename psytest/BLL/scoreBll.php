<?php
/*
 * @Tien
 *  UpdateScoreInfo( $paperName, $LScore, $HScore, $newLScore, $newHScore, $newScoreInfo)修改评分标准，也要判断是否有冲突
 * InsertNewScore($paperName, $LScore, $HScore, $scoreInfo)添加评分标准，先判断是否有冲突
 * GetAllScore($paperName)获得该试题的所有评分标准
 * DeleteScoreInfo($paperName, $LScore, $HScore)删除评分标准
 * IsScoreConflict($paperName, $LScore, $HScore)判断评分标准是否冲突
 * GetScoreID($paperName, $LScore, $HScore)通过paperName，LScore，HScore得到一个评分标准的主键（scoreID）
 * GetScoreInfo($paperName, $score)通过paperName和得分返回ScoreInfo
 */

//修改评分标准，也要判断是否有冲突
function UpdateScoreInfo( $paperName, $LScore, $HScore, $newLScore, $newHScore, $newScoreInfo)
{
    include_once 'makePaperBll.php';
    $paperID = GetPaperID($paperName);
    $scoreID = GetScoreID($paperName, $LScore, $HScore);
    if(IsScoreConflict($paperName, $LScore, $HScore) ==1)
    {
        $scoreInfo = $newScoreInfo;
        UpdateScore($scoreID, $paperID, $LScore, $HScore, $scoreInfo);
    }
    return 1;
    
}


//添加评分标准，先判断是否有冲突
function InsertNewScore($paperName, $LScore, $HScore, $scoreInfo)
{
    include_once 'makePaperBll.php';
    $paperID = GetPaperID($paperName);
    if(IsScoreConflict($paperName, $LScore, $HScore) ==1)
   {
       InsertScore($paperID, $LScore, $HScore, $scoreInfo);
   }
   return 1;
}


//获得该试题的所有评分标准
function GetAllScore($paperName)
{
    include_once 'makePaperBll.php';
    $paperID = GetPaperID($paperName);
    $score = FindScoreByPaperID($paperID);
    return $score;
}

//删除评分标准
function DeleteScoreInfo($paperName, $LScore, $HScore)
{
    $scoreID = GetScoreID($paperName, $LScore, $HScore);
    DeleteScore($scoreID);
    return 1;
}

//判断评分标准是否冲突
function IsScoreConflict($paperName, $LScore, $HScore)
{
    include_once 'makePaperBll.php';
    include_once '../DAL/scoreDal.php';
    $paperID = GetPaperID($paperName);
    $result = FindScoreByPaperID($paperID);
    foreach ($result as $single)
    {
        $oldLscore = $single[2];
        $oldHscore = $single[4];
        if ($oldHscore<=$LScore||$oldLscore>=$HScore)
            return 1;
    }
    return 0;
}

//通过paperName，LScore，HScore得到一个评分标准的主键（scoreID）
function GetScoreID($paperName, $LScore, $HScore)
{
    include_once 'makePaperBll.php';
    include_once '../DAL/scoreDal.php';
    $paperID = GetPaperID($paperName);
    $result = FindScoreID($paperID, $LScore, $HScore);
    foreach ($result as $single)
    {
        $scoreID = $single[0];
    }
    return $scoreID;
}

//通过paperName和得分返回ScoreInfo
function GetScoreInfo($paperName, $score)
{
    include_once 'makePaperBll.php';
    include_once '../DAL/scoreDal.php';
    $paperID = GetPaperID($paperName);
    $result = FindScoreInfoByPaperScore($paperID, $score);
    foreach ($result as $single)
    {
        $scoreInfo = $single[0];
    }
    return $scoreInfo;
}