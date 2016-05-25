<?php 
/*
 * 
 根据UserID和PaperID查找在测试结果表（TestResult）中查找相应的结果
function FindResultByUserIDPaperID($userID,$paperID)

根据UserID查找用户所有的测试结果
function FindResultByUserID($userID)

查看其中某个用户一张试卷的选项分布比例,返回一个二维数组，第一维代表题号，第二维代表选项

function GetProportionByUserIDPaperID($userID,$paperID)

填入医生反馈
function SetFeedback($userID,$paperID,$feedback)
 * */


function FindResultByUserIDPaperID($userID,$paperID) {
    include_once '../DAL/testResultDal.php';
    $userPaperResult = FindTestResultByUserPaper($userID,$paperID);
    return $userPaperResult;
}


function FindResultByUserID($userID) {
    include_once '../DAL/testResultDal.php';
    $userAllPaperResult = FindTestResultByUserID($userID);
    return $userAllPaperResult;
    
}

/*
 * 查看其中某个用户一张试卷的选项分布比例,返回一个二维数组，第一维代表题号，第二维代表选项
 * 需要田一羊同学提供一个函数 我已经写在下面了，直接copy到DAL/questionDal.php就可以使用
 * function FindQuestionNumInPaperByQuestionID($questionID) {
    include_once 'sqlQuery.php';
    $query = "select QuestionNum from question 
    where QuestionID = $questionID";
    return SelectQuery($query);
}
 * */
function FindQuestionNumInPaperByQuestionID($questionID) {
    include_once 'sqlQuery.php';
    $query = "select QuestionNum from question
    where QuestionID = $questionID";
    return SelectQuery($query);
}
 
function GetProportionByUserIDPaperID($userID,$paperID)
{
    include_once '../DAL/testResultDal.php';
    include_once '../DAL/selectResultDal.php';
    include_once '../DAL/questionDal.php';
    
    /*根据用户ID和试卷ID找出选择的结果 存入userSelection变量中*/
    $userSelection = FindSelectResultByUserPaper($userID, $paperID);
    
    $proportionArray = array();
    
    foreach ($userSelection as $single)
    {
        $resultID = $single[0];//找到主键
        $questionID = $single[3];
        $selectInfo = $single[4];
        
        //因为FindQuestionNumInPaperByQuestionID返回的是一个二维数组  我们需要的数组下标为[0][0]
        $questionNum = FindQuestionNumInPaperByQuestionID($questionID)[0][0];
        
        //初始的时候四个选项选择的数目次数均为0 如果是判断题 只有前俩位有效
        $proportionArray[questionNum-1] = [0,0,0,0];
   
        if($selectInfo == 'A' || $selectInfo == '0')
           $proportionArray[questionNum - 1][0]++;
        else if($selectInfo == 'B' || $selectInfo == '1')
           $proportionArray[questionNum - 1][1]++;
        else if($selectInfo == 'C' )
           $proportionArray[questionNum - 1][2]++;
        else if($selectInfo == 'D')
           $proportionArray[questionNum - 1][3]++;
    }
    
    return $proportionArray;
}

/*给testResult表添加反馈的内容*/
function SetFeedback($userID,$paperID,$feedback) 
{
    include_once '../DAL/testResultDal.php';
    
    /*对用户的某一份试卷添加反馈*/
    $res = AddTestInfo($userID,$paperID,$feedback);
    
    /*如果添加成功了，则返回1， 否则返回0*/
    if($res)
    {
        return 1;
    }
    else 
    {
        return 0;
    }     
}
?>