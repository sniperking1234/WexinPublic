<?php
/*
 * @chen 
 * 获取所有的试题列表，包含以下方法
 * GetAllPaper()  获取所有试题列表
 * SearchPaper($paperName)   进行模糊查询
 * GetTypePaper($typeName)   获取某一类型的所有试卷
 */

/*获取所有试题列表*/
function GetAllPaper()
{
    include_once '../DAL/paperDal.php';
    return FindALLPaper();
}

/*进行模糊查询*/
function SearchPaper($paperName)
{
    include_once '../DAL/paperDal.php';
    return FindPaperLikePaperName($paperName);
}

/*获取某一类型的所有试卷*/
function GetTypePaper($typeName)
{
    include_once '../DAL/paperDal.php';
    return FindPaperByPaperType($typeName);
}