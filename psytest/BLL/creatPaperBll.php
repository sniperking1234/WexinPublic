<?php
/*
 * @chen
 * �����Ծ��ܣ����а������·���
 * FindPaperInfo($paperName)  ͨ��paperName�ҵ��������Ծ���Ϣ����
 * FindPaperQuestion  ͨ��paperName�ҵ�������������Ϣ
 */

/*ͨ��paperName�ҵ��������Ծ���Ϣ����*/
function FindPaperInfo($paperName)
{
    include_once '../DAl/paperDal.php';
    $paperInfo = FindPaperByPaperName($paperName);
    return $paperInfo;
}

/*ͨ��paperName�ҵ�������������Ϣ*/
function FindPaperQuestion($paperName)
{
    include_once '../DAl/paperDal.php';
    include_once '../DAl/questionDal.php';
    $paperInfo = FindPaperByPaperName($paperName);
    foreach ($paperInfo as $single)
    {
        $paperID = $single[0];
    }
    $questionInfo = FindQuestionByPaperID($paperID);
    return $questionInfo;
}

