<?php
include_once 'paperDal.php';
include_once 'scoreDal.php';

/****************************************************
 * 
 * @chen
 * paperDal 测试
 * 
 ****************************************************/

 //$result = findPaperByPaperID(1);
 //$result = FindPaperByPaperName('ffff');
 //$result = FindPaperLikePaperName('good');
/*
$result = FindPaperByPaperType('hardeasy');
$count = count($result);
echo "total find $count results <br>";
//打印查询数据
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
  * scoreDal 测试
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

$result = FindQuestionByQuestionNum(1);
$count = count($result);
echo "total find $count results <br>";
//打印查询数据
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

