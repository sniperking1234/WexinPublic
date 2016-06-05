<html>
<body>

<?php 

    session_start();

    include_once '../BLL/creatPaperBll.php';
    include_once '../BLL/commonFunction.php';
    include_once '../BLL/getQuestionBll.php';
    include_once '../BLL/calculateResultBll.php';
    include_once '../BLL/makePaperBll.php';
    $userID = $_SESSION['userID'];
    $paperName = $_GET['paperName'];
    //释放paperName的session
    unset($_SESSION['paperName']);
    $paperID = GetPaperID($paperName);
    $result = FindPaperQuestion($paperName);
    $count = count($result);
    $select = array();
    //循环把选择结果读取出来
    if (IsResultExist($userID, $paperID)) {

    }
    else {
        for($x=0;$x<$count;$x++)
        {
            $select[$x] = $_GET[$x];
            $questionID = FindQuetionID($paperID,$x+1);
            SaveSelectResult($userID, $paperID, $questionID, $_GET[$x], 0);//先填充0
        }
        CalculateScore($userID, $paperID);
    }
    
    $uil = "Location: ../UIL/showResult.php?paperID=$paperID";
    header($uil);
?>


</body>
</html>


