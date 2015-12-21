<?php
/*
 * @chen 
 * ��ȡ���е������б��������·���
 * GetAllPaper()  ��ȡ���������б�
 * SearchPaper($paperName)   ����ģ����ѯ
 * GetTypePaper($typeName)   ��ȡĳһ���͵������Ծ�
 */

/*��ȡ���������б�*/
function GetAllPaper()
{
    include_once '../DAL/paperDal.php';
    return FindALLPaper();
}

/*����ģ����ѯ*/
function SearchPaper($paperName)
{
    include_once '../DAL/paperDal.php';
    return FindPaperLikePaperName($paperName);
}

/*��ȡĳһ���͵������Ծ�*/
function GetTypePaper($typeName)
{
    include_once '../DAL/paperDal.php';
    return FindPaperByPaperType($typeName);
}