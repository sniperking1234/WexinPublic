<?php

/*
 * @chen
 * ����score�����а������·���
 * FindScoreByScoreID($scoreID)   ͨ��ScoreID���������ҵ���Ӧ���ֱ�׼
 * FindScoreByPaperID($paperID)   ��PaperID�ҵ����Ծ���������ֱ�׼
 * FindScoreInfoByPaperScore($paperID, $score)  ͨ��paperID��score�鿴��score������һ���÷������У��ú����ķ���ֵΪScoreInfo
 * FindScoreID($paperID, $LScore, $HScore)
 * InsertScore($paperID, $LScore, $HScore, $scoreInfo)  ��score�����һ������
 * UpdateScore($scoreID, $paperID, $LScore, $HScore, $scoreInfo)   ͨ��scoreID������������һ����¼
 * DeleteScore($scoreID)   ͨ��scoreID��������ɾ��һ����¼
 * DeleteScoreByPaperID($paperID)   ͨ��paperIDɾ�������Ծ�ļ�¼
 */

/*ͨ��ScoreID���������ҵ���Ӧ���ֱ�׼*/
function FindScoreByScoreID($scoreID)
{
    //�������ݿ�����ļ�
    include_once 'sqlQuery.php';
    //����sql���
    $query = "select * from score
        where ScoreID = $scoreID";
    //���ؽ��
    return selectQuery($query);
}

/*ͨ��PaperID�ҵ����Ծ���������ֱ�׼*/
function FindScoreByPaperID($paperID)
{
    include_once 'sqlQuery.php';
    $query = "select * from score
        where PaperID = $paperID";
    return selectQuery($query);
}

/*��score�����һ������*/
function InsertScore($paperID, $LScore, $HScore, $scoreInfo)
{
    include_once 'sqlQuery.php';
    //$paperID,$LScore,$HScoreΪ���֣�����Ҫ�ӵ�����
    $query = "insert into score (PaperID,LScore,HScore,ScoreInfo)
        values($paperID,$LScore,$HScore,'$scoreInfo') ";
    return CommonQuery($query);
}

/*ͨ��scoreID������������һ����¼*/
function UpdateScore($scoreID, $paperID, $LScore, $HScore, $scoreInfo)
{
    include_once 'sqlQuery.php';
    //$paperID,$LScore,$HScore,$scoreIDΪ���֣�����Ҫ�ӵ�����
    $query="update score
        set PaperID = $paperID, LScore = $LScore, Hscore = $HScore, ScoreInfo = '$scoreInfo' 
        where scoreID = $scoreID";
    return CommonQuery($query);
}

/*ͨ��scoreID��������ɾ��һ����¼*/
function DeleteScore($scoreID)
{
    include_once 'sqlQuery.php';
    $query="delete from score
        where ScoreID = $scoreID";
    return commonQuery($query);
}

/*ͨ��paperID��score�鿴��score������һ���÷������У��ú����ķ���ֵΪScoreInfo*/
function FindScoreInfoByPaperScore($paperID, $score)
{
    include_once 'sqlQuery.php';
    $query = "select ScoreInfo from score 
        where PaperID = $paperID and LScore <= $score and HScore >= $score";
    return selectQuery($query);
}

/*ͨ��paperIDɾ�������Ծ�ļ�¼*/
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