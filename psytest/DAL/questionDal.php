<?php

/*
 * @Tien
 * ����question�����а������·���
 * FindQuestionByQuestionID($questionID)   ͨ��questionID���������ҵ���Ӧ����
 * FindQuestionByQuestionNum($paperID,$questionNum)    ͨ��������questionNum�ҵ���Ӧ����
 * FindQuestionByPaperID($paperID)         ͨ���Ծ�ID���ҵĸ��Ծ����������
 * FindQuestionByQuestionType($questionType)    ͨ���������������Ҹ����͵���������
 * InsertQuestion($paperID,$questionNum, $questionInfo, $questionType, $questionSelect, $questionScore) ��question�����һ������
 * DeleteQuestion($questionID) ͨ��questionID��������ɾ��һ����Ϣ
 * UpdateQuestionNum($questionID,$questionNum)      ����questionNum
 * UpdateQuestion($questionID, $questionNum, $questionInfo, $questionType ,$questionSelect, $questionScore) ͨ��questionID������������һ����¼
 */


/*ͨ��QuestionID���������ҵ���Ӧ����*/
function FindQuestionByQuestionID($questionID)
{
    //�������ݿ�����ļ�
    include_once 'sqlQuery.php';
    //����sql���
    $query = "select * from question
    where QuestionID = $questionID";
    //���ؽ��
    return selectQuery($query);
}

/* ͨ��������questionNum�ҵ���Ӧ����*/
function FindQuestionByQuestionNum($paperID,$questionNum)
{
    include_once 'sqlQuery.php';
    $query = "select * from question
    where PaperID = '$paperID and QuestionNum = $questionNum'";
    return selectQuery($query);
}

/* ͨ��paperID�ҳ����Ծ����������*/
function FindQuestionByPaperID($paperID)
{
    include_once 'sqlQuery.php';
    $query = "select * from question
    where PaperID = $paperID";
    return selectQuery($query);
}

/*ͨ���������������Ҹ����͵���������*/
function  FindQuestionByQuestionType($questionType)
{
    include_once 'sqlQuery.php';
    $query = "select * from question
    where QuestionType = '$questionType'";
    return selectQuery($query);
}

/*��question�����һ������*/
function  InsertQuestion($paperID,$questionNum, $questionInfo, $questionType, $questionSelect, $questionScore)
{
    include_once 'sqlQuery.php';
    $query = "insert into question(PaperID,QuestionNum,QuestionInfo,QuestionType,QuestionSelect,QuestionScore)
    values($paperID,$questionNum,'$questionInfo',$questionType,'$questionSelect','$questionScore')";
    return commonQuery($query);
}

/*ͨ��questionID��������ɾ��һ����Ϣ*/
function   DeleteQuestion($questionID) 
{
    include_once 'sqlQuery.php';
    $query = "delete from question
    where QuestionID = $questionID";
    return commonQuery($query);
}

/* ͨ��questionID������������һ����¼*/
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