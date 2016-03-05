<html>

<body>

<div id="navfirst">
    <ul id="menu">
        <li id="h"><a href="/h.asp" title="HTML 系列教程">HTML 系列教程</a></li>
        <li id="b"><a href="/b.asp" title="浏览器脚本教程">浏览器脚本</a></li>
        <li id="s"><a href="/s.asp" title="服务器脚本教程">服务器脚本</a></li>
    </ul>
</div>




<form name='add' action='showPaperName.php' method="post">
类型: <select name='type'>
     <option value='0' >全部</option>
     <option value='1'>有趣</option>
     <option value='2'>无趣</option>
     </select>
<input type='submit' name='submit' value="确认"/>
</form>

</body>
</html>
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
        echo "<a href=\"showPaperQuestion.php?paperName=$paperName\">$paperName</a><br>";
    }