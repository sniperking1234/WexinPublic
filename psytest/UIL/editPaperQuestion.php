<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="description" content="">
    	<meta name="author" content="">
		
		<title>试题编辑</title>
		
		<!-- Bootstrap core CSS -->
        <link href="../CSS/bootstrap.min.css" rel="stylesheet">
    
        <!-- Custom styles for this template -->
        <link href="../CSS/navbar-staitic-top.css" rel="stylesheet">
    
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../JS/ie-emulation-modes-warning.js"></script>
    
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
	</head>
	
	<body>
		<form class="form-inline" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="form-group">
            <label for="exampleInputName2">请输入题号</label>
            <input type="text" name="number" class="form-control" id="exampleInputName2">
          </div>
          <button type="submit" class="btn btn-default">确认</button>
        </form>
        <?php 
            
            include_once '../BLL/makePaperBll.php';
            $paperId = 1;
            $paperName = '测试1';
            if(!empty($_POST["number"])){
                $questionNum = $_POST["number"];
                $result = GetUniqueQuestion($paperName, $questionNum);
                $mainString = $result[0][3];
                $questionString = $result[0][5];
                $scoreString = $result[0][6];
                $questionStringList = explode(';',$questionString);
                $scoreStringList = explode(';',$scoreString);
                $str1 = 
                "<form class=\"form-horizontal\">
                      <div class=\"form-group\">
                        <label for=\"exampleInputName3\" class=\"col-sm-2 control-label\">题干</label>
                        <div class=\"col-sm-10\">
                          <textarea class=\"form-control\" rows=\"3\">$mainString</textarea>
                        </div>
                      </div>";
                for ($i=0; $i < count($questionStringList); $i++){
                    $str2 =
                    "<div class=\"form-group\">
                        <label for=\"exampleInputName2\" class=\"col-sm-2 control-label\">题目</label>
                        <div class=\"col-sm-10\">
                          <input type=\"text\" class=\"form-control\" id=\"exampleInputName2\" value=\"$questionStringList[$i]\">
                        </div>
                       <label for=\"exampleInputName3\" class=\"col-sm-2 control-label\">分值</label>
                        <div class=\"col-sm-10\">
                          <input type=\"text\" class=\"form-control\" id=\"exampleInputName3\" value=\"$scoreString[$i]\">
                        </div>
                      </div>";
                    $str1 .= $str2;
                }
                
                $str3 = 
                      "<div class=\"form-group\">
                        <div class=\"col-sm-offset-2 col-sm-10\">
                          <button type=\"submit\" class=\"btn btn-default\">Sign in</button>
                        </div>
                      </div>
                    </form>
                ";
                $str1 .= $str3;
                echo $str1;
            }
            
        ?>
	</body>
</html>