<?php
/*
 * @Tien
 * 添加编辑试卷。包含以下方法
 * UpdatePaperInfo更新试卷信息,如果要修改试卷名，要判断是否重复
 * DeletePaperForce($paperName) 强制删除试卷（先将依赖于这个Paper的数据删除，然后再删除Paper）
 * DeletePaperNormal($paperName)直接删除试卷
 * AddNewPaper($paperName, $paperInfo, $paperType, $isPaperScore, $imagePath),添加新试卷,要判断试卷名是否重复，如果不重复进行添加
 * AddUniqueQuestion($paperName, $questionNum, $questionInfo, $questionType, $questionSelect, $questionScore)插入题目到指定题号，其他大于等于该题号的题目题号加一
 * IsSamePaper($paperName)判断试卷名是否重复
 * GetAllPaperName(),获得所有试卷名
 * GetPaperID($paperName)，通过试卷名找到试卷主键（paperID）
 * IsPaperDependency($paperName)查询是否有依赖于该试卷的记录（外键）
 * GetQuestionID($paperName, $questionNum)通过paperName和questionNum得到题目主键（QuestionID）
 * GetAllQuestion($paperName)获得该试卷的所有题目
 * AddNewQuestion($paperName, $questionNum, $questionInfo, $questionType, $questionSelect, $questionScore)插入题目
 * IsQuestionDependency($paperName, $questionNum)查询是否有依赖于该题目的记录（外键）
 * CreatQuestionNum($paperName)生成试卷题号
 * GetUniqueQuestion($paperName, $questionNum)//根据试卷和题号找到其中题目
 * DeleteQuestionNormal($paperName, $questionNum)直接删除题目
 * function DeleteQuestionForce($paperName, $questionNum)强制删除题目,要注意外键依赖关系（先将依赖于这个Question的数据删除，然后再删除Question）
 * UpdateQuestionNumMinus($paperName, $questionNum)修改编号(questionNum),在删除一题之后，所有大于这个题的编号减一
 * UpdateQuestionNumAdd($paperName, $questionNum)修改编号(questionNum),在删除一题之后，所有大于这个题的编号加一
 * UpdateQuestionInfo($paperName, $questionNum, $questionInfo, $questionType ,$questionSelect, $questionScore)修改题目
 */     



//修改题目
function UpdateQuestionInfo($paperName, $questionNum, $questionInfo, $questionType ,$questionSelect, $questionScore)
{
    include_once '../DAL/questionDal.php';
    $questionID = GetQuestionID($paperName, $questionNum);
    UpdateQuestion($questionID, $questionNum, $questionInfo, $questionType ,$questionSelect, $questionScore);
    return 1;
}

//修改编号(questionNum),在删除一题之后，所有大于这个题的编号加一
function UpdateQuestionNumAdd($paperName, $questionNum)
{
    DeleteQuestionNormal($paperName, $qNum);
    if($questionNum < qNum)
    {
        $questionNum ++;
    }
    return 1;
}


//修改编号(questionNum),在删除一题之后，所有大于这个题的编号减一
function  UpdateQuestionNumMinus($paperName, $questionNum)
{
    DeleteQuestionNormal($paperName, $qNum);
    if($questionNum > qNum)
    {
        $questionNum --;
    }
    return 1;
} 



//强制删除题目,要注意外键依赖关系（先将依赖于这个Question的数据删除，然后再删除Question）
function DeleteQuestionForce($paperName, $questionNum)
{
    include_once '../DAl/selectResultDal.php';
    include_once '../DAL/questionDal.php';
    $selectResult = FindSelectResultByPaperID($paperID)  ;
    foreach ($selectResult as $single)
    {
        $selectResultID = $single[0];
        DeleteSelectResult($selectResultID);      
    }
    $questionID = GetQuestionID($paperName, $questionNum);
    if(DeleteQuestion($questionID))
    {
        return 1;
    }
    return 0;    
}

//直接删除题目
function DeleteQuestionNormal($paperName, $questionNum)
{
    include_once '../DAL/questionDal.php';
    $questionID = GetQuestionID($paperName, $questionNum);
    if(DeleteQuestion($questionID))
    {
        return 1;
    }
    return 0;
}


