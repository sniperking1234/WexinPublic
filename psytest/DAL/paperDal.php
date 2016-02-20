<?php

/* 
 * @hero chen
 * 操作paper表，其中包含以下方法
 * FindPaperByPaperID($paperID)   通过paperID（主键）找到相应试卷
 * FindPaperByPaperName($paperName)    通过试卷名称paperName找到相应试卷
 * FindPaperLikePaperName($paperName)     通过试卷名称paperName进行模糊查找
 * FindPaperByPaperType($paperType)     通过试卷类型来查找该类型的所有试卷
 * InsertPaper($paperName, $paperInfo, $paperType, $isPaperScore, $imagePath) 向paper表插入一条数据
 * DeletePaper($paperID) 通过paperID（主键）删除一条信息
 * FindALLPaper()      返回所有试题
 * UpdatePaper($paperID, $paperName, $paperInfo, $paperType, $isPaperScore, $imagePath) 通过paperID（主键）更新一条记录
 */


/*通过PaperID（主键）找到相应试卷*/
function FindPaperByPaperID($paperID)
{
    //包含数据库操作文件
    include_once 'sqlQuery.php'; 
    //生成sql语句
    $query = "select * from paper 
        where PaperID = $paperID";
    //返回结果
    return selectQuery($query);
}

/*通过试卷名称找到相应试卷*/
function FindPaperByPaperName($paperName)
{
    include_once 'sqlQuery.php';
    $query = "select * from paper 
        where PaperName = '$paperName'"; 
    return selectQuery($query);
}

/*向paper表插入一条数据*/
function  InsertPaper($paperName, $paperInfo, $paperType, $isPaperScore, $imagePath)
{
    include_once 'sqlQuery.php';
    //$isPaperScore是int类型，不需要加单引号
    $query = "insert into paper (PaperName,PaperInfo,PaperType,IsPaperScore,ImagePath) 
        values('$paperName','$paperInfo','$paperType',$isPaperScore,'$imagePath') ";
    return commonQuery($query);
}

/*通过PaperID（主键）删除一条信息*/
function  DeletePaper($paperID)
{
    include_once 'sqlQuery.php';
    $query = "delete from paper
        where PaperID = $paperID";
    return commonQuery($query);
}

/*通过PaperID（主键）更新一条记录*/
function  UpdatePaper($paperID, $paperName, $paperInfo, $paperType, $isPaperScore, $imagePath)
{
    include_once 'sqlQuery.php';
    //$isPaperScore $paperID 是int类型，不需要加单引号
    $query = "update paper 
        set PaperName = '$paperName', PaperInfo = '$paperInfo', PaperType = '$paperType',
        IsPaperScore = $isPaperScore, ImagePath = '$imagePath' 
        where PaperID = $paperID";
    return commonQuery($query);
}

/*通过试卷名称进行模糊查找*/
function FindPaperLikePaperName($paperName)
{
    include_once 'sqlQuery.php';
    $query = "select * from paper
    where PaperName like '%$paperName%'";
    return selectQuery($query);
}

/*通过试卷类型来查找该类型的所有试卷*/
function FindPaperByPaperType($paperType)
{
    include_once 'sqlQuery.php';
    $query = "select * from paper
    where PaperType = '$paperType'";
    return selectQuery($query);
}

/*返回所有试题*/
function FindALLPaper()
{
    include_once 'sqlQuery.php';
    $query = "select * from paper";
    return selectQuery($query);
}