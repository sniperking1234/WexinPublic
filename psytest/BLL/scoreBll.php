<?php

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