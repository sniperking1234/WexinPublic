<html lang = "zh-CN">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="description" content="">
    	<meta name="author" content="">
		
		<title>测试结果</title>
		
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
	 <div class="container">
	 	<div class="starter-template">
    		<?php 
    		session_start();
    		include_once '../DAL/testResultDal.php';
    		include_once '../DAL/paperDal.php';
    		$userId = $_SESSION['userID'];
    		$result = FindTestResultByUserID($userId);
    		for($i=0; $i<count($result); $i++){
    		    $paperId = $result[$i][2];
    		    $paperName = FindPaperByPaperID($paperId)[0][1];
    		    $score = $result[$i][3];
    		    $info = $result[$i][4];
    		    echo "<h2>试卷名： $paperName</h2>";
    		    echo "<h2>分数是 $score</h2>";
    		    echo "<h2>测试结果为：</h2>";
    		    echo "<h3>$info</h3>";
    		    echo "</br>";
    		};
    		?>
    	</div>
    	<a class="btn btn-default" href="showPaperName.php" role="button">进入试题选择</a>
	</div>
	</body>
</html>