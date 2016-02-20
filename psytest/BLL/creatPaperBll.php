<?php
/*
 * @chen
 * 生成试卷功能，其中包含以下方法
 * FindPaperInfo($paperName)  通过paperName找到并返回试卷信息介绍
 * FindPaperQuestion  通过paperName找到并返回试题信息
 */

/*通过paperName找到并返回试卷信息介绍*/
function FindPaperInfo($paperName)
{
    include_once '../DAl/paperDal.php';
    $paperInfo = FindPaperByPaperName($paperName);
    return $paperInfo;
}

/*通过paperName找到并返回试题信息*/
function FindPaperQuestion($paperName)
{
    include_once '../DAl/paperDal.php';
    include_once '../DAl/questionDal.php';
    $paperID = 0;
    $paperInfo = FindPaperByPaperName($paperName);
    foreach ($paperInfo as $single)
    {
        $paperID = $single[0];
    }
    $questionInfo = FindQuestionByPaperID($paperID);
    return $questionInfo;
}

