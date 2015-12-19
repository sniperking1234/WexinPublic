<?php
/*
 * @chen 
 *  �����������а������·���
 *  SaveSelectResult   ��ѡ��������saveSelectResultCalculateScore
 *  CalculateScore  ��÷��û�������һ������ĵ÷ֲ�д��TestResult����
 */

/*��ѡ��������saveSelectResult*/
function SaveSelectResult($userID, $paperID, $questionID, $selectInfo, $selectScore)
{
    include_once '../DAL/selectResultDal.php';
    if(InsertSelectResult($userID,$paperID,$questionID,$selectInfo,$selectScore))
        return 1;
    return 0;
}

/*����÷��û�������һ������ĵ÷ֲ�д��TestResult���SelectResult��*/
function CalculateScore($userID, $paperID)
{
    include_once '../DAL/selectResultDal.php';
    include_once '../Dal/questionDal.php';
    $userSelection = FindSelectResultByUserPaper($userID, $paperID);
    CalculSingleScore($userSelection);
    CalculTestScore($userID, $paperID);
    return 1;
}

/*���㵥��÷�*/
function CalculSingleScore($userSelection)
{
    include_once '../DAL/selectResultDal.php';
    foreach ($userSelection as $single)
    {
        $resultID = $single[0];//�ҵ�����
        $questionID = $single[3];
        $selectInfo = $single[4];
        $questionResult = FindQuestionByQuestionID($questionID);
        //�ҵ�����ĵ÷�����
        $questionScore = $questionResult[0][6];
        //�ԷֺŽ��в��
        $questionScoreList = explode(';',$questionScore);
        //�ֱ���и�ֵ
        if($selectInfo == 'A' || $selectInfo == '0')
            $trueScore = $questionScoreList[0];
        else if($selectInfo == 'B' || $selectInfo == '1')
            $trueScore = $questionScoreList[1];
        else if($selectInfo == 'C' )
            $trueScore = $questionScoreList[2];
        else if($selectInfo == 'D')
            $trueScore = $questionScoreList[3];
        UpdateSelectScoreByID($resultID, $trueScore);//���·���
    }
}

/*���������Ծ�ĵ÷�,��д��TestResult����*/
function CalculTestScore($userID, $paperID)
{
    include_once '../DAL/selectResultDal.php';
    include_once '../DAL/paperDal.php';
    $sumSocre = 0;
    $ScoreInfo = NULL;
    //���������²�ѯһ�ߣ���Ϊ֮ǰ�ѵ���ĵ÷�д����
    $userSelection = FindSelectResultByUserPaper($userID, $paperID);
    foreach ($userSelection as $single)
    {
        $sumSocre += $single[5];
    }
    /*�жϸ��Ծ��Ƿ������ֱ�׼*/
    $paperResult = FindPaperByPaperID($paperID);
    foreach ($paperResult as $single)
    {
        $isPaperScore = $single[4];
    }
    //�����
    if($isPaperScore)
    {
        $ScoreInfo = GetScoreInfo($paperID, $sumSocre);
        //�������ȷ���ؽ��,���в���
        if($ScoreInfo)
        {
            InsertTestResult($userID, $paperID, $sumSocre, $ScoreInfo);
        }
    }
}

/*ͨ���÷ֻ�ȡ�÷����䣬����������*/
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