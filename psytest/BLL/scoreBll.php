<?php

//�ж����ֱ�׼�Ƿ��ͻ
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

//ͨ��paperName��LScore��HScore�õ�һ�����ֱ�׼��������scoreID��
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

//ͨ��paperName�͵÷ַ���ScoreInfo
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