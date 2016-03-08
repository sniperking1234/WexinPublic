<html>

<!--demo展示所用css end-->
<link rel="stylesheet"
	href="http://static.wezeit.com/wzn/public/css/reset.css">
<link rel="stylesheet"
	href="http://static.wezeit.com/wzn/css/h5style.css">
<link rel="stylesheet"
	href="http://static.wezeit.com/wzn/public/css/font.css">
<script type="text/javascript"
	src="http://static.wezeit.com/wzn/h5/js/zepto.min.js"></script>
<script type="text/javascript"
	src="http://static.wezeit.com/wzn/h5/js/zepto.lazyload.js?725"></script>
<style>
.content-article {
	padding-bottom: 0
}
</style>
<?php
    session_start();
    $_SESSION['userID']=1;
    include_once '../BLL/makePaperListBll.php';
    $type = $_POST['type'];
    $paperList = NULL;
    if($type)
    {
        $paperList = GetTypePaper($type);
    }
    else
    {
        $paperList = GetAllPaper();
    }
    foreach ($paperList as $paper)
    {
        $paperID = $paper[0];
        $paperName = $paper[1];
        $paperInfo = $paper[2];
        $paperType = $paper[3];
        //echo "<li class=\"Quiz\"><span>$paperName</span>";
        //echo "</li>";
        echo "<a href=\"showPaperQuestion.php?paperName=$paperName\">$paperName</a><br>";
    }
?>
</html>