//查询是否有依赖于该题目的记录（外键）
function IsQuestionDependency($paperName, $questionNum)
{
    include_once '../DAl/selectResultDal.php';
    include_once '../DAL/questionDal.php';
    $questionID = GetQuestionID($paperName, $questionNum);
    $result = FindQuestionByQuestionID($questionID);
    $result2 = FindSelectResultByQuestionID($questionID);
    $number1 = count($result);
    $number2 = count($result2);
    
    if($number1 == 1 || $number2 ==1)
    {
        return 1;
    }
    return 0;
}


//根据试卷和题号找到其中题目
function GetUniqueQuestion($paperName, $questionNum)
{
    include_once '../DAl/questionDal.php';
    $paperID = GetPaperID($paperName);
    $uniqueQuestion = FindQuestionByQuestionNum($paperID,$questionNum);
    return $uniqueQuestion;
}

//插入题目
function AddNewQuestion($paperName, $questionNum, $questionInfo, $questionType, $questionSelect, $questionScore)
{
    include_once '../DAl/questionDal.php';
    $paperID = GetPaperID($paperName);
    if(InsertQuestion($paperID,$questionNum, $questionInfo, $questionType, $questionSelect, $questionScore))
    {
        return 1;
    }
    return 0;
}



//获得该试卷的所有题目
function GetAllQuestion($paperName)
{
    include_once '../DAl/questionDal.php';
    $paperID = GetPaperID($paperName);
    $question = FindQuestionByPaperID($paperID);
    return $question;
}

//通过paperName和questionNum得到题目主键（QuestionID）
function GetQuestionID($paperName, $questionNum)
{
    include_once '../DAl/questionDal.php';
    $paperID = GetPaperID($paperName);
    $result = FindQuestionByQuestionNum($paperID,$questionNum);
    foreach ($result as $single)
    {
        $questionID = $single[0];
    }
    return $questionID;
}


//通过试卷名找到试卷主键（paperID）
function GetPaperID($paperName)
{
    include_once '../DAL/paperDal.php';
    $paperID = 0;
    $result = FindPaperByPaperName($paperName);
    foreach ($result as $single)
    {
        $paperID = $single[0];
    }
    return $paperID;
}

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



//强制删除试卷（先将依赖于这个Paper的数据删除，然后再删除Paper）
function DeletePaperForce($paperName) 
{
    include_once '../DAl/selectResultDal.php';
    include_once '../DAL/questionDal.php';
    include_once '../DAL/testResultDal.php';
    $paperID = GetPaperID($paperName);
    $result1 = FindQuestionByPaperID($paperID);
    foreach ($result1 as $single1)
    {
        $questionID = single1[0];
        DeleteQuestion($questionID);
    }
    
    $result2 = FindSelectResultByPaperID($paperID);
    foreach ($result2 as $single2)
    {
        $selectResultID = single2[0];
        DeleteSelectResult($selectResultID);
    }
    
    $result3 = FindTestResultByPaperID($paperID);
    foreach ($result3 as $single3)
    {
        $testResultID = single3[0];
        DeleteTestResult($testResultID);
    }
    
    if(DeletePaper($paperID))
    {
        return 1;
    }
    return 0;

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
    include_once '../DAL/questionDal.php';
    $paperID = GetPaperID($paperName);
    $result = FindQuestionByPaperID($paperID);
    $number = count($result);
    if($number == 1)
    {
        return 1;
    }
    return 0;
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
    include_once 'paperDal.php';
    $paperName = FindALLPaperName();
    return $paperName;
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



//更新试卷信息,如果要修改试卷名，要判断是否重复
function UpdatePaperInfo($oldPaperName,$newPaperName,$paperInfo, $paperType, $isPaperScore, $imagePath)
{
    include_once '../DAl/paperDal.php';
    if ($oldPaperName != $newPaperName)
    {
        $paperName = $newPaperName;
        if(UpdatePaper($paperID, $paperName, $paperInfo, $paperType, $isPaperScore, $imagePath))
        {
            return 1;
        }
        return 0;
    }
}