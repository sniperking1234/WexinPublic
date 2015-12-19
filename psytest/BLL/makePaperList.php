<?php
/*
 * @chen 
 * 获取所有的试题列表
 */

//获取所有试题列表
function GetAllPaperList()
{
    include_once '../DAL/paperDal.php';
    return FindALLPaper();
}