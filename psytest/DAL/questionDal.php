<?php

/*
 * @Tien
 * ����question�����а������·���
 * FindQuestionByQuestionID($questionID)   ͨ��questionID���������ҵ���Ӧ����
 * FindQuestionByQuestionNum($paperID,$questionNum)    ͨ��������questionNum�ҵ���Ӧ����
 * FindQuestionByQuestionType($questionType)    ͨ���������������Ҹ����͵���������
 * InsertQuestion($paperID,$questionNum, $questionInfo, $questionType, $questionSelect, $questionScore) ��question�����һ������
 * DeleteQuestion($questionID) ͨ��questionID��������ɾ��һ����Ϣ
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
    where QuestionID = $questionID and PaperID = $paperID";
    return commonQuery($query);
}