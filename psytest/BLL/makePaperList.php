<?php
/*
 * @chen 
 * ��ȡ���е������б�
 */

//��ȡ���������б�
function GetAllPaperList()
{
    include_once '../DAL/paperDal.php';
    return FindALLPaper();
}