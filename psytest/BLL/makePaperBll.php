<?php
/*
 * @Tien
 * ��ӱ༭�Ծ��������·���
 * UpdatePaperInfo�����Ծ���Ϣ,���Ҫ�޸��Ծ�����Ҫ�ж��Ƿ��ظ�
 * DeletePaperForce($paperName) //ǿ��ɾ���Ծ��Ƚ����������Paper������ɾ����Ȼ����ɾ��Paper��
 * DeletePaperNormal($paperName)ֱ��ɾ���Ծ�
 * AddNewPaper,������Ծ�,Ҫ�ж��Ծ����Ƿ��ظ���������ظ��������
 * IsSamePaper($paperName)�ж��Ծ����Ƿ��ظ�
 * GetAllPaperName(),��������Ծ���
 * GetPaperID($paperName)��ͨ���Ծ����ҵ��Ծ�������paperID��
 * DeleteOldPaper($paperID)��ͨ��PaperID��������ɾ��һ���Ծ�
 *  IsPaperDependency($paperName)��ѯ�Ƿ��������ڸ��Ծ�ļ�¼�������
 *   
 */

//������Ŀ��ָ����ţ��������ڵ��ڸ���ŵ���Ŀ��ż�һ
function AddUniqueQuestion($paperName, $questionNum, $questionInfo, $questionType, $questionSelect, $questionScore)
{
    include_once '../DAl/questionDal.php';
    $paperID = GetPaperID($paperName);
    $result = FindQuestionByPaperID($paperID);
    foreach ($result as $single)
    {
        $questionID = $single[0];
        $qNumber = $single[2];
        if($qNumber >= $questionNum)
        {
            $qNumber ++;
            UpdateQuestionNum($questionID, $qNumber);
        }
    }
    InsertQuestion($paperID,$questionNum, $questionInfo, $questionType, $questionSelect, $questionScore);
    return 1;
}

//�����Ծ���Ϣ,���Ҫ�޸��Ծ�����Ҫ�ж��Ƿ��ظ�
function UpdatePaperInfo($oldPaperName,$newPaperName,$paperInfo, $paperType, $isPaperScore, $imagePath)
{
    include_once '../DAl/paperDal.php';
    
}

//ǿ��ɾ���Ծ�
function DeletePaperForce($paperName) 
{
    include_once '../DAl/selectResultDal.php';
    $paperID = GetPaperID($paperName);
    DeleteSelectResultByPaperID($paperID);
    
}

//ֱ��ɾ���Ծ�
function DeletePaperNormal($paperName)
{
    $paperID = GetPaperID($paperName);
    if(DeletePaper($paperID))
    {
        return 1;
    }
    return 0;
}
//��ѯ�Ƿ��������ڸ��Ծ�ļ�¼�������
function IsPaperDependency($paperName)
{
/*     include_once 'sqlQuery.php';
    $query = " select * from information_schema.key_column_usage
    where table_name='paper'";
    if ($query > 0)
    {
        return selectQuery($query);
    }
        return 0; */
    include_once '../DAL/questionDal.php';
    $paperID = GetPaperID($paperName);
    $result = FindQuestionByPaperID($paperID);
    $number = count($result);
    if($number == 1)
    {
        return 1;
    }
}
    
//������Ծ�,Ҫ�ж��Ծ����Ƿ��ظ���������ظ��������
function AddNewPaper($paperName, $paperInfo, $paperType, $isPaperScore, $imagePath)
{
    if (IsSamePaper($paperName) == 0)
    {
        if(InsertPaper($paperName, $paperInfo, $paperType, $isPaperScore, $imagePath))
        {
            return  1;
        }
        return  0;
    }

}
//�ж��Ծ����Ƿ��ظ�
function IsSamePaper($paperName)
{
 /*    include_once 'sqlQuery.php';
    $query ="select PaperName,Count(*) From paper Group By PaperName Having Count(*) > 1";
    if ($query > 1)
    {
        return 1;
    }
        return 0; */
        
     include_once '../DAL/paperDal.php';
     $result = FindPaperByPaperName($paperName);
     $number = count($result);
     if($number == 0)
     {
         return 0;
     }
     return 1;
     
}

//��������Ծ���
function GetAllPaperName()
{
    include_once 'sqlQuery.php';
    $query ="select PaperName from paper ";
    return selectQuery($query);
}

//ͨ���Ծ����ҵ��Ծ�������paperID��
function GetPaperID($paperName)
{
//     include_once 'sqlQuery.php';
//     $query = "select PaperID from paper
//         where PaperName = '$paperName'";
//     return selectQuery($query);
    $paperID = 0;
    include_once '../DAL/paperDal.php';
    $result = FindPaperByPaperName($paperName);
    foreach ($result as $single)
    {
        $paperID = $single[0];
    }
    return $paperID;   
}

//ͨ��PaperID��������ɾ��һ���Ծ�
function  DeleteOldPaper($paperID)
{
    if(DeletePaper($paperID))
    {
        return 1;
    }
    return  0;
}

//
function CreatQuestionNum($paperID)
{
    $result = FindQuestionByPaperID($paperID);
    $questionNum = count($result)+1;
    return $questionNum;
}