<html lang = "zh-CN">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="description" content="">
    	<meta name="author" content="">
		
		<title>试题选择</title>
		
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

<!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">试题选择</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#">主页</a></li>
            <li class="active"><a href="#about">试题选择</a></li>
            <li><a href="#contact">帮助</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              	<?php 
              	 include_once '../BLL/userBll.php';
              	 session_start();
              	 $userID = $_SESSION['userID'];
              	 $userList = FindbyUserId($userID);
              	 echo $userList[0][1];
              	?>
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">个人资料</a></li>
                <li><a href="showAllResult.php">测试结果</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

     <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      
      <div class="jumbotron">
        <h2>请选择试题</h2>
        <br/>
        <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            试题类型
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="showPaperName.php?type=1">心理测试</a></li>
            <li><a href="showPaperName.php?type=2">趣味测试</a></li>
          </ul>
     	</div>
     	<br/>
        <p>
          <?php
            include_once '../BLL/makePaperListBll.php';
            $flag = $_GET['flag'];
            $type = $_GET['type'];
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
                if ($flag) {
                    ;
                }
                else{
                    echo "<button type=\"button\" class=\"btn btn-default btn-lg btn-block\" onclick=\"javascript:window.location.href='showPaperQuestion.php?paperName=$paperName';\">$paperName</button>";
                }
                
                
            }
        ?>
        </p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../JS/jquery.min.js"></script>
    <script src="../JS/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../JS/ie10-viewport-bug-workaround.js"></script>
  </body>

</html>
