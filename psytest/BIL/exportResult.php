<?php

include_once '../Classes/PHPExcel.php';
include_once '../DAL/testResultDal.php';
include_once '../DAL/selectResultDal.php';
$excel = new PHPExcel();

function ExportTestResultByUserIDPaperID($userID,$paperID) 
{
    
    $letter = array('A','B','C','D','E','F','F','G');
    $tableheader = array('测试结果编号','用户编号','试卷编号','分数','反馈结果');
    
    /*填充表头的信息  如A1位置是“测试结果编号”，A2位置是“用户编号”*/
    for($i = 0;$i < count($tableheader);$i++) 
    {
        $GLOBALS['excel']->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
    }
    
    /*获取要填往表格主体的数据 ，也就是用户的某一个试卷的测试结果 是一个二维数组*/
    $datas =  FindTestResultByUserPaper($userID,$paperID);
    
    /*填充表格内部的信息 因为第一行被表头占用了 所以数据都从第二行开始   
     * 数组的第一个内容下标为0  而在表格里的位置是第2行   这点需要注意 
     */
    for ($i = 2;$i <= count($datas) + 1;$i++)
    {
        $j = 0;
        foreach ($datas[$i - 2] as $data)
        {
            $GLOBALS['excel']->getActiveSheet()->setCellValue("$letter[$j]$i","$data");
            $j++;
        }
    }
    //创建Excel输入对象
    CreateExcel();
}

function ExportSelectResultByUserIDPaperID($userID,$paperID)
{
 
    $letter = array('A','B','C','D','E','F','F','G');
    $tableheader = array('选则结果编号','用户编号','试卷编号','试题编号','用户选项','该题得分');
    
    for($i = 0;$i < count($tableheader);$i++) {
        $GLOBALS['excel']->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
    }
    
    $datas = FindSelectResultByUserPaper($userID,$paperID);

   /*填充表格内部的信息 因为第一行被表头占用了 所以数据都从第二行开始  */
    for ($i = 2;$i <= count($datas) + 1;$i++) 
    {
        $j = 0;
        foreach ($datas[$i - 2] as $data) 
        {
            $GLOBALS['excel']->getActiveSheet()->setCellValue("$letter[$j]$i","$data");
            $j++;       
        }
    }
    
    //创建Excel输入对象
    CreateExcel();
}


function CreateExcel()
{
    $write = new PHPExcel_Writer_Excel5($GLOBALS['excel']);
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
    header("Content-Type:application/force-download");
    header("Content-Type:application/vnd.ms-execl");
    header("Content-Type:application/octet-stream");
    header("Content-Type:application/download");;
    header('Content-Disposition:attachment;filename="testdata.xls"');
    header("Content-Transfer-Encoding:binary");
    $write->save('php://output');
}

//test
ExportTestResultByUserIDPaperID(1,2);
//ExportSelectResultByUserIDPaperID(1,2);
?>