<?php
/*
 * @Tien
 * 添加编辑试卷。包含以下方法
 * UpdatePaperInfo更新试卷信息,如果要修改试卷名，要判断是否重复
 * DeletePaperForce($paperName) //强制删除试卷（先将依赖于这个Paper的数据删除，然后再删除Paper）
 * DeletePaperNormal($paperName)直接删除试卷
 * AddNewPaper,添加新试卷,要判断试卷名是否重复，如果不重复进行添加
 * IsSamePaper($paperName)判断试卷名是否重复
 * GetAllPaperName(),获得所有试卷名
 * GetPaperID($paperName)，通过试卷名找到试卷主键（paperID）
 * DeleteOldPaper($paperID)，通过PaperID（主键）删除一张试卷
 *  IsPaperDependency($paperName)查询是否有依赖于该试卷的记录（外键）
 *   
 */

//插入题目到指定题号，其他大于等于该题号的题目题号加一
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

//更新试卷信息,如果要修改试卷名，要判断是否重复
function UpdatePaperInfo($oldPaperName,$newPaperName,$paperInfo, $paperType, $isPaperScore, $imagePath)
{
    include_once '../DAl/paperDal.php';
    
}

//强制删除试卷
function DeletePaperForce($paperName) 
{
    include_once '../DAl/selectResultDal.php';
    $paperID = GetPaperID($paperName);
    DeleteSelectResultByPaperID($paperID);
    
}

//直接删除试卷
function DeletePaperNormal($paperName)
{
    $paperID = GetPaperID($paperName);
    if(DeletePaper($paperID))
    {
        return 1;
    }
    return 0;
}
//查询是否有依赖于该试卷的记录（外键）
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
    
//添加新试卷,要判断试卷名是否重复，如果不重复进行添加
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
//判断试卷名是否重复
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

//获得所有试卷名
function GetAllPaperName()
{
    include_once 'sqlQuery.php';
    $query ="select PaperName from paper ";
    return selectQuery($query);
}

//通过试卷名找到试卷主键（paperID）
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

//通过PaperID（主键）删除一张试卷
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