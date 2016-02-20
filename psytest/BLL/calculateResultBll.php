<?php
/*
 * @chen 
 *  计算结果，其中包含以下方法
 *  SaveSelectResult($userID, $paperID, $questionID, $selectInfo, $selectScore)   把选择结果存入saveSelectResultCalculateScore
 *  CalculateScore  算得分用户的其中一套试题的得分并写入TestResult表中
 */

/*把选择结果存入saveSelectResult*/ 
function SaveSelectResult($userID, $paperID, $questionID, $selectInfo, $selectScore)
{
    include_once '../DAL/selectResultDal.php';
    if(InsertSelectResult($userID,$paperID,$questionID,$selectInfo,$selectScore))
        return 1;
    return 0;
}

/*计算得分用户的其中一套试题的得分并写入TestResult表和SelectResult中*/
function CalculateScore($userID, $paperID)
{
    include_once '../DAL/selectResultDal.php';
    include_once '../Dal/questionDal.php';
    $userSelection = FindSelectResultByUserPaper($userID, $paperID);
    CalculSingleScore($userSelection);
    CalculTestScore($userID, $paperID);
    return 1;
}

/*计算单项得分*/
function CalculSingleScore($userSelection)
{
    include_once '../DAL/selectResultDal.php';
    foreach ($userSelection as $single)
    {
        $resultID = $single[0];//找到主键
        $questionID = $single[3];
        $selectInfo = $single[4];
        $questionResult = FindQuestionByQuestionID($questionID);
        //找到该题的得分设置
        $questionScore = $questionResult[0][6];
        //以分号进行拆分
        $questionScoreList = explode(';',$questionScore);
        //分别进行赋值
        if($selectInfo == 'A' || $selectInfo == '0')
            $trueScore = $questionScoreList[0];
        else if($selectInfo == 'B' || $selectInfo == '1')
            $trueScore = $questionScoreList[1];
        else if($selectInfo == 'C' )
            $trueScore = $questionScoreList[2];
        else if($selectInfo == 'D')
            $trueScore = $questionScoreList[3];
        UpdateSelectScoreByID($resultID, $trueScore);//更新分数
    }
}

/*计算整张试卷的得分,并写入TestResult表中*/
function CalculTestScore($userID, $paperID)
{
    include_once '../DAL/selectResultDal.php';
    include_once '../DAL/paperDal.php';
    include_once '../DAL/testResultDal.php';
    $isPaperScore = 0;
    $sumSocre = 0;
    $ScoreInfo = NULL;
    //在这里重新查询一边，因为之前把单项的得分写入了
    $userSelection = FindSelectResultByUserPaper($userID, $paperID);
    foreach ($userSelection as $single)
    {
        $sumSocre += $single[5];
    }
    /*判断该试卷是否有评分标准*/
    $paperResult = FindPaperByPaperID($paperID);
    foreach ($paperResult as $single)
    {
        $isPaperScore = $single[4];
    }
    //如果有
    if($isPaperScore)
    {
        $ScoreInfo = GetScoreInfo($paperID, $sumSocre);
        //如果能正确返回结果,进行插入
        if($ScoreInfo)
        {
            InsertTestResult($userID, $paperID, $sumSocre, $ScoreInfo);
        }
    }
}

/*通过得分获取得分区间，并返回描述*/
function GetScoreInfo($paperID, $sumSocre)
{
    include_once '../DAL/scoreDal.php';
    $scoreResult = FindScoreByPaperID($paperID);
    foreach ($scoreResult as $single)
    {
        $lowScore = $single[2];
        $highScore = $single[3];
        $scoreInfo = $single[4];
        if($lowScore<=$sumSocre&&$highScore>=$sumSocre)
            return $scoreInfo;
    }
    return NULL;
}