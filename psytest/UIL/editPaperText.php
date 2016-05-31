
<?php


include_once '../BLL/makePaperBll.php';
// 定义变量并设置为空值
$nameErr = $editErr = "";
$name = $edit = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flag = 1;
    if (empty($_POST["name"])) {
        $nameErr = "标题是必填的";
        $flag = 0;
    } else {
        $name = test_input($_POST["name"]);
    }
     
    if (empty($_POST["edit"])) {
        $editErr = "内容不能为空";
        $flag = 0;
    } else {
        $edit = test_input($_POST["edit"]);
    }
    $type = 'aaa';
    $isPaperScore = 0;
    $path = NULL;
    if(flag){
        AddNewPaper($name,$edit,$type, $isPaperScore, $path);
        header("Location: showPaperName.php?flag=edit");
    }
    
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>新试卷录入页面</h2>
<p><span class="error"></span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   试卷标题：<input type="text" name="name">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   试卷内容：
   <br>
   <textarea name="$edit" cols=80 rows=10 > 
   </textarea>
   <span class="error">* <?php echo $editErr;?></span>
   <br><br>
 
   <input type="submit" name="submit" value="提交"> 
</form>

