<?php
include_once 'paperDal.php';
include_once 'scoreDal.php';
include_once 'selectResultDal.php';
include_once 'testResultDal.php';


/****************************************************
 * 
 * @chen
 * paperDal 娴嬭瘯
 * 
 ****************************************************/

 //$result = findPaperByPaperID(1);
 //$result = FindPaperByPaperName('ffff');
 //$result = FindPaperLikePaperName('good');
/*
$result = FindPaperByPaperType('hardeasy');
$count = count($result);
echo "total find $count results <br>";
//鎵撳嵃鏌ヨ鏁版嵁
foreach ($result as $single)
{
    foreach ($single as $unit)
    {
        echo $unit."   ";
    }
    echo "<br>"  ;
}
*/
//InsertPaper("adddbcd","hafha","hardeasy",1,"imddage");
//DeletePaper(2);
//UpdatePaper(4,"ffff","hafha","hardeasy",1,"imddage");

 /****************************************************
  *
  * @chen
  * scoreDal 娴嬭瘯
  *
  ****************************************************/
/*
InsertScore(5,10,30,"you healthy");
InsertScore(5,30,50,"you sick");
InsertScore(5,50,60,"you bad");
InsertScore(5,70,80,"you happy");
InsertScore(5,90,100,"you die");
*/

//UpdateScore(2,4,30,50,"you changed");


//$result = FindScoreByScoreID(2);
//$result = FindScoreByPaperID(4);

/*yang
 * 操作selectResult表，其中包含以下方法：
 * FindSelectResultBySelectResultID($selectResultID)        通过selectResultID找到相应的SelectResult
 * FindSelectResultByUserID($userID)                        通过userID找到相应的SelectResult
 * FindSelectResultByPaperID($paperID)                      通过paperID找到相应的SelectResult
 * FindSelectResultByQuestionID($questionID)                通过questionID找到相应的SelectResult
 * FindSelectResultByUserPaper($userID,$paperID)            通过userID和paperID找到相应的SelectResult
 * InsertSelectResult($userID,$paperID,$questionID,$selectInfo,$selectScore)   增加一个SelectResult
 * UpdateSelectResult($selectResultID,$userID,$paperID,$questionID,$selectInfo,$selectScore)  更新一个SelectResult
 * DeleteSelectResult($selectResultID)                       通过selectResultID删除一个SelectResult
 * UpdateSelectScoreByID($selectResultID, $selectScore)  通过selectResultID更新selectScore
 */

// $result = FindSelectResultBySelectResultID(1);
// $result = FindSelectResultBySelectResultID(5);
//$result =FindSelectResultByUserID(1) ;
//$result =FindSelectResultByUserID(5) ;
//$result =FindSelectResultByPaperID(1 );
//$result =FindSelectResultByPaperID(5 );
//$result =FindSelectResultByQuestionID(2);
//$result =FindSelectResultByQuestionID(5);
//$result =FindSelectResultByUserPaper(1,1);
// $result =FindSelectResultByUserPaper(1,2); 
//$result =InsertSelectResult(2,1,2,'ArtetAA',5);
          //$result =InsertSelectResult(10,20,200,BBB,5);
// $result =UpdateSelectResult(1,1,2,2,ccc22,10);
          //$result =UpdateSelectResult(200,1,2,2,ccc22,10);
//$result =DeleteSelectResult(6) ;
/*
 * @yang
 * 操作testresult表，其中包括以下方法
 *function FindTestResultByTestResultID($testResultID)                           通过testResultID找到相应的TestResult
 *function FindTestResultByUserID($userID)                                       通过userID找到相应的TestResult
 *function FindTestResultByPaperID($paperID)                                     通过paperID找到相应的TestResult
 *function InsertTestResult($userID,$paperID,$testScore,$testInfo)               增加一个TestResult
 *function UpdateTestResult($testResultID,$userID,$paperID,$testScore,$testInfo) 更新一个TestResult
 *function DeleteTestResult($testResultID)                                       通过testResultID删除相应的TestResult
 */

// $result = FindTestResultByTestResultID(1);
// $result = FindTestResultByTestResultID(5);
// $result = FindTestResultByUserID(1);
// $result = FindTestResultByUserID(5);
// $result = FindTestResultByPaperID(1);
// $result = FindTestResultByPaperID(5);
       // $result = InsertTestResult(200,2,5,aaa);
// $result = UpdateTestResult(2,2,2,2,changedtestinfo);
              //  $result = UpdateTestResult(150,1,1,1,1);
//$result = DeleteTestResult(7);
//$result = DeleteTestResult(100);


//$count = count($result);
//echo "total find $count results <br>";
foreach ($result as $single)
{
    foreach ($single as $unit)
    {
        echo $unit."   ";
    }
    echo "<br>"  ;
}

//DeleteScore(1);
//DeleteScoreByPaperID(5);

