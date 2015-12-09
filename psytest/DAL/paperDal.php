<?php

/* 
 * @hero chen
 * ����paper�����а������·���
 * FindPaperByPaperID($paperID)   ͨ��paperID���������ҵ���Ӧ�Ծ�
 * FindPaperByPaperName($paperName)    ͨ���Ծ�����paperName�ҵ���Ӧ�Ծ�
 * FindPaperLikePaperName($paperName)     ͨ���Ծ�����paperName����ģ������
 * FindPaperByPaperType($paperType)     ͨ���Ծ����������Ҹ����͵������Ծ�
 * InsertPaper($paperName, $paperInfo, $paperType, $isPaperScore, $imagePath) ��paper�����һ������
 * DeletePaper($paperID) ͨ��paperID��������ɾ��һ����Ϣ
 * UpdatePaper($paperID, $paperName, $paperInfo, $paperType, $isPaperScore, $imagePath) ͨ��paperID������������һ����¼
 */


/*ͨ��PaperID���������ҵ���Ӧ�Ծ�*/
function FindPaperByPaperID($paperID)
{
    //�������ݿ�����ļ�
    include_once 'sqlQuery.php';
    //����sql���
    $query = "select * from paper 
        where PaperID = $paperID";
    //���ؽ��
    return selectQuery($query);
}

/*ͨ���Ծ������ҵ���Ӧ�Ծ�*/
function FindPaperByPaperName($paperName)
{
    include_once 'sqlQuery.php';
    $query = "select * from paper 
        where PaperName = '$paperName'"; 
    return selectQuery($query);
}

/*��paper�����һ������*/
function  InsertPaper($paperName, $paperInfo, $paperType, $isPaperScore, $imagePath)
{
    include_once 'sqlQuery.php';
    //$isPaperScore��int���ͣ�����Ҫ�ӵ�����
    $query = "insert into paper (PaperName,PaperInfo,PaperType,IsPaperScore,ImagePath) 
        values('$paperName','$paperInfo','$paperType',$isPaperScore,'$imagePath') ";
    return commonQuery($query);
}

/*ͨ��PaperID��������ɾ��һ����Ϣ*/
function  DeletePaper($paperID)
{
    include_once 'sqlQuery.php';
    $query = "delete from paper
        where PaperID = $paperID";
    return commonQuery($query);
}

/*ͨ��PaperID������������һ����¼*/
function  UpdatePaper($paperID, $paperName, $paperInfo, $paperType, $isPaperScore, $imagePath)
{
    include_once 'sqlQuery.php';
    //$isPaperScore $paperID ��int���ͣ�����Ҫ�ӵ�����
    $query = "update paper 
        set PaperName = '$paperName', PaperInfo = '$paperInfo', PaperType = '$paperType',
        IsPaperScore = $isPaperScore, ImagePath = '$imagePath' 
        where PaperID = $paperID";
    return commonQuery($query);
}

/*ͨ���Ծ����ƽ���ģ������*/
function FindPaperLikePaperName($paperName)
{
    include_once 'sqlQuery.php';
    $query = "select * from paper
    where PaperName like '%$paperName%'";
    return selectQuery($query);
}

/*ͨ���Ծ����������Ҹ����͵������Ծ�*/
function FindPaperByPaperType($paperType)
{
    include_once 'sqlQuery.php';
    $query = "select * from paper
    where PaperType = '$paperType'";
    return selectQuery($query);
}