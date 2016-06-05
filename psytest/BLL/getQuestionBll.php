<?php

/*
 * @ chen
 * 操作question表的功能
 */

function FindQuetionID($paperID, $questionNum)
{
    include_once '../DAL/questionDal.php';
    $result = FindQuestionByQuestionNum($paperID, $questionNum);
    return $result[0][0];
}